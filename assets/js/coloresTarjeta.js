"use strict";

const definirColorTarjeta = (fecha, id)=>{
    const tarjeta = document.getElementById(id);
    const tarjetaChild = tarjeta.firstElementChild;

    const actual = new Date().getTime();

    //Conversión de fecha a formato %Y-%m-%d y creación de fecha
    const fechaSplit = fecha.split("/");
    const fechaAConvertir = fechaSplit[2] + "-" + fechaSplit[1] + "-" + fechaSplit[0];
    const fechaFinal = new Date(fechaAConvertir).getTime();

    if (fechaFinal > actual) tarjetaChild.style.backgroundColor = 'red'
    else if (fechaFinal < actual) tarjetaChild.style.backgroundColor = 'green'
    else tarjetaChild.style.backgroundColor = 'blue';
}

const definirColorSeña = (id)=>{
    const seña = document.getElementById(id);
    const valorSeña = seña.innerText;
    
    if (valorSeña == 0) {
        seña.style.color = 'red';
        seña.innerText = 'No señado';
    }
    else seña.style.color = 'green'
}