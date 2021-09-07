<?php

class UsuarioNota {
    private $idequipo;
    private $nombres;
    private $nota;

    
    public function __construct($idequipo=0, $nombres="", $nota=0.00) {
        $this->idequipo = $idequipo;
        $this->nombres = $nombres;
        $this->nota = $nota;
    }
    public function getIdequipo() {
        return $this->idequipo;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getNota() {
        return $this->nota;
    }

    public function setIdequipo($idequipo) {
        $this->idequipo = $idequipo;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function setNota($nota) {
        $this->nota = $nota;
    }


}
