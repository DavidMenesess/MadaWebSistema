<?php

    class Imagen{

        private $idImagen;
        private $urlImagen1;
        private $urlImagen2;
        private $urlImagen3;
        private $idProducto;

        public function __construct(){

        }

        public function setIdImagen($idImagen){
            $this->idImagen = $idImagen;
        }

        public function setUrlImagen1($urlImagen1){
            $this->urlImagen1 = $urlImagen1;
        }

        public function setUrlImagen2($urlImagen2){
            $this->urlImagen2 = $urlImagen2;
        }

        public function setUrlImagen3($urlImagen3){
            $this->urlImagen3 = $urlImagen3;
        }

        public function setIdProducto($idProducto){
            $this->idProducto = $idProducto;
        }

        public function getIdImagen(){
            return $this->idImagen;
        }

        public function getUrlImagen1(){
            return $this->urlImagen1;
        }

        public function getUrlImagen2(){
            return $this->urlImagen2;
        }

        public function getUrlImagen3(){
            return $this->urlImagen3;
        }

        public function getIdProducto(){
            return $this->idProducto;
        }

    }

?>