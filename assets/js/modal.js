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
})

cerrarModalVariedades.addEventListener("click", ()=>{
    modalVariedades.style.visibility = "hidden";
    modalVariedades.style.opacity = "0";
    modalVariedadesCaja.style.transform = "translateY(-30%)";
})


btnEntradas.addEventListener("click", ()=>{
    modalEntradas.style.visibility = "visible";
    modalEntradas.style.opacity = "1";
    modalEntradasCaja.style.transform = "translateY(0%)";
})

cerrarModalEntradas.addEventListener("click", ()=>{
    modalEntradas.style.visibility = "hidden";
    modalEntradas.style.opacity = "0";
    modalEntradasCaja.style.transform = "translateY(-30%)";
})


btnClientes.addEventListener("click", ()=>{
    modalClientes.style.visibility = "visible";
    modalClientes.style.opacity = "1";
    modalClientesCaja.style.transform = "translateY(0%)";
})

cerrarModalClientes.addEventListener("click", ()=>{
    modalClientes.style.visibility = "hidden";
    modalClientes.style.opacity = "0";
    modalClientesCaja.style.transform = "translateY(-30%)";
})