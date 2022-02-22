"use strict";

const divOpciones = document.getElementById("boton-opciones");
const menuOpt1 = document.getElementById("btn-agregar");
const menuOpt2 = document.getElementById("btn-filtrar");
const menuOpt3 = document.getElementById("btn-eliminar");
const menuOpt4 = document.getElementById("btn-cerrarMenu");

divOpciones.addEventListener("click", ()=>{
    divOpciones.setAttribute("hidden", true);
    menuOpt1.removeAttribute("hidden");
    menuOpt2.removeAttribute("hidden");
    menuOpt3.removeAttribute("hidden");
    menuOpt4.removeAttribute("hidden");
})

menuOpt4.addEventListener("click", ()=>{
    divOpciones.removeAttribute("hidden");
    menuOpt1.setAttribute("hidden", true);
    menuOpt2.setAttribute("hidden", true);
    menuOpt3.setAttribute("hidden", true);
    menuOpt4.setAttribute("hidden", true);
})