
function validarRegistroDetalle(){

    /*let color,talla, cantidad;

    color = document.getElementById("color").value;
    talla = document.getElementById("talla").value;
    cantidad = document.getElementById("cantidad").value;

    if(color == ""){
        alert("Debe ingresar el color");
        return false;
    }
    else if(talla == ""){
        alert("Debe ingresar la talla");
        return false;
    }
    else if(cantidad == ""){
        alert("Debe ingresar la cantidad");
        return false;
    }*/

}

function validarBusquedaEntrada(){

   let nombreProducto;
    nombreProducto = document.getElementById("buscarProducto").value;

    if(nombreProducto == "Seleccione un producto para ver sus entradas"){
        alert("Debe seleccionar un producto para realizar la búsqueda");
        return false;
    }

}

function validarRegistroEntrada(){

    let nuevaCantidad, expresionNumeros;

    expresionNumeros = /^[0-9]+$/;
    nuevaCantidad = document.getElementById("nuevaEntrada").value;

    if(nuevaCantidad == ""){
        alert("Debe ingresar la cantidad");
        return false;
    }
    else if(!expresionNumeros.test(nuevaCantidad)){
        alert("El campo de agregar más cantidad solo debe contener números");
        return false;
    }

}