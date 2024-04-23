
var identificacionExiste = "no";
var correoExiste = "no";
var urlAjax = "http://localhost/timecrafters/views/modules/usuarios/ajaxUsuarios.php";

document.getElementById("formularioUsuarios").addEventListener("submit",  function(event) {

    event.preventDefault();

    var nombres = document.querySelector("#nombres").value;
    var apellidos = document.querySelector("#apellidos").value;
    var tipoIdentificacion = document.querySelector("#tipoIdentificacion").value;
    var identificacion = document.querySelector("#identificacion").value;
    var correo = document.querySelector("#correo").value;
    var estado = document.querySelector("#estado").value;
    var ciudades = document.querySelector("#ciudades").value;

    patronNombre = /^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/;
    patronIdentificacion = /^[0-9]{5,12}$/;
    patronCorreo = /^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/;

    // Valida si ya existen

    
    if (identificacionExiste == "si") {
        document.querySelector("label[for='identificacion'] span").innerHTML = "<br>Este usuario ya existe";
        $("label[for='identificacion'] span").css('color', red);
        return false;
    }
    
    if (correoExiste == "si") {
        document.querySelector("label[for='correo'] span").innerHTML = "<br>Este correo ya existe";
        $("label[for='correo'] span").css('color', red);
    }
    
    if (identificacion.length < 5) {
        document.querySelector("label[for='identificacion']").innerHTML += "<br>Identificacion no valida, cantidad de caracteres minimos no alcanzados";
        $("label[for='identificacion'] span").css('color', 'red');
        return false;
    }

    if (identificacion.length > 12) {
        document.querySelector("label[for='identificacion']").innerHTML += "<br>Identificacion no valida, cantidad de caracteres maximos superados";
        $("label[for='identificacion'] span").css('color', 'red');
        return false;
    }
    
    // Validar formularios
    
    if (!patronNombre.test(nombres)) {
        document.querySelector("label[for='nombres']").innerHTML += "<br>Digite un nombre valido";
        return false;
    }

    if (!patronNombre.test(apellidos)) {
        document.querySelector("label[for='apellidos']").innerHTML += "<br>Digite un apellido valido";
        return false;
    }

    if (!patronNombre.test(tipoIdentificacion)) {
        document.querySelector("label[for='tipoIdentificacion']").innerHTML += "<br>Ingrese un tipo de identificación valida";
        return false;
    }

    if (!patronIdentificacion.test(identificacion)) {
        document.querySelector("label[for='identificacion']").innerHTML += "<br>Ingrese una identificación valida";
        return false;
    }

    if (!patronCorreo.test(correo)) {
        document.querySelector("label[for='correo']").innerHTML += "<br>Ingrese un correo valido";
        return false;
    }

    if (!patronNombre.test(estado)) {
        document.querySelector("label[for='estado']").innerHTML += "<br>Ingrese un estado valido";
        return false; 
    }


    if (!patronNombre.test(estado)) {
        document.querySelector("label[for='estado']").innerHTML += "<br>Ingrese un estado valido";
        return false; 
    }

    // me falta ciudaes

    $(this).submit();
    alert("llegue");

});



// AJAX //

$("#identificacion").change(function () {
    var identificacion = $("#identificacion").val();
    var datos = new FormData();
    datos.append('identificacion', identificacion);
    $.ajax({
        url: urlAjax,
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta == 'si') {
                $("label[for='identificacion'] span").html("<br>Este usuario ya existe");
                $("label[for='identificacion'] span").css('color', 'red');
                identificacionExiste = "si";
            }
            else {
                $("label[for='identificacion'] span").html("");
                identificacionExiste = "no";
            }
        }
    })
})