function validarIngreso(){

    let correo = document.getElementById('correoUsuario').value;
    let contrasena = document.getElementById('contrasena').value;

    if(correo.trim() == "" ||contrasena.trim() == ""){

        Swal.fire({
            icon: 'error',
            title: 'Por favor ingresa todos los datos.\n🙄😁',
           
          })
          
    }
    else{
        let botonEnviar = document.getElementById('validarAcceso');
        botonEnviar.setAttribute("type","submit")
    }

}

function validarRegistro(){

    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let correo = document.getElementById("correo").value;
    let contrasena = document.getElementById("contrasena").value;

    if(nombre.trim() == "" || apellido.trim() == "" || correo.trim() == "" || contrasena.trim() == ""){
        Swal.fire({
            icon: 'error',
            title: 'Por favor ingresa todos los datos.\n🙄😁',
          })
    }
    else{
        //document.getElementById("registrarUsuario").setAttribute("type", "submit");
        let btnRegistrar = document.getElementById('registrarUsuario');
        btnRegistrar.setAttribute("type", "submit");
    }
}

function validaRecuperar(){

    let correoRestablecer = document.getElementById("recuperarContra").value;

    if(correoRestablecer.trim() == ""){

        Swal.fire({
            icon: 'error',
            title: 'Por favor ingresa todos los datos.\n🙄😁',
          })
    }
    else{
        
        let botonRestablecer = document.getElementById('restablecer').value;
        botonRestablecer.setAttribute("type","submit");
    }
}

function validaRestablecer(){

    let contrasena = document.getElementById("nuevaContrasena").value;
    
    if(contrasena.trim == ""){
        Swal.fire({
            icon: 'error',
            title: 'Por favor ingresa todos los datos.\n🙄😁',
          })
    }else{
        let botonGuardarContrasena = document.getElementById('guardarNuevaContra').value;
        botonGuardarContrasena.setAttribute("type","submit");
    }

}


