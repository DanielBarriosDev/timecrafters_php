<?php

class Ciudades {

    private $ciudadesId;
    private $ciudadesNombre;

    public function __construct(){

    }

    // Getter y setter

    public function getCiudadesId () {
        return $this -> ciudadesId;
    }

    public function getCiudadesNombre () {
        return $this -> ciudadesNombre;
    }

    public function setCiudadesId ($ciudadesId) {
        $this -> ciudadesId = $ciudadesId;
    }

    public function setCiudadesNombre($ciudadesNombre) {
        $this -> ciudadesNombre = $ciudadesNombre;
    }

}

?>