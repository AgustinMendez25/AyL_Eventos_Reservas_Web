"use strict";

const btnVariedades = document.getElementById("btnVariedades");
const modalVariedades = document.getElementById("modalVariedades");
const modalVariedadesCaja = document.getElementById("modalVariedades-caja");
const cerrarModalVariedades = document.getElementById("cerrarModalVariedades");


const btnEntradas = document.getElementById("btnEntradas");
const modalEntradas = document.getElementById("modalEntradas");
const modalEntradasCaja = document.getElementById("modalEntradas-caja");
const cerrarModalEntradas = document.getElementById("cerrarModalEntradas");


const btnClientes = document.getElementById("btnClientes");
const modalClientes = document.getElementById("modalClientes");
const modalClientesCaja = document.getElementById("modalClientes-caja");
const cerrarModalClientes = document.getElementById("cerrarModalClientes");


btnVariedades.addEventListener("click", ()=>{
    modalVariedades.style.visibility = "visible";
    modalVariedades.style.opacity = "1";
    modalVariedadesCaja.style.transform = "translateY(0%)";
    modalVariedades.style.pointerEvents = "auto";
})

cerrarModalVariedades.addEventListener("click", ()=>{
    modalVariedades.style.visibility = "hidden";
    modalVariedades.style.opacity = "0";
    modalVariedadesCaja.style.transform = "translateY(-30%)";
    modalVariedades.style.pointerEvents = "none";
})


btnEntradas.addEventListener("click", ()=>{
    modalEntradas.style.visibility = "visible";
    modalEntradas.style.opacity = "1";
    modalEntradasCaja.style.transform = "translateY(0%)";
    modalEntradas.style.pointerEvents = "auto";
})

cerrarModalEntradas.addEventListener("click", ()=>{
    modalEntradas.style.visibility = "hidden";
    modalEntradas.style.opacity = "0";
    modalEntradasCaja.style.transform = "translateY(-30%)";
    modalEntradas.style.pointerEvents = "none";
})


btnClientes.addEventListener("click", ()=>{
    modalClientes.style.visibility = "visible";
    modalClientes.style.opacity = "1";
    modalClientesCaja.style.transform = "translateY(0%)";
    modalClientes.style.pointerEvents = "auto";
})

cerrarModalClientes.addEventListener("click", ()=>{
    modalClientes.style.visibility = "hidden";
    modalClientes.style.opacity = "0";
    modalClientesCaja.style.transform = "translateY(-30%)";
    modalClientes.style.pointerEvents = "none";
})