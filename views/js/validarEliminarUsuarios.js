function validarEliminarUsuarios(event) {

    event.preventDefault();
    url = event.currentTarget.getAttribute('href');
    alert(url);

    urlArray = url.split("/");

    Swal.fire({
        title: "¿Esta seguro de eliminar este registro?",
        text: "!No podra revertir los cambios!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonColor: "#5ebea3",
        confirmButtonText: "Eliminar"
    }).then((result) => {
        if (result.isConfirmed) {
            var operacion = urlArray[7];
            var id = urlArray[6];   
            var datos = new FormData(); 
            var fila = '#fila' + id;

            datos.append("id", id);
            datos.append("ope", operacion);
            $.ajax ({
                url: "http://localhost/timecrafters/views/modules/usuarios/ajaxUsuarios.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {
                    // console.log(respuesta);
                    if (respuesta == "success") {
                        Swal.fire({
                            title: "Eliminado!",
                            text: "Tu registro se ha eliminado correctamente",
                            icon: "success"
                        });
                        $(fila).remove();
                    }
                    else {
                        Swal.fire({
                            title: "!ERROR! Registro no eliminado",
                            text: "El registro no fue eliminado",
                            icon: "error"
                        }); 
                    }
                } 
            })
        }
    }) 

    return false;


}