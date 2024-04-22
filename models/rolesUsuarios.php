<?php

    class RolesUsuarios {

        private $rolesUsuariosId;
        private $rolesUsuariosFechaAsignacion;
        private $rolesUsuariosFechaCancelacion;
        private $rolesUsuariosEstado;
        private $rolesUsuariosUsuariosId;
        private $rolesUsuariosRolesId;

        public function __construct(){
            
        }

        public function getRolesUsuariosId () {
            return $this -> rolesUsuariosId;
        }

        public function getRolesUsuariosFechaAsignacion () {
            return $this -> rolesUsuariosFechaAsignacion;
        }

        public function getRolesUsuariosFechaCancelacion () {
            return $this -> rolesUsuariosFechaCancelacion;
        }

        public function getRolesUsuariosEstado () {
            return $this -> rolesUsuariosEstado;
        }

        public function getRolesUsuariosUsuariosId () {
            return $this -> rolesUsuariosUsuariosId;
        }

        public function getRolesUsuariosRolesId () {
            return $this -> rolesUsuariosRolesId;
        }


        public function setRolesUsuariosId ($rolesUsuariosId) {
            $this -> rolesUsuariosId = $rolesUsuariosId;
        }

        public function setRolesUsuariosFechaAsignacion ($rolesUsuariosFechaAsignacion) {
            $this -> rolesUsuariosFechaAsignacion = $rolesUsuariosFechaAsignacion;
        }

        public function setRolesUsuariosFechaCancelacion ($rolesUsuariosFechaCancelacion) {
            $this -> rolesUsuariosFechaCancelacion = $rolesUsuariosFechaCancelacion;
        }

        public function setRolesUsuariosEstado ($rolesUsuariosEstado) {
            $this -> rolesUsuariosEstado = $rolesUsuariosEstado;
        }

        public function setRolesUsuariosUsuariosId ($rolesUsuariosUsuariosId) {
            $this -> rolesUsuariosUsuariosId = $rolesUsuariosUsuariosId;
        }

        public function setRolesUsuariosRolesId ($rolesUsuariosRolesId) {
            $this -> rolesUsuariosRolesId = $rolesUsuariosRolesId;
        }

    }

?>