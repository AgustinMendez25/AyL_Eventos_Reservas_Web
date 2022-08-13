"use strict";

//const separador = document.getElementById("separador");
const tarjetas = document.querySelectorAll(".contenedor-tarjeta-evento");

for (const tarjeta of tarjetas) {
    const tarjetaInfo = tarjeta.lastElementChild.firstElementChild;
    
    const tarjetaInfoTexto1 = tarjetaInfo.firstElementChild;
    const tarjetaInfoTexto2 = tarjetaInfo.lastElementChild;

    const tarjetaEditarBtn = tarjeta.firstElementChild.firstElementChild;
    const tarjetaEliminarBtn = tarjeta.firstElementChild.firstElementChild.nextElementSibling;

    tarjeta.addEventListener("click",()=>{
        if (tarjetaInfo.style.top == "0px"){
            tarjetaEditarBtn.style.display = "none";
            tarjetaEliminarBtn.style.display = "none";
            tarjetaInfo.style.animation = "cerrarInfo 1s forwards";
            const tiempo = setTimeout(()=>{
                tarjetaInfo.style.top = "-100px";
                tarjetaInfo.style.visibility = "hidden";
                tarjetaInfoTexto1.style.animation = "";
                tarjetaInfoTexto2.style.animation = "";
            },800);
        }else{
            tarjetaEditarBtn.style.display = "inline-block";
            tarjetaEliminarBtn.style.display = "inline-block";
            tarjetaEliminarBtn.addEventListener("click", ()=>{
                if (confirm("¿Está seguro de que desea borrar este registro?")) {
                    $.ajax({
                        url: 'assets/procesamiento/eliminarEvento.php',
                        type: 'POST',
                        data: { 'idEvento': tarjetaEliminarBtn.getAttribute("value") }
                    })
                    tarjetaEliminarBtn.parentNode.parentNode.style.opacity = "0";
                    setTimeout(() => {
                        tarjetaEliminarBtn.parentNode.parentNode.style.display = "none";
                    }, 1000);
                    
                }
            })
            tarjetaInfo.style.animation = "desplazarInfo 1s forwards";
            tarjetaInfo.style.visibility = "visible";
            tarjetaInfoTexto1.style.animation = "aparecerTexto 2s forwards";
            tarjetaInfoTexto2.style.animation = "aparecerTexto 2s forwards";
            const tiempo = setTimeout(()=>{tarjetaInfo.style.top = "0px"},800);
        }
    });
}

const contenedoresCants = document.querySelectorAll(".contenedorCants");
const modalVarieEntr = document.getElementById("modalVarieEntr");
const modalVarieEntrCaja = document.getElementById("modalVarieEntr-caja");

const contenidoVarieEntr = document.getElementById("contenidoVarieEntr");
const entradasContenido = document.getElementById("entradas");
const entradasEspecialesContenido = document.getElementById("entradasEspeciales");
const variedadesContenido = document.getElementById("variedades");
const variedadesExtraContenido = document.getElementById("variedadesExtra");

/**
 * Coloca spans en la información de variedades y entradas. Además, devuelve la cantidad de las mismas.
 * @param {*} tipo (entradas/entradasEspeciales/variedades/variedadesExtra)
 * @param {*} resultado resultado de la consulta con los datos
 * @returns cantidad de elementos del tipo ingresado
 */
function procesarResultado(tipo, resultado) {
    let devolver = 0;
    let contenido;
    let mensaje;
    switch (tipo) {
        case 'entradas':
            contenido = entradasContenido;
            mensaje = "Sin entradas";
            break;
        case 'entradasEspeciales':
            contenido = entradasEspecialesContenido;
            mensaje = "Sin entradas especiales";
            break;
        case 'variedades':
            contenido = variedadesContenido;
            mensaje = "Sin variedades";
            break;
        case 'variedadesExtra':
            contenido = variedadesExtraContenido;
            mensaje = "Sin variedades extra";
            break;
    }
    if (resultado[0][tipo] == "") {
        const span = document.createElement("span");
        const texto = document.createTextNode(mensaje);
        span.appendChild(texto);
        contenido.appendChild(span);
    }else{
        let a = resultado[0][tipo].split(",");
        
        for (const i of a) {
            const span = document.createElement("span");
            span.style.backgroundColor = "green";
            const texto = document.createTextNode(i);
            span.appendChild(texto);
            contenido.appendChild(span);
            //Borrar consultas una vez realizadas para que no se pisen entre si
        }

        devolver = a.length;
    }

    return devolver;
}

