"use strict";

//const separador = document.getElementById("separador");
const tarjetas = document.querySelectorAll(".tarjeta-evento");


for (let i = 1 ; i <= tarjetas.length ; i++) {
    const id = "tarjeta-evento-" + i;
    const tarjeta = document.getElementById(id);
    tarjeta.addEventListener("click",()=>{
        //
    });
}




/*
let abierto = false;
menuOpt4.addEventListener("click", ()=>{
    if (abierto != null){
        if (abierto){
            menu.style.animation = "cerrarMenu 1s forwards";
            separador.style.animation = "noSeparar 1s forwards";
            abierto = null;
            const tiempo = setTimeout(()=>{abierto = false;},800);
        }
        else{
            menu.style.animation = "desplazarMenu 1s forwards";
            separador.style.animation = "separar 1s forwards";
            abierto = null;
            const tiempo = setTimeout(()=>{abierto = true;},800);
        }
    }
})*/