<?php

class UsuarioTesis {
    private $idequipo;
    private $nombres;
    private $status;
    private $tema;

    public function __construct($idequipo=0, $nombres="", $status=0, $tema="") {
        $this->idequipo = $idequipo;
        $this->nombres = $nombres;
        $this->status = $status;
        $this->tema = $tema;
    }

    public function getIdequipo() {
        return $this->idequipo;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getTema() {
        return $this->tema;
    }

    public function setIdequipo($idequipo) {
        $this->idequipo = $idequipo;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setTema($tema) {
        $this->tema = $tema;
    }


}
