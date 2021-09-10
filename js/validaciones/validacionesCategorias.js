 
 function validarRegistroCategoria(){
        
    let nombreCategoria, imagenCategoria;
    
    nombreCategoria = document.getElementById("nombreCategoria").value;
    imagenCategoria = document.getElementById("foto").value;

    if(nombreCategoria == ""){
        Swal.fire("Debe ingresar el nombre de la categoría");
        return false;
    }
    else if(imagenCategoria == ""){
        Swal.fire("Debe cargar la imagen de la categoría")
        return false;
    }

 }

 function validarEditNombre(){

    let nuevoNombre;

    nuevoNombre = document.getElementById("nuevoNombreCategoria").value;

    if(nuevoNombre == ""){
        Swal.fire("Debe ingresar el nombre de la categoría");
        return false;
    }
 }

 function validarEditImagen(){

    let nuevaImagenCategoria;

    nuevaImagenCategoria = document.getElementById("nuevaImagenCategoria").value;

    if(nuevaImagenCategoria == ""){
        Swal.fire("Debe cargar la imagen de la categoría");
        return false;
    }
 }

 function validarEditAmbas(){
        
    let nuevoNombre, nuevaImagen;
    
    nuevoNombre = document.getElementById("nuevoNombre").value;
    nuevaImagen = document.getElementById("nuevaImagen").value;

    if(nuevoNombre == ""){
        Swal.fire("Debe ingresar el nombre de la categoría");
        return false;
    }
    else if(nuevaImagen == ""){
        Swal.fire("Debe cargar la imagen de la categoria");
        return false;
    }

 }