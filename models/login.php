<?php

    class Login {

        private $loginId;
        private $loginPassword;
        private $loginIntentos;
        private $loginUsuariosId;

        public function __construct() {

        }

        // Getter y setter

        public function getLoginId () {
            return $this -> loginId;
        }

        public function getLoginPassword () {
            return $this -> loginPassword;
        }

        public function getLoginIntentos () {
            return $this -> loginIntentos;
        }

        public function getLoginUsuariosId () {
            return $this -> loginUsuariosId;
        }



        public function setLoginId ($loginId) {
            $this -> loginId = $loginId;
        }

        public function setLoginPassword ($loginPassword) {
            $this -> loginPassword = $loginPassword;
        }

        public function setLoginIntentos ($loginIntentos) {
            $this -> loginIntentos = $loginIntentos;
        }

        public function setLoginUsuariosId ($loginUsuariosId) {
            $this -> loginUsuariosId = $loginUsuariosId;
        }

    }


?>