<?php

class usuario{

    //private $idusuario;
    private $nombre;
    private $apellido;
    private $correo;
    private $contrasena;
    private $estado;
    private $rol;
    private $existe;
    

    public function __construct(){

    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function setRol($rol){
        $this->rol = $rol;
    }

    public function setExiste($existe){
        $this->existe = $existe;
    }
    //GET

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getContrasena(){
        return $this->contrasena;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function getRol(){
        return $this->rol;
    }

    public function getExiste(){
        return $this->existe;
    }

}

/*
$usuario = new Usuario();
$usuario->setNombre('David Enrique');
$usuario->setApellido('Meneses Solorzano');
$usuario->setDocumento('1001682404');
$usuario->setDireccion('CLL 83 # 90 A 36 ROBLEDO VILLA SOFIA');
$usuario->setTelefono('3046056314');
$usuario->setCorreo('david@correo.com');
$usuario->setContrasena('12345');
$usuario->setEstado(1);
$usuario->setRol(1);

var_dump($usuario);
*/ 
//Comprobamos que si se crea el objeto de tipo usuario

?>