<?php

class Roles {
    
    private $rolesId;
    private $rolesNombre;

    public function __construct() {

    }

    // Getter y setter

    public function getRolesId () {
        return $this -> rolesId;
    }

    public function getRolesNombre () {
        return $this -> rolesNombre;
    }

    public function setRolesId ($rolesId) {
        $this -> rolesId = $rolesId;
    }

    public function setRolesNombre ($rolesNombre) {
        $this -> rolesNombre = $rolesNombre;
    }
    
}

?>