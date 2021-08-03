<?php

    class CrudProducto{

        public function __construct(){

        }

        public function listarProductos(){
            $Db = Db::Conectar();
            $sql= $Db->query("SELECT p.IdProducto, p.NombreProducto, p.Descripcion,
            p.FechaRegistro, p.Precio, c.NombreCategoria FROM productos p JOIN categorias c
            ON p.Idcategoria = c.IdCategoria");
            $sql->execute();
            Db::CerrarConexion($Db);
            return $sql->fetchAll();
        }

    }

?>