function validarEliminarUsuarios(event) {

    event.preventDefault();
    url = event.currentTarget.getAttribute('href');
    urlArray = url.split("/");

    Swal.fire({
        title: "¿Esta seguro de eliminar este registro?",
        text: "!No podra revertir los cambios!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Eliminar"
    }).then((result) => {
        
    }) 



}