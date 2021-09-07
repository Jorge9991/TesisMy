<?php

class UsuarioHabilidad {

    private $idUsuarioHabilidades;
    private $idHabilidades;
    private $idUsuario;
    private $estado;

    function __construct($idUsuarioHabilidades = 0,$idHabilidades = 0 , $idUsuario = 0, $estado = 1) {
        $this->idUsuarioHabilidades = $idUsuarioHabilidades;
        $this->idHabilidades = $idHabilidades;
        $this->idUsuario = $idUsuario;
        $this->estado = $estado;
    }
    
    function getIdUsuarioHabilidades() {
        return $this->idUsuarioHabilidades;
    }

    function getIdHabilidades() {
        return $this->idHabilidades;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getEstado() {
        return $this->estado;
    }


    function setIdUsuarioHabilidades($idUsuarioHabilidades) {
        $this->idUsuarioHabilidades = $idUsuarioHabilidades;
    }

    function setIdHabilidades($idHabilidades) {
        $this->idHabilidades = $idHabilidades;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
}
