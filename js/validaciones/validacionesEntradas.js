
function validarRegistroDetalle(){

    let color,talla, cantidad, expresionNumeros;

    color = document.getElementById("color").value;
    talla = document.getElementById("talla").value;
    cantidad = document.getElementById("cantidad").value;

    expresionNumeros = /^[0-9]+$/;

    expresionColor = /^([a-zA-Z_][a-zA-Z ]*[a-zA-Z_]$)/;

    expresionTalla = /[a-zA-Z0-9_]/;

    if(color == ""){
        Swal.fire("Debe ingresar el color");
        return false;
    }
    else if(talla == ""){
        Swal.fire("Debe ingresar la talla");
        return false;
    }
    else if(cantidad == ""){
        alert("Debe ingresar la cantidad");
        return false;
    }
    else if(expresionNumeros.test(cantidad)){
        Swal.fire("El campo de cantidad solo debe contener números");
        return false;
    }
    else if(!expresionColor.test(color)){
        Swal.fire("El Campo color no debe contener caracteres especiales o números");
        return false;
    }
    else if(!expresionTalla.test(talla)){
        Swal.fire("El Campo talla no debe contener caracteres especiales o números");
        return false;
    }

}

function validarBusquedaEntrada(){

   let nombreProducto;
    nombreProducto = document.getElementById("buscarProducto").value;

    if(nombreProducto == "Seleccione un producto para ver sus entradas"){
        Swal.fire("Debe seleccionar un producto para realizar la búsqueda");
        return false;
    }

}

function validarRegistroEntrada(){

    let nuevaCantidad, expresionNumeros;

    expresionNumeros = /^[0-9]+$/;
    nuevaCantidad = document.getElementById("nuevaEntrada").value;

    if(nuevaCantidad == ""){
        Swal.fire("Debe ingresar la cantidad");
        return false;
    }
    else if(!expresionNumeros.test(nuevaCantidad)){
        Swal.fire("El campo de agregar nueva cantidad solo debe contener números");
        return false;
    }

}