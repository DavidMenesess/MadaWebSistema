
function validarRegistroProducto(){

    let nombre, descripcion, precio, categoria, imagen1, imagen2, imagen3, expresionNumeros;

    expresionNumeros = /^[0-9]+$/;

    nombre = document.getElementById("nombreProducto").value;
    descripcion = document.getElementById("descripcionProducto").value;
    precio = document.getElementById("precioProducto").value;
    categoria = document.getElementById("categoriaProducto").value;
    imagen1 = document.getElementById("foto1").value;
    imagen2 = document.getElementById("foto2").value;
    imagen3 = document.getElementById("foto3").value;

    if(nombre == ""){
        alert("Debe ingresar el nombre del producto");
        return false;
    }
    else if(descripcion == ""){
        alert("Debe ingresar la descripción del produto");
        return false;
    }
    else if(precio == ""){
        alert("Debe ingresar el precio del producto");
        return false;
    }
    else if(!expresionNumeros.test(precio)){
        alert("El campo Precio solo debe contener númeos");
        return false;
    }
    else if(categoria == "Seleccionar"){
        alert("Debe seleccionar una categoria para el producto");
        return false;
    }
    else if(imagen1 == ""){
        alert("Debe cargar la imagen #1 del producto");
        return false;
    }
    else if(imagen2 == ""){
        alert("Debe cargar la imagen #2 del producto");
        return false;
    }
    else if(imagen3 == ""){
        alert("Debe cargar la imagen #3 del producto");
        return false;
    }
    
}

function validarEditDatosProducto(){

    let nombre, descripcion, precio, expresionNumeros;

    expresionNumeros = /^[0-9]+$/;

    nombre = document.getElementById("nombre").value;
    descripcion = document.getElementById("descripcion").value;
    precio = document.getElementById("precioNuevo").value;

    if(nombre == ""){
        alert("Debe ingresar el nombre del producto");
        return false;
    }
    else if(descripcion == ""){
        alert("Debe ingresar la descripción del produto");
        return false;
    }
    else if(precio == ""){
        alert("Debe ingresar el precio del producto");
        return false;
    }
    else if(!expresionNumeros.test(precio)){
        alert("El campo Precio solo debe contener númeos");
        return false;
    }
}

function validarEditImagen1(){

    let nuevaImagen1;
    nuevaImagen1 = document.getElementById("imagen1Nueva").value;

    if(nuevaImagen1 == ""){
        alert("Debe cargar la nueva imagen #1 del producto");
        return false;
    }
}


function validarEditImagen2(){

    let nuevaImagen2;
    nuevaImagen2 = document.getElementById("imagen2Nueva").value;

    if(nuevaImagen2 == ""){
        alert("Debe cargar la nueva imagen #2 del producto");
        return false;
    }
}

function validarEditImagen3(){

    let nuevaImagen3;
    nuevaImagen3 = document.getElementById("imagen3Nueva").value;

    if(nuevaImagen3 == ""){
        alert("Debe cargar la nueva imagen #3 del producto");
        return false;
    }
}


function validarEditImagenes(){

    let nuevaImagen1, nuevaImagen2, nuevaImagen3;

    nuevaImagen1 = document.getElementById("imagen1").value;
    nuevaImagen2 = document.getElementById("imagen2").value;
    nuevaImagen3 = document.getElementById("imagen3").value;

    if(nuevaImagen1 == ""){
        alert("Debe cargar la imagen #1 del producto");
        return false;
    }
    else if(nuevaImagen2 == ""){
        alert("Debe cargar la imagen #2 del producto");
        return false;
    }
    else if(nuevaImagen3 == ""){
        alert("Debe cargar la imagen #3 del producto");
        return false;
    }

}


