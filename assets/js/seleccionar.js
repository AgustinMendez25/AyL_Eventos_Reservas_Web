"use strict";

const clientes = document.querySelectorAll(".cliente");

const cli = document.getElementById("clienteExistente");
const idCli = document.getElementById("idCliente");

const nombreC = document.getElementById("nombreCliente");
const mailC = document.getElementById("mailCliente");
const telC = document.getElementById("telefonoCliente");

const btnCli = document.getElementById("btnClientes");

for (const i of clientes) {
    i.addEventListener("click", ()=>{
        i.style.animation = "colorear 2s";
        modalClientes.style.visibility = "hidden";
        modalClientes.style.opacity = "0";
        modalClientesCaja.style.transform = "translateY(-30%)";
        modalClientes.style.pointerEvents = "none";

        cli.style.display = "inline-block";
        cli.setAttribute("value", i.innerHTML);
        cli.setAttribute("readonly","");
        idCli.setAttribute("value", i.getAttribute("value"));

        nombreC.style.display = "none";
        mailC.style.display = "none";
        telC.style.display = "none";

        btnCli.innerHTML = "Elegir otro cliente"
    })
}