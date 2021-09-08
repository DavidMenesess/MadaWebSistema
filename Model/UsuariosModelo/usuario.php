 <?php

    class usuario
    {

        private $IdUsuario;
        private $nombre;
        private $apellido;
        private $correo;
        private $contrasena;
        private $estado;
        private $rol;
        private $existe;


        public function __construct()
        {
        }

        public function setIdUsuario($IdUsuario)
        {
            $this->IdUsuario = $IdUsuario;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function setApellido($apellido)
        {
            $this->apellido = $apellido;
        }

        public function setCorreo($correo)
        {
            $this->correo = $correo;
        }

        public function setContrasena($contrasena)
        {
            $this->contrasena = $contrasena;
        }

        public function setEstado($estado)
        {
            $this->estado = $estado;
        }

        public function setRol($rol)
        {
            $this->rol = $rol;
        }

        public function setExiste($existe)
        {
            $this->existe = $existe;
        }
        //GET

        public function getIdUsuario()
        {
            return $this->IdUsuario;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getApellido()
        {
            return $this->apellido;
        }

        public function getCorreo()
        {
            return $this->correo;
        }

        public function getContrasena()
        {
            return $this->contrasena;
        }

        public function getEstado()
        {
            return $this->estado;
        }

        public function getRol()
        {
            return $this->rol;
        }

        public function getExiste()
        {
            return $this->existe;
        }
    }



    ?>