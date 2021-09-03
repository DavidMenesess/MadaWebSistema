 
 function validarRegistroCategoria(){
        
    let nombreCategoria, imagenCategoria;
    
    nombreCategoria = document.getElementById("nombreCategoria").value;
    imagenCategoria = document.getElementById("foto").value;

    if(nombreCategoria == ""){
        alert("Debe ingresar el nombre de la categoría");
        return false;
    }
    else if(imagenCategoria == ""){
        alert("Debe cargar la imagen de la categoría")
        return false;
    }

 }

 function validarEditNombre(){

    let nuevoNombre;

    nuevoNombre = document.getElementById("nuevoNombreCategoria").value;

    if(nuevoNombre == ""){
        alert("Debe ingresar el nombre de la categoría");
        return false;
    }
 }

 function validarEditImagen(){

    let nuevaImagenCategoria;

    nuevaImagenCategoria = document.getElementById("nuevaImagenCategoria").value;

    if(nuevaImagenCategoria == ""){
        alert("Debe cargar la imagen de la categoría");
        return false;
    }
 }

 function validarEditAmbas(){
        
    let nuevoNombre, nuevaImagen;
    
    nuevoNombre = document.getElementById("nuevoNombre").value;
    nuevaImagen = document.getElementById("nuevaImagen").value;

    if(nuevoNombre == ""){
        alert("Debe ingresar el nombre de la categoría");
        return false;
    }
    else if(nuevaImagen == ""){
        alert("Debe cargar la imagen de la categoria");
        return false;
    }

 }