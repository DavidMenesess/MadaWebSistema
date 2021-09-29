function validarSeleccionProducto(){

   let tallaProducto, colorProducto, cantidadProducto;

    
    tallaProducto = document.getElementById("tallaProducto").value;
    colorProducto = document.getElementById("colorProducto").value;
    cantidadProducto = document.getElementById("cantidadProducto").value;

    if(tallaProducto == "Selecciona"){

        Swal.fire('Selecciona una talla');
        return false;

     }
     else if(colorProducto == "" || colorProducto == "Selecciona"){
        Swal.fire('Selecciona un color');
        return false;
     }
     else if(cantidadProducto == 0){
        Swal.fire('La cantidad del producto  no debe ser 0');
        return false;
     }

}