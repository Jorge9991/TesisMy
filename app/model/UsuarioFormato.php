<?php

/**
 * Description of UsuarioFormato
 *
 * @author KrigareDrachen
 */
class UsuarioFormato {

    private $idequipo;
    private $nombres;
    private $status;

    public function __construct($idequipo =0, $nombres="", $status=0) {
        $this->idequipo = $idequipo;
        $this->nombres = $nombres;
        $this->status = $status;
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

    public function setIdequipo($idequipo) {
        $this->idequipo = $idequipo;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function setStatus($status) {
        $this->status = $status;
    }



}
