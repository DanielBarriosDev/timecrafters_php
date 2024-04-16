<?php

    class RolesUsuarios {
        private $rolPrincipal;

        public function __construct(){
            
        }

        public function getRolPrincipal () {
            return $this -> rolPrincipal;
        }

        public function setRolPrincipal ($rolPrincipal) : void {
            $this -> rolPrincipal = $rolPrincipal;
        }

    }

?>