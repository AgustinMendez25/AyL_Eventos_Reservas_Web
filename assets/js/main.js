"use strict";

const definirColorTarjeta = (fecha, id)=>{
    const tarjeta = document.getElementById(id);
    const actual = new Date().toLocaleDateString();
    if (fecha < actual) tarjeta.style.backgroundColor('red');
}