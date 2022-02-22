"use strict";

const definirColorTarjeta = (fecha, id)=>{
    const tarjeta = document.getElementById(id);

    const actual = new Date().getTime();

    //Conversión de fecha a formato %Y-%m-%d y creación de fecha
    const fechaSplit = fecha.split("/");
    const fechaAConvertir = fechaSplit[2] + "-" + fechaSplit[1] + "-" + fechaSplit[0];
    const fechaFinal = new Date(fechaAConvertir).getTime();

    if (fechaFinal > actual) tarjeta.style.backgroundColor = 'red'
    else if (fechaFinal < actual) tarjeta.style.backgroundColor = 'green'
    else tarjeta.style.backgroundColor = 'blue';
}
