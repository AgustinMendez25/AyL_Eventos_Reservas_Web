"use strict";

const definirColorTarjeta = (fecha, id)=>{
    const tarjeta = document.getElementById(id);
    const tarjetaChild = tarjeta.firstElementChild;

    const actual = new Date().getTime();

    //Conversión de fecha a formato %Y-%m-%d y creación de fecha
    const fechaSplit = fecha.split("/");
    const fechaAConvertir = fechaSplit[2] + "-" + fechaSplit[1] + "-" + fechaSplit[0];
    const fechaFinal = new Date(fechaAConvertir).getTime();

    if (fechaFinal < actual) tarjetaChild.style.backgroundColor = 'rgb(11, 169, 5)'
    else tarjetaChild.style.backgroundColor = 'rgb(169, 16, 5)'
}

const definirColorSeña = (id)=>{
    const seña = document.getElementById(id);
    const valorSeña = seña.innerText;
    
    if (valorSeña == 0) {
        seña.style.color = 'rgb(169, 16, 5)';
        seña.innerText = 'No señado';
    }
    else seña.style.color = 'green'
}

const setearDatosNulos = (id)=> {
    const datos = document.getElementById(id).children;
    if (datos[1].innerText == "Telefono:"){
        datos[1].innerText = "Telefono: No registrado"
    }
    if (datos[2].innerText =="Mail:"){
        datos[2].innerText = "Mail: No registrado"
    }
}