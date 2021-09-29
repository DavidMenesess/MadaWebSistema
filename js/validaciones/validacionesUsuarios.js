function  validarRegistroAdmin(){

    let nombre, apellido, correo, contrasena, expresionCorreo, expresionNombreApellido;

    nombre = document.getElementById("Nombre").value;
    apellido = document.getElementById("Apellido").value;
    correo = document.getElementById("Correo").value;
    contrasena = document.getElementById("Contrasena").value;

    expresionCorreo = /\w+@\w+\.+[a-z]/;

    expresionNombreApellido = /^([a-zA-Z_][a-zA-Z ]*[a-zA-Z_]$)/;


    if(nombre == "" || apellido == "" || correo == "" || contrasena == ""){
        Swal.fire('Todos los campos deben ser diligenciados');
        return false;
    }
    else if(!expresionCorreo.test(correo)){
        Swal.fire("Debe ingresar un formato válido de correo electrónico");
        return false;
    }
    else if(!expresionNombreApellido.test(nombre)){
        Swal.fire("El campo Nombre no debe contener caracteres especiales o números");
        return false;
    }
    else if(!expresionNombreApellido.test(apellido)){
        Swal.fire("El campo Apellido no debe contener caracteres especiales o números");
        return false;
    }
    else if(contrasena.length < 8){
        Swal.fire("La contraseña debe tener mínimo 8 caracteres ");
        return false;
    }
    else if(contrasena.length > 15){
        Swal.fire("La contraseña debe tener máximo 15 caracteres");
        return false;
    }

}

function validarRegistroCliente(){

    nombre = document.getElementById("Nombre").value;
    apellido = document.getElementById("Apellido").value;
    correo = document.getElementById("Correo").value;
    contrasena = document.getElementById("Contrasena").value;

    expresionCorreo = /\w+@\w+\.+[a-z]/;

    expresionNombreApellido = /^([a-zA-Z_][a-zA-Z ]*[a-zA-Z_]$)/;


    if(nombre == "" || apellido == "" || correo == "" || contrasena == ""){
        Swal.fire('Todos los campos deben ser diligenciados');
        return false;
    }
    else if(!expresionCorreo.test(correo)){
        Swal.fire("Debe ingresar un formato válido de correo electrónico");
        return false;
    }
    else if(!expresionNombreApellido.test(nombre)){
        Swal.fire("El campo Nombre no debe contener caracteres especiales o números");
        return false;
    }
    else if(!expresionNombreApellido.test(apellido)){
        Swal.fire("El campo Apellido no debe contener caracteres especiales o números");
        return false;
    }
    else if(contrasena.length < 8){
        Swal.fire("La contraseña debe tener mínimo 8 caracteres ");
        return false;
    }
    else if(contrasena.length > 15){
        Swal.fire("La contraseña debe tener máximo 15 caracteres");
        return false;
    }

}


function validarEditAdministrador() {

    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;

    if (nombre == "" || apellido == "") {
        Swal.fire("Todos los campos deben ser diligenciados");
        return false;
    }

}

