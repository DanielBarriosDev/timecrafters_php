<?php

    class Departamentos {

        private $departamentosId;
        private $departamentosNombre;

        public function __construct(){

        }

        // Getter y setter

        public function getDepartamentosId () {
            return $this -> departamentosId;
        }

        public function getDepartamentosNombre () {
            return $this -> departamentosNombre;
        }

        public function setDepartamentosId ($departamentosId) {
            $this -> departamentosId = $departamentosId;
        }

        public function setDepartamentosNombre ($departamentosNombre) {
            $this -> departamentosNombre = $departamentosNombre;
        }

    }

?>