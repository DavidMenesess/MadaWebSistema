<?php 

class categoria{
    private $IdCategoria;
    private $NombreCategoria;
    private $UrlImagen;
    private $estado;

    public function __construct(){

    }

    

    public function setId_Categoria($IdCategoria){
        $this->IdCategoria = $IdCategoria;
    }
    public function setNombreCategoria($NombreCategoria){
        $this->NombreCategoria = $NombreCategoria;
    }
    public function setUrlImagen($UrlImagen){
        $this->UrlImagen = $UrlImagen;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }
    

    public function getId_Categoria(){
        return $this->IdCategoria;
    }
        
    public function getNombreCategoria(){
        return $this->NombreCategoria;
    }
    public function getUrlImagen(){
        return $this->UrlImagen;
    }

    public function getEstado(){
        return $this->estado;
    }
    
}
