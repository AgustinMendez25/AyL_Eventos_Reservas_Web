"use strict";

const fPendientes = document.getElementById("fPendientes");
const fRealizados = document.getElementById("fRealizados");
const fTodos = document.getElementById("fTodos");

const filtro = document.getElementById("filtro");

fPendientes.addEventListener("click", ()=>{
    fPendientes.style.backgroundColor = "green";
    fRealizados.style.backgroundColor = "rgb(206, 203, 203)";
    fTodos.style.backgroundColor = "rgb(206, 203, 203)";

    modalFiltros.style.visibility = "hidden";
    modalFiltros.style.opacity = "0";
    modalFiltrosCaja.style.transform = "translateY(-30%)";
    modalFiltros.style.pointerEvents = "none";

    filtro.setAttribute("value", "1");
})

fRealizados.addEventListener("click", ()=>{
    fPendientes.style.backgroundColor = "rgb(206, 203, 203)";
    fRealizados.style.backgroundColor = "green";
    fTodos.style.backgroundColor = "rgb(206, 203, 203)";

    modalFiltros.style.visibility = "hidden";
    modalFiltros.style.opacity = "0";
    modalFiltrosCaja.style.transform = "translateY(-30%)";
    modalFiltros.style.pointerEvents = "none";

    filtro.setAttribute("value", "2");
})

fTodos.addEventListener("click", ()=>{
    fPendientes.style.backgroundColor = "rgb(206, 203, 203)";
    fRealizados.style.backgroundColor = "rgb(206, 203, 203)";
    fTodos.style.backgroundColor = "green";

    modalFiltros.style.visibility = "hidden";
    modalFiltros.style.opacity = "0";
    modalFiltrosCaja.style.transform = "translateY(-30%)";
    modalFiltros.style.pointerEvents = "none";

    filtro.setAttribute("value", "3");
})

