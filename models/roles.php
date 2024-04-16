<?php

class Roles {
    
    private $nombre;

    public function __construct() {

    }

    // Getter y setter

    public function getNombre () {
        return $this -> nombre;
    }

    public function setNombre ($nombre) : void {
        $this -> nombre = $nombre;
    }
    
}

?>