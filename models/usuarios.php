<?php

class Usuarios {

    private $nombres;
    private $apellidos;
    private $tipoIdentificacion;
    private $identificacion;
    private $correo;
    private $estado;

    public function __construct(){
    }


    // Getter y setter

    public function getNombres () {
        return $this -> nombres;
    }

    public function getApellidos (){
        return $this -> apellidos;
    }

    public function getTipoIdentificacion (){
        return $this -> tipoIdentificacion;
    }

    public function getIdentificacion() {
        return $this -> identificacion;     
    }

    public function getCorreo() {
        return $this -> correo;
    }

    public function getEstado() {
        return $this -> estado;
    }


    public function setNombres($nombres) : void {
        $this -> nombres = $nombres;
    }

    public function setApellidos($apellidos) : void {
        $this -> apellidos = $apellidos;
    }

    public function setTipoIdentificacion($tipoIdentificacion) : void {
        $this -> tipoIdentificacion = $tipoIdentificacion;
    }

    public function setIdentificacion($identificacion) : void {
        $this -> identificacion = $identificacion;
    }

    public function setCorreo($correo) : void {
        $this -> correo = $correo;
    }

    public function setEstado($estado) : void {
        $this -> estado = $estado;
    }

}

?>