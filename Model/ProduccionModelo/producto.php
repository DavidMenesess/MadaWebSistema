<?php

    class Producto{

        private $id;
        private $nombreProducto;
        private $descripción;
        private $fechaRegistro;
        private $precio;
        private $idCategoria;

        public function __construct(){

        }

        public function setId($id){
            $this->id = $id;
        }

        public function setNombreProducto($nombreProducto){
            $this->nombreProducto = $nombreProducto;
        }

        public function setDescripcion($descripción){
            $this->descripción = $descripción;
        }

        public function setFechaRegistro($fechaRegistro){
            $this->fechaRegistro = $fechaRegistro;
        }

        public function setPrecio($precio){
            $this->precio = $precio;
        }


        public function setCategoria($idCategoria){
            $this->idCategoria = $idCategoria;
        }

        //GETTERS

        public function getId(){
            return $this->id;
        }

        public function getNombreProducto(){
            return $this->nombreProducto;
        }

        public function getDescripcion(){
            return $this->descripción;
        }

        public function getFechaRegistro(){
            return $this->fechaRegistro;
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function getCategoria(){
            return $this->idCategoria;
        }
    }

    /*$vestido = new Producto;

    $vestido->setId(111);
    $vestido->setNombreProducto("Vestido rojo");
    $vestido->setDescripcion("Vestido corto de color rojo especial para...");
    $vestido->setFechaRegistro("2021-08-02");
    $vestido->setPrecio(30000);
    $vestido->setCategoria("Vestidos");

    var_dump($vestido);*/

?>