
function eliminarCiudades (event) {

    event.preventDefault();
    url = event.currentTarget.getAttribute('href');
    // alert(url);

    urlArray = url.split("/");

    Swal.fire({
        title: "¿Esta seguro de eliminar esta ciudad?",
        text: "!No podra revertir los cambios!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonColor: "#5ebea3",
        confirmButtonText: "Eliminar"
    }).then((result) => {
        if (result.isConfirmed) {
            var operacion = urlArray[5];
            var id = urlArray[6]
            var datos = new FormData();
            var fila = '#fila' + id;
            datos.append("ope", operacion);
            datos.append("id", id);
            $.ajax ({
                url: "http://localhost/timecrafters/views/modules/ciudades/ajaxCiudades.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {
                    console.log(respuesta);
                    
                    if (respuesta.trim() == "ok") {
                        Swal.fire({
                            title: "Eliminado!",
                            text: "La ciudad se ha eliminado correctamente",
                            icon: "success"
                        });
                        $(fila).remove();
                    }
                    else {
                        Swal.fire({
                            title: "!ERROR! Ciudad no eliminada",
                            text: "La ciudad no fue eliminada",
                            icon: "error"
                        }); 
                    }
                } 
            })
        }
    })
}