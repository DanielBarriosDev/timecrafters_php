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





        public function setRolPrincipal ($rolPrincipal) : void {
            $this -> rolPrincipal = $rolPrincipal;
        }

    }

?>