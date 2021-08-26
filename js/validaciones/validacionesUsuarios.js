function  validarRegistroAdmin(){

    let nombre, apellido, correo, contrasena, expresionCorreo;

    nombre = document.getElementById("Nombre").value;
    apellido = document.getElementById("Apellido").value;
    correo = document.getElementById("Correo").value;
    contrasena = document.getElementById("Contrasena").value;

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

function validarRegistroCliente(){

    nombre = document.getElementById("Nombre").value;
    apellido = document.getElementById("Apellido").value;
    correo = document.getElementById("Correo").value;
    contrasena = document.getElementById("Contrasena").value;

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