for (const contenedorCant of contenedoresCants) {
    contenedorCant.addEventListener("click",()=>{
        modalVarieEntr.style.visibility = "visible";
        modalVarieEntr.style.opacity = "1";
        modalVarieEntrCaja.style.transform = "translateY(0%)";
        modalVarieEntr.style.pointerEvents = "auto";

        $.ajax({
            url: "assets/procesamiento/obtenerVarieEntr.php",
            type: "POST",
            data: {"idReserva": contenedorCant.getAttribute("id")},
            success: function(response) {
                let resultado = JSON.parse(response);
                document.getElementById("numeroEntradas").innerHTML = procesarResultado('entradas', resultado);
                document.getElementById("numeroEntradasEspeciales").innerHTML = procesarResultado('entradasEspeciales', resultado);
                document.getElementById("numeroVariedades").innerHTML = procesarResultado('variedades', resultado);
                document.getElementById("numeroVariedadesExtra").innerHTML = procesarResultado('variedadesExtra', resultado);
            }
        })
    })
}

function eliminarContenido(contenido) {
    while (contenido.hasChildNodes()) {
        contenido.removeChild(contenido.firstChild);
    }
}

document.getElementById("cerrarModaVarieEntr").addEventListener("click", ()=>{
    modalVarieEntr.style.visibility = "hidden";
    modalVarieEntr.style.opacity = "0";
    modalVarieEntrCaja.style.transform = "translateY(-30%)";
    modalVarieEntr.style.pointerEvents = "none"; 
    eliminarContenido(entradasContenido);
    eliminarContenido(entradasEspecialesContenido);
    eliminarContenido(variedadesContenido);
    eliminarContenido(variedadesExtraContenido);
    document.getElementById("numeroEntradas").innerHTML = "";
    document.getElementById("numeroEntradasEspeciales").innerHTML = "";
    document.getElementById("numeroVariedades").innerHTML = "";
    document.getElementById("numeroVariedadesExtra").innerHTML = "";
})



/*


const contenidoEventos = document.getElementById('contenidoEventos');

while (contenidoEventos.hasChildNodes()) {
                contenidoEventos.removeChild(contenidoEventos.firstChild);
            }

            modalEventos.style.visibility = "visible";
            modalEventos.style.opacity = "1";
            modalEventosCaja.style.transform = "translateY(0%)";

            document.getElementById("headerTexto").innerHTML = "Eventos día "+fecha;
            
            let resultado = JSON.parse(response);
            if (resultado.length == 0) {
                const span = document.createElement("span");
                const texto = document.createTextNode("No hay eventos reservados");
                span.appendChild(texto);
                contenidoEventos.appendChild(span);
            }else{
                for (const i of resultado) {
                    const span = document.createElement("span");
                    const texto = document.createTextNode(i['hora'] + "hs ("+i['horario']+") en "+i['localidad']);
                    span.appendChild(texto);
                    contenidoEventos.appendChild(span);
                    //Borrar consultas una vez realizadas para que no se pisen entre si
                }
            }

                    <!--Modal VARIEDADES ENTRADAS-->
                    <div class="modal" id="modalVarieEntr">
                        <div class="modal-caja" id="modalVarieEntr-caja">
                            <div class="header">
                                <h4>Variedades y Entradas</h4>
                                <label id="cerrarModaVarieEntr">X</label>
                            </div>
                            <div class="contenido" id="contenidoVarieEntr">
                                <h5>Entradas</h5>
                                <div id="entradas"></div>
                                <h5>Entradas Especiales</h5>
                                <div id="entradasEspeciales"></div>
                                <h5>Variedades</h5>
                                <div id="variedades"></div>
                                <h5>Variedades Extra</h5>
                                <div id="variedadesExtra"></div>
                            </div>
                        </div>
                    </div>
*/