<?php

class Producto
{

    private $id;
    private $nombreProducto;
    private $descripción;
    private $estado;
    private $precio;
    private $idCategoria;
    private $imagen1;
    private $imagen2;
    private $imagen3;

    public function __construct()
    {
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
    }

    public function setDescripcion($descripción)
    {
        $this->descripción = $descripción;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }


    public function setCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    public function setImagen1($imagen1)
    {
        $this->imagen1 = $imagen1;
    }

    public function setImagen2($imagen2)
    {
        $this->imagen2 = $imagen2;
    }

    public function setImagen3($imagen3)
    {
        $this->imagen3 = $imagen3;
    }

    //GETTERS

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombreProducto;
    }

    public function getDescripcion()
    {
        return $this->descripción;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getCategoria()
    {
        return $this->idCategoria;
    }

    public function getImagen1()
    {
        return $this->imagen1;
    }

    public function getImagen2()
    {
        return $this->imagen2;
    }

    public function getImagen3()
    {
        return $this->imagen3;
    }
}
