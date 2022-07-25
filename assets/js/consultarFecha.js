"use strict";

const modalEventos = document.getElementById('modalEventos');
const modalEventosCaja = document.getElementById('modalEventos-caja');

document.getElementById('btnConsultar').addEventListener("click", ()=>{
    let fecha = $('#fechaEvento').val();
    $.ajax({
        url: 'assets/procesamiento/consultarFecha.php',
        type: 'POST',
        data: { 'fecha': fecha },
        success: function(response) {
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
        }
    })
});

document.getElementById('cerrarModalEventos').addEventListener("click", ()=>{
    modalEventos.style.visibility = "hidden";
    modalEventos.style.opacity = "0";
    modalEventosCaja.style.transform = "translateY(-30%)";
})