function validarLogin(){

    let correo = document.getElementById('inputEmailAddress').value;
    let contrasena = document.getElementById('inputEmailAddress').value; 

    if(correo == "" ||contrasena == ""){

        Swal.fire({
            icon: 'error',
            title: 'Ningún campo debe quedar vacío',
           
          })

    }
    

    else{

        Swal.fire({
            icon: 'success',
            title: 'Ingresando...',
           
          })
    }

}
