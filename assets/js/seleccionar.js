"use strict";

const clientes = document.querySelectorAll(".cliente");

const cli = document.getElementById("clienteExistente");
const idCli = document.getElementById("idCliente");

const nombreC = document.getElementById("nombreCliente");
const mailC = document.getElementById("mailCliente");
const telC = document.getElementById("telefonoCliente");

const btnCli = document.getElementById("btnClientes");

for (const i of clientes) {
    i.addEventListener("click", ()=>{
        i.style.animation = "colorear 2s";
        modalClientes.style.visibility = "hidden";
        modalClientes.style.opacity = "0";
        modalClientesCaja.style.transform = "translateY(-30%)";
        modalClientes.style.pointerEvents = "none";
        
        cli.style.display = "inline-block";
        cli.setAttribute("value", i.innerHTML);
        cli.setAttribute("readonly","");
        idCli.setAttribute("value", i.getAttribute("value"));

        nombreC.style.display = "none";
        mailC.style.display = "none";
        telC.style.display = "none";
        
        btnCli.innerHTML = "Elegir otro cliente"
    })
}

const entradas = document.querySelectorAll(".entrada");
const entradasEspeciales = document.querySelectorAll(".entradaEspecial");
const variedades = document.querySelectorAll(".variedad");
const variedadesExtra = document.querySelectorAll(".variedadExtra");

/**
 * Dada una colección de elementos (entradas,variedades,etc.), los recorre y coloca un evento de click que cambia el color del elemento
 * para seleccionarlo o deseleccionarlo. A su vez agrega un atributo 'seleccionado' en 1 si lo esta y en 0 si no lo esta.
 * @param {*} elementos colección de elementos
 */
function coloresSeleccionar(elementos) {
    for (const e of elementos) {
        if(e.getAttribute("seleccionado") == 1){
            e.style.backgroundColor = "green";
        }else{
            e.style.backgroundColor = "rgb(206, 203, 203)";
        }
        e.addEventListener("click", ()=>{
            if(e.getAttribute("seleccionado") == 1){
                e.style.backgroundColor = "rgb(206, 203, 203)";
                e.setAttribute("seleccionado", 0);
            }else{
                e.style.backgroundColor = "green";
                e.setAttribute("seleccionado", 1);
            }
        })
    }
}

coloresSeleccionar(entradas);
coloresSeleccionar(entradasEspeciales);
coloresSeleccionar(variedades);
coloresSeleccionar(variedadesExtra);

/**
 * Dada una colección de elementos (entradas,variedades,etc.), los recorre y verifica si estan seleccionados. Luego almacena sus ids en un
 * string separado por comas y lo devuelve.
 * @param {*} elementos colección de elementos
 * @returns string con los id de los elementos seleccionados
 */
function seleccionados(elementos) {
    let ids = "";
    for (const e of elementos) {
        if(e.getAttribute("seleccionado") == 1){
            ids += e.getAttribute('value')+",";
        }
    }
    ids = ids.substring(0, ids.length - 1);

    return ids;
}

const btnAgregar = document.getElementById("btn-agregar");

btnAgregar.addEventListener("click", ()=>{
    btnAgregar.setAttribute("disabled","");
    btnAgregar.style.pointerEvents = "none";
    const entr = seleccionados(entradas);
    const entrEspeciales = seleccionados(entradasEspeciales);
    const varie = seleccionados(variedades);
    const varieExtra = seleccionados(variedadesExtra);

    
    $.ajax({
        url: 'assets/procesamiento/subirEvento.php',
        type: 'POST',
        data: {
            'idCliente' : document.getElementById("idCliente").value,
            'nombreCliente' : document.getElementById("nombreCliente").value,
            'mailCliente' : document.getElementById("mailCliente").value,
            'telefonoCliente' : document.getElementById("telefonoCliente").value,
            'fecha' : document.getElementById("fecha").value,
            'horario' : document.getElementById("horario").value,
            'hora' : document.getElementById("hora").value,
            'cantAdultos' : document.getElementById("cantAdultos").value,
            'cantChicos' : document.getElementById("cantChicos").value,
            'localidad' : document.getElementById("localidad").value,
            'direccion' : document.getElementById("direccion").value,
            'precio' : document.getElementById("precio").value,
            'traslado' : document.getElementById("traslado").value,
            'seña' : document.getElementById("seña").value,
            'entradas' : entr,
            'entradasEspeciales' : entrEspeciales,
            'variedades' : varie,
            'variedadesExtra' : varieExtra
        },
        success: function(response) {
            //let resultado = JSON.parse(response);
            //console.log(resultado[0]['q']);
            if (response) {
                alert("Agregado Exitosamente");
                window.location.href = "tabla.php";
            }else{
                alert("Debes ingresar la fecha y la localidad. Intente nuevamente");
                window.location.reload();
            }
        }
    })
})