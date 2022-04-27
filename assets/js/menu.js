"use strict";

const menu = document.getElementById("menu");

const menuOpt1 = document.getElementById("btn-agregar");
const menuOpt2 = document.getElementById("btn-filtrar");
const menuOpt3 = document.getElementById("btn-eliminar");
const menuOpt4 = document.getElementById("btn-menu");

const separador = document.getElementById("separador");

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
})

menuOpt1.addEventListener("click", ()=>{
    //alert("agregar registro");
})

menuOpt2.addEventListener("click", ()=>{
    //alert("filtrar registros");
})

menuOpt3.addEventListener("click", ()=>{
    //alert("eliminar registro");
})