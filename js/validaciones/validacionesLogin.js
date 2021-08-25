function validarCamposIngreso(){

    let correo, contrasena;

    correo = document.getElementById("correoUsuario").value;
    contrasena = document.getElementById("contrasenaUsuario").value;

    if(correo == ""){
        alert("Debe ingresar su correo electrónico");
        return false;
    }
    else if(contrasena == ""){
        alert("Debe ingresar su contraseña");
        return false;
    }
    else if(contrasena.length < 8){
        alert("La contraseña debe tener mínimo 8 caracteres ");
        return false;
    }
    else if(contrasena.length > 15){
        alert("La contraseña debe tener máximo 15 caracteres");
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

    if(nombre == ""){
        alert("Debe ingresar su nombre");
        return false;
    }
    else if(apellido == ""){
        alert("Debe ingresar sus apellidos");
        return false;
    }
    else if(correo == ""){
        alert("Debe ingresar un correo electrónico");
        return false;
    }
    else if(!expresionCorreo.test(correo)){
        alert("Debe ingresar un formato válido de correo electrónico");
        return false;
    }
    else if(contrasena == ""){
        alert("Debe ingresar una contraseña");
        return false;
    }
    else if(contrasena.length < 8){
        alert("La contraseña debe tener mínimo 8 caracteres ");
        return false;
    }
    else if(contrasena.length > 15){
        alert("La contraseña debe tener máximo 15 caracteres");
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
        alert("Debe ingresar una contraseña");
        return false;
    }
    else if(contrasena.length < 8){
        alert("La contraseña debe tener mínimo 8 caracteres");
        return false;
    }
    else if(contrasena.length > 15){
        alert("La contraseña debe tener máximo 15 caracteres");
        return false;        
    }

}