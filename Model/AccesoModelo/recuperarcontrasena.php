<?php

class recuperarcontrasena{

    private $id_recuperar;
    private $codigo;
    private $correo;

    public function __construct(){

    }

    public function setIdUsuario($id_recuperar){
		$this->id_recuperar = $id_recuperar;
	}

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }
    //GET

    public function getIdRecuperar(){
		return $this->id_recuperar;
	}

    public function getCodigo(){
        return $this->codigo;
    }

    public function getCorreo(){
        return $this->correo;
    }
}
