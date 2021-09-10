function validarCamposIngreso(){

    let correo, contrasena;

    correo = document.getElementById("correoUsuario").value;
    contrasena = document.getElementById("contrasenaUsuario").value;
    expresionCorreo = /\w+@\w+\.+[a-z]/;


    if(correo == "" || contrasena == ""){
        Swal.fire("Todos los campos deben ser diligenciados");
        return false;
    }
    else if(!expresionCorreo.test(correo)){
        Swal.fire("Debe ingresar un formato válido de correo electrónico");
        return false;
    }
    else if(contrasena.length < 8){
        Swal.fire("La contraseña debe tener mínimo 8 caracteres");
        return false;
    }
    else if(contrasena.length > 15){
        Swal.fire("La contraseña debe tener máximo 15 caracteres");
        return false;
    }


}


function validarCamposRegistrar(){

    let nombre, apellido, correo, contrasena, expresionCorreo;

    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    correo = document.getElementById("correo").value;
    contrasena = document.getElementById("contrasena").value;

    expresionCorreo = /\w+@\w+\.+[a-z]/;

    if(nombre == "" || apellido == "" || correo == "" || contrasena == ""){
        Swal.fire("Todos los campos deben ser diligenciados");
        return false;
    }
    else if(!expresionCorreo.test(correo)){
        Swal.fire("Debe ingresar un formato válido de correo electrónico");
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

function validarCorreoRestablecer(){
    
    let correo, expresionCorreo;
    expresionCorreo = /\w+@\w+\.+[a-z]/;

    correo = document.getElementById("recuperarContra").value;

    if(correo == ""){
        alert("Debe ingresar el correo electrónico con el cual se encuentra registrado");
        return false;
    }
    else if(!expresionCorreo.test(correo)){
        alert("Debe ingresar un formato válido de correo electrónico");
        return false;
    }

}

function validarContrasenaRestablecer(){

    let contrasena;

    contrasena = document.getElementById("nuevaContrasena").value;

    if(contrasena == ""){
        Swal.fire("Debe ingresar una contraseña");
        return false;
    }
    else if(contrasena.length < 8){
        Swal.fire("La contraseña debe tener mínimo 8 caracteres");
        return false;
    }
    else if(contrasena.length > 15){
        Swal.fire("La contraseña debe tener máximo 15 caracteres");
        return false;        
    }

}