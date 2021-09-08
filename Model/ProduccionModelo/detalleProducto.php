<?php

    class DetalleProducto{

        private $idDetalleProducto;
        private $color;
        private $talla;
        private $stock;
        private $idProducto;
        private $estado;

        public function __construct(){

        }

        public function setIdDetalleProducto($idDetalleProducto){
            $this->idDetalleProducto = $idDetalleProducto;
        }

        public function setColor($color){
            $this->color = $color;
        }

        public function setTalla($talla){
            $this->talla = $talla;
        }

        public function setStock($stock){
            $this->stock = $stock;
        }

        public function setIdProducto($idProducto){
            $this->idProducto = $idProducto;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }

        //GETTERS

        public function getIdDetalleProducto(){
            return $this->idDetalleProducto;
        }

        public function getColor(){
            return $this->color;
        }

        public function getTalla(){
            return $this->talla;
        }

        public function getStock(){
            return $this->stock;
        }

        public function getIdProducto(){
            return $this->idProducto;
        }

        public function getEstado(){
            return $this->estado;
        }


    }
