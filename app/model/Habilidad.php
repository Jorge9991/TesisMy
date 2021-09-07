<?php

class Habilidad {
    private $idHabilidades;
    private $descripcion;
    private $estado;
    
    function __construct($idHabilidades=0, $descripcion="", $estado=0) {
        $this->idHabilidades = $idHabilidades;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }
    
    function getIdHabilidad() {
        return $this->idHabilidades;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdHabilidad($idHabilidades) {
        $this->idHabilidades = $idHabilidades;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }    
}