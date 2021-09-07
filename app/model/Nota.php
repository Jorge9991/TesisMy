<?php

class Nota {
    private $idNota;
    private $idUsuario;
    private $idEquipo;
    private $nota;
    
    public function __construct($idNota=0, $idUsuario=0, $idEquipo=0, $nota=0.00) {
        $this->idNota = $idNota;
        $this->idUsuario = $idUsuario;
        $this->idEquipo = $idEquipo;
        $this->nota = $nota;
    }
    public function getIdNota() {
        return $this->idNota;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getIdEquipo() {
        return $this->idEquipo;
    }

    public function getNota() {
        return $this->nota;
    }

    public function setIdNota($idNota) {
        $this->idNota = $idNota;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setIdEquipo($idEquipo) {
        $this->idEquipo = $idEquipo;
    }

    public function setNota($nota) {
        $this->nota = $nota;
    }


}
