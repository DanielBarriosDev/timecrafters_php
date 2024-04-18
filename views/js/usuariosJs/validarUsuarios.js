
var identificacionExiste = "no";
var correoExiste = "no";

document.getElementById("formularioUsuarios").addEventListener("submit",  function(event) {

    var nombres = document.querySelector("#nombres").value;
    var apellidos = document.querySelector("#apellidos").value;
    var tipoIdentificacion = document.querySelector("#tipoIdentificacion").value;
    var identificacion = document.querySelector("#identificacion").value;
    var correo = document.querySelector("#correo").value;
    var estado = document.querySelector("#estado").value;
    var ciudades = document.querySelector("#ciudades").value;

    patronNombre = '/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/';
    patronIdentificacion = '/^[0-9]{5,12}$/';
    patronCorreo = '/^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}+$/';

    // Valida si ya existen

    if (identificacionExiste == "si") {
        document.querySelector("label[for='identificacion'] span").innerHTML = "<br>Este usuario ya existe";
        $("label[for='identificacion'] span").css('color', red);
        return false;
    }

    if (correo == "si") {
        document.querySelector("label[for='correo'] span").innerHTML = "<br>Este correo ya existe";
        $("label[for='correo'] span").css('color', red);
    }

    // Validar formularios

    if (!patronNombre.test(nombres)) {
        document.querySelector("label[for='nombres']").innerHTML += "<br>Digite un nombre valido";
        return false;
    }

    if (!patronNombre.test(apellidos)) {
        document.querySelector("label[for='apellidos']").innerHTML += "Digite un apellido valido";
        return false;
    }

    if (!patronNombre.test(tipoIdentificacion)) {
        document.querySelector("label[for='tipoIdentificacion']"). innerHTML += ""
    }

})