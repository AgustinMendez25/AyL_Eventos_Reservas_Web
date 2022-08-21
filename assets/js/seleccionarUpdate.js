"use strict";

const btnUpdate = document.getElementById("btn-update");

btnUpdate.addEventListener("click", ()=>{
    btnUpdate.setAttribute("disabled","");
    btnUpdate.style.pointerEvents = "none";
    const entr = seleccionados(entradas);
    const entrEspeciales = seleccionados(entradasEspeciales);
    const varie = seleccionados(variedades);
    const varieExtra = seleccionados(variedadesExtra);
    
    $.ajax({
        url: 'assets/procesamiento/updateEvento.php',
        type: 'POST',
        data: {
            'idRes' : document.getElementById("idRes").value,
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
            'infoAdicional' : document.getElementById("infoAdicional").value,
            'cantVariedades' : document.getElementById("cantVariedades").value,
            'cantEntradas' : document.getElementById("cantEntradas").value,
            'cantEntradasEspeciales' : document.getElementById("cantEntradasEspeciales").value,
            'entradas' : entr,
            'entradasEspeciales' : entrEspeciales,
            'variedades' : varie,
            'variedadesExtra' : varieExtra
        },
        success: function(response) {
            //let resultado = JSON.parse(response);
            //console.log(resultado[0]['q']);   
            if (response) {
                alert("Editado Exitosamente");
                window.location.href = "tabla.php";
            }else{
                alert("Debes ingresar la fecha y la localidad. Intente nuevamente");
                window.location.reload();
            }
        }
    })
})