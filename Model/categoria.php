<?php 

class categoria{
    private $IdCategoria;
    private $NombreCategoria;
    private $UrlImagen;

    public function __construct(){

    }

    public function setId_Categoria($IdCategoria){
        $this->IdCategoria = $IdCategoria;
    }
    public function setNombreCategoria($NombreCategoria){
        $this->NombreCategoria = $NombreCategoria;
    }
    public function setUrlImagen($UrlImagen){
        $this->setUrlImagen = $UrlImagen;
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
    
}

?>