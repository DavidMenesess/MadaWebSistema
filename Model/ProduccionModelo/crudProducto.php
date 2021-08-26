<?php

    class CrudProducto{

        public function __construct(){

        }

        public function listarProductos(){
            $Db = Db::Conectar();
            $sql= $Db->query("SELECT p.IdProducto, p.NombreProducto, p.Descripcion,
            p.Estado, p.Precio, p.Imagen1, p.Imagen2, p.Imagen3, c.NombreCategoria FROM productos p JOIN categorias c
            ON p.Idcategoria = c.IdCategoria");
            $sql->execute();
            Db::CerrarConexion($Db);
            return $sql->fetchAll();
        }

        public function obtenerCategorias(){
            $Db = Db::Conectar();
            $sql= $Db->query("SELECT IdCategoria,NombreCategoria FROM categorias WHERE Estado = 1");
            $sql->execute();
            Db::CerrarConexion($Db);
            return $sql->fetchAll();
        }


        public function registrarProducto($producto){

            $mensaje = "";
            $mensajeValidar = "";
            $Db = Db::Conectar();
            //Validar que un usuario no registre el mimso correo.
            $validarExiste = $Db->prepare("SELECT NombreProducto FROM productos
            WHERE NombreProducto = :nombre");
            $validarExiste->bindvalue('nombre',$producto->getNombre());
            try{
                $validarExiste->execute();
                if($validarExiste->rowCount() > 0){
                    $mensajeValidar = "El producto ya existe";
                    return $mensajeValidar;
                }//Si el producto no existe, se ejecuta lo del elese y realiza la inserción
                else{
                    $sql = $Db->prepare('INSERT INTO
                    productos(NombreProducto, Descripcion, Precio, IdCategoria, Estado, Imagen1, Imagen2, Imagen3 )
                    VALUES (:nombre, :descripcion, :precio, :categoria, 1, :imagen1, :imagen2, :imagen3)');
                    $sql->bindvalue('nombre',$producto->getNombre());//dentro del value cuenta como variables las que tienen los dos puntos :
                    $sql->bindvalue('descripcion',$producto->getDescripcion());//recciben los datos que se mandaron por el set en controladorRegistrar
                    $sql->bindvalue('precio',$producto->getPrecio());
                    $sql->bindvalue('categoria',$producto->getCategoria());
                    $sql->bindvalue('imagen1',$producto->getImagen1());
                    $sql->bindvalue('imagen2',$producto->getImagen2());
                    $sql->bindvalue('imagen3',$producto->getImagen3());
                    $sql->execute();
                    $mensaje = "Registro exitoso";
                }
            }
            catch(Exception $e){
                $mensaje = $e->getMessage();
             }
             Db::CerrarConexion($Db);
             return $mensaje;
        }

        public function actualizarEstadoProducto($productoEstado){
            $mensaje = "";
            $Db = Db::Conectar();
            $sql = $Db->prepare('UPDATE productos SET Estado = :estado
             WHERE IdProducto = :idProducto ');
             $sql->bindvalue('estado',$productoEstado->getEstado());
             $sql->bindvalue('idProducto',$productoEstado->getId());

             try{
                 $sql->execute();
                 $mensaje = "Se ha modificado el estado del producto";
             }catch(Exception $e){
                 $mensaje = $e->getMessage();
             }
             Db::CerrarConexion($Db);
             return $mensaje;
        }

        public function actualizarDatosProducto($producto){

            $mensaje = "";
            $Db = Db::Conectar();
            $sql = $Db->prepare('UPDATE productos SET NombreProducto = :nombre, Descripcion = :descripcion, 
            Precio = :precio, IdCategoria = :categoria WHERE IdProducto = :idProducto');
            $sql->bindvalue('nombre',$producto->getNombre());
            $sql->bindvalue('descripcion',$producto->getDescripcion());
            $sql->bindvalue('precio',$producto->getPrecio());
            $sql->bindvalue('categoria',$producto->getCategoria());
            $sql->bindvalue('idProducto',$producto->getId());

            try{
                $sql->execute();
                $mensaje = "Datos del producto actualizados de manera correcta";
            }catch(Exception $e){
                $mensaje = $e->getMessage();
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function buscarProducto($idProducto){
            $Db = Db::Conectar();
            $sql = $Db->query("SELECT * FROM productos WHERE IdProducto = $idProducto");
            $sql->execute();
            $Db = Db::CerrarConexion($Db);
            return $sql->fetch();
        }

        public function eliminarProducto($idProducto){
            $mensaje = "";
            $mensajeValidar = "";
            $Db = Db::Conectar();//conexion a bd
            $buscarRelacion = $Db->prepare("SELECT * FROM detalle_productos WHERE IdProducto = $idProducto");
            try{
                $buscarRelacion->execute();
                if($buscarRelacion->rowCount() > 0){
                    $mensajeValidar = "Existen  entradas relacionadas al producto";
                    return $mensajeValidar;
                }else{
                    $sql = $Db->prepare("DELETE FROM productos WHERE IdProducto = $idProducto");
                    $sql->execute();
                    $mensaje = "Eliminación exitosa";
                }
            }catch(Exception $e){
                $mensaje = $e->getMessage();
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        //IMAGENES DEL PRODUCTO CRUD

        public function actualizarImagen1Producto($nuevaImagen1, $idProducto){
            $mensaje = "";
            $Db = Db::Conectar();
            $sql = $Db->prepare("UPDATE productos SET Imagen1 = :nuevaImagen1 WHERE IdProducto = :idProducto");
            $sql->bindvalue('nuevaImagen1',$nuevaImagen1);
            $sql->bindvalue('idProducto',$idProducto);
            try{
                $sql->execute();
                $mensaje = "Se actualizo correctamente la imagen";
            }catch(Exception $e){
                $mensaje = $e->getMessage();
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function actualizarImagen2Producto($nuevaImagen2, $idProducto){
            $mensaje = "";
            $Db = Db::Conectar();
            $sql = $Db->prepare("UPDATE productos SET Imagen2 = :imagen2 WHERE IdProducto = :idProducto");
            $sql->bindvalue('imagen2',$nuevaImagen2);
            $sql->bindValue('idProducto',$idProducto);
            try{
                $sql->execute();
                $mensaje = "Se actualizo correctamente la imagen";
            }catch (Exception $e) {
                $mensaje = $e->getMessage();
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function actualizarImagen3Producto($nuevaImagen3,$idProducto){
            $mensaje = "";
            $Db = Db::Conectar();
            $sql = $Db->prepare("UPDATE productos SET Imagen3 = :imagen3 WHERE IdProducto = :idProducto");
            $sql->bindvalue('imagen3',$nuevaImagen3);
            $sql->bindValue('idProducto',$idProducto);
            try{
                $sql->execute();
                $mensaje = "Se actualizo correctamente la imagen";
            }catch (Exception $e) {
                $mensaje = $e->getMessage();
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function actualizarTodasLasImagenes($nuevaImagen1,$nuevaImagen2,$nuevaImagen3,$idProducto){
            $mensaje = "";
            $Db = Db::Conectar();
            $sql = $Db->prepare("UPDATE productos SET Imagen1 = :imagen1, Imagen2 = :imagen2, Imagen3 = :imagen3 
            WHERE IdProducto = :idProducto");
            $sql->bindvalue('imagen1',$nuevaImagen1);
            $sql->bindvalue('imagen2',$nuevaImagen2);
            $sql->bindvalue('imagen3',$nuevaImagen3);
            $sql->bindValue('idProducto',$idProducto);
            try{
                $sql->execute();
                $mensaje = "Se actualizo correctamente la imagen";
            }catch (Exception $e) {
                $mensaje = $e->getMessage();
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        // FINALIZA CRUD DE IMAGENES DEL PRODUCTO

        //ENTRADAS Y DETALLES DEL PRODUCTO

        public function obtenerEntradasProductos($idProducto){
            $Db = Db::Conectar();
            $sql = $Db->query("SELECT * FROM detalle_productos WHERE IdProducto = $idProducto");
            $sql->execute();
            Db::CerrarConexion($Db);
            return $sql->fetchAll();
        }

        public function buscarEntradaProducto($idDetalleProducto){
            $Db = Db::Conectar();
            $sql = $Db->query("SELECT * FROM detalle_productos WHERE IdDetalleProducto = $idDetalleProducto");
            $sql->execute();
            $Db = Db::CerrarConexion($Db);
            return $sql->fetch();
        }

        public function registrarEntradasProducto($color,$talla,$cantidad,$idProducto){
            
            $mensaje = "";
            $mensajeValidar = "";
            $Db = Db::Conectar();
            //Validar que un usuario no registre el mimso correo.
            foreach($color as $clave => $valor){
            $validarExiste = $Db->prepare("SELECT Color, Talla FROM detalle_productos
            WHERE Color = :color AND Talla = :talla AND IdProducto = :idProducto");
            $validarExiste->bindvalue('color',$color[$clave]);
            $validarExiste->bindvalue('talla',$talla[$clave]);
            $validarExiste->bindvalue('idProducto',$idProducto);
            }
            try{
                $validarExiste->execute();
                if($validarExiste->rowCount() > 0){
                    $mensajeValidar = "La entrada de este producto ya existe";
                    return $mensajeValidar;
                }//Si el producto no existe, se ejecuta lo del elese y realiza la inserción
                else{
                    foreach($color as $clave => $valor){
                         $sql = $Db->prepare('INSERT INTO detalle_productos(Color,Talla, Stock, IdProducto, Estado) VALUES
                        (:color, :talla, :cantidad, :idProducto, :estado)');
                        $sql->bindvalue('color',$valor);
                        $sql->bindvalue('talla',$talla[$clave]);
                        $sql->bindvalue('cantidad',$cantidad[$clave]);
                        $sql->bindvalue('idProducto',$idProducto);
                        $sql->bindvalue('estado',1);
                        $sql->execute();
                        }            
                        $mensaje = "Registro exitoso";
                }
            }
            catch(Exception $e){
                $mensaje = $e->getMessage();
             }
             Db::CerrarConexion($Db);
             return $mensaje;
            
        }

        public function sumarNuevaCantidadDeEntrada($nuevaCantidad, $idDetalleProducto){
            $mensaje = "";
            $Db = Db::Conectar();
            $sql = $Db->prepare("UPDATE detalle_productos SET Stock=Stock+$nuevaCantidad
             WHERE IdDetalleProducto = $idDetalleProducto");
             try{
                 $sql->execute();
                 $mensaje = "Se agrego la cantidad a la entrada";
             }catch (Exception $e) {
                 $mensaje = $e->getMessage();
             }
             Db::CerrarConexion($Db);
             return $mensaje;
        }

        public function actualizarEstadoEntradaProducto($estadoDetalleProducto){

            $mesanje = "";
            $Db = Db::Conectar();
            $sql = $Db->prepare('UPDATE detalle_productos SET Estado = :estado
             WHERE IdDetalleProducto = :idDetalleProducto');
            $sql->bindvalue('idDetalleProducto',$estadoDetalleProducto->getIdDetalleProducto());
            $sql->bindvalue('estado',$estadoDetalleProducto->getEstado());
            try{
                $sql->execute();
                $mensaje = "Cambio de estado exitoso";
            }catch(Exception $e){
                $mensaje = $e->getMessage();
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

        public function eliminarEntradaProducto($idDetalleProducto){
            $mensaje = "";
            $Db = Db::Conectar();
            $sql = $Db->prepare('DELETE FROM detalle_productos WHERE IdDetalleProducto = :idDetalleProducto');
            $sql->bindvalue('idDetalleProducto',$idDetalleProducto);
            try{
                $sql->execute();
                $mensaje = "Registro eliminado";
            }catch (Exception $e) {
                $mensaje = $e->getMessage();
            }
            Db::CerrarConexion($Db);
            return $mensaje;
        }

    }   

?>