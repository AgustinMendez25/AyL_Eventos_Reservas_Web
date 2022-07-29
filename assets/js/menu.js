"use strict";

const menu = document.getElementById("menu");

const filtrarBtn = document.getElementById("btn-filtrar");
const menuBtn = document.getElementById("btn-menu");

const separador = document.getElementById("separador");

const modalFiltros = document.getElementById("modalFiltros");
const modalFiltrosCaja = document.getElementById("modalFiltros-caja");
const cerrarModalFiltros = document.getElementById("cerrarModalFiltros");


let abierto = false;
menuBtn.addEventListener("click", ()=>{
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

filtrarBtn.addEventListener("click", ()=>{
    modalFiltros.style.visibility = "visible";
    modalFiltros.style.opacity = "1";
    modalFiltrosCaja.style.transform = "translateY(0%)";
    modalFiltros.style.pointerEvents = "auto";
})

cerrarModalFiltros.addEventListener("click", ()=>{
    modalFiltros.style.visibility = "hidden";
    modalFiltros.style.opacity = "0";
    modalFiltrosCaja.style.transform = "translateY(-30%)";
    modalFiltros.style.pointerEvents = "none";
})

/*
eliminarBtn.addEventListener("click", ()=>{
    cancelarEliminar.style.display = "block";
    menu.style.animation = "cerrarMenu 0.2s forwards";
    separador.style.animation = "noSeparar 0.2s forwards";
    abierto = null;
    const tiempo = setTimeout(()=>{abierto = false;},800);
    
    const botonesEliminar = document.getElementsByClassName("eliminarTarjeta");
    for (const i of botonesEliminar) {
        i.style.display = "inline-block";
        i.addEventListener("click", ()=>{
            if (confirm("¿Está seguro de que desea borrar este registro?")) {
                $.ajax({
                    url: 'assets/procesamiento/eliminarEvento.php',
                    type: 'POST',
                    data: { 'idEvento': i.getAttribute("value") }
                })
                i.parentNode.parentNode.style.opacity = "0";
                setTimeout(() => {
                    i.parentNode.parentNode.style.display = "none";
                }, 1000);
                
            }
        })
    }
})

cancelarEliminar.addEventListener("click", ()=>{
    cancelarEliminar.style.display = "none";
    
    const botonesEliminar = document.getElementsByClassName("eliminarTarjeta");
    for (const i of botonesEliminar) {
        i.style.display = "none";
    }
})*/