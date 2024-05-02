<?php

    class Usuarios {

        private $usuariosId;
        private $usuariosNombres;
        private $usuariosApellidos;
        private $usuariosTipoIdentificacion;
        private $usuariosIdentificacion;
        private $usuariosCorreo;
        private $usuariosEstado;
        private $usuariosCiudadesId;


        public function __construct(){

        }

        // Getter y setter

        public function getUsuariosId () {
            return $this -> usuariosId;
        }

        public function getUsuariosNombres () {
            return $this -> usuariosNombres;
        }

        public function getUsuariosApellidos () {
            return $this -> usuariosApellidos;
        }

        public function getUsuariosTipoIdentificacion () {
            return $this -> usuariosTipoIdentificacion;
        }

        public function getUsuariosIdentificacion () {
            return $this -> usuariosIdentificacion;
        }

        public function getUsuariosCorreo () {
            return $this -> usuariosCorreo;
        }

        public function getUsuariosEstado () {
            return $this -> usuariosEstado;
        }

        public function getUsuariosCiudadesId () {
            return $this -> usuariosCiudadesId;
        }



        public function setUsuariosId ($usuariosId) {
            $this -> usuariosId = $usuariosId;
        }

        public function setUsuariosNombres ($usuariosNombres) {
            $this -> usuariosNombres = $usuariosNombres;
        }

        public function setUsuariosApellidos ($usuariosApellidos) {
            $this -> usuariosApellidos = $usuariosApellidos;
        }

        public function setUsuariosTipoIdentificacion ($usuariosTipoIdentificacion) {
            $this -> usuariosTipoIdentificacion = $usuariosTipoIdentificacion;
        }

        public function setUsuariosIdentificacion ($usuariosIdentificacion) {
            $this -> usuariosIdentificacion = $usuariosIdentificacion;
        }

        public function setUsuariosCorreo ($usuariosCorreo) {
            $this -> usuariosCorreo = $usuariosCorreo;
        }

        public function setUsuariosEstado ($usuariosEstado) {
            $this -> usuariosEstado = $usuariosEstado;
        }

        public function setUsuariosCiudadesId ($usuariosCiudadesId) {
            $this -> usuariosCiudadesId = $usuariosCiudadesId;
        }
    
    }

?>