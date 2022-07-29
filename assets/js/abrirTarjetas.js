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
            tarjetaInfoTexto1.style.animation = "aparecerTexto 2s forwards";
            tarjetaInfoTexto2.style.animation = "aparecerTexto 2s forwards";
            const tiempo = setTimeout(()=>{tarjetaInfo.style.top = "0px"},800);
        }
    });
}