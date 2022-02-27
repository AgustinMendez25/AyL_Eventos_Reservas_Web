"use strict";

//const separador = document.getElementById("separador");
const tarjetas = document.querySelectorAll(".tarjeta-evento");

for (let i = 1 ; i <= tarjetas.length ; i++) {
    const id = "tarjeta-evento-" + i;

    const tarjeta = document.getElementById(id);
    const tarjetaInfo = tarjeta.lastElementChild.firstElementChild;
    
    const tarjetaInfoTexto1 = tarjetaInfo.firstElementChild;
    const tarjetaInfoTexto2 = tarjetaInfo.lastElementChild;

    tarjeta.addEventListener("click",()=>{
        if (tarjetaInfo.style.top == "0px"){
            tarjetaInfo.style.animation = "cerrarInfo 1s forwards";
            const tiempo = setTimeout(()=>{
                tarjetaInfo.style.top = "-100px";
                tarjetaInfoTexto1.style.animation = "";
                tarjetaInfoTexto2.style.animation = "";
            },800);
        }else{
            tarjetaInfo.style.animation = "desplazarInfo 1s forwards";
            tarjetaInfoTexto1.style.animation = "aparecerTexto 2s forwards";
            tarjetaInfoTexto2.style.animation = "aparecerTexto 2s forwards";
            const tiempo = setTimeout(()=>{tarjetaInfo.style.top = "0px"},800);
        }
    });
}