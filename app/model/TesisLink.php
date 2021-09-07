<?php

class TesisLink {
    private $idTesisLink;
    private $link;
    private $status;
    private $idEquipo;
    private $fechasustentacion;
    
    public function __construct($idTesisLink=0, $link="", $status=0, $idEquipo=0, $fechasustentacion="") {
        $this->idTesisLink = $idTesisLink;
        $this->link = $link;
        $this->status = $status;
        $this->idEquipo = $idEquipo;
        $this->fechasustentacion = $fechasustentacion;
    }

    public function getIdTesisLink() {
        return $this->idTesisLink;
    }

    public function getLink() {
        return $this->link;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getIdEquipo() {
        return $this->idEquipo;
    }

    public function getFechasustentacion() {
        return $this->fechasustentacion;
    }

    public function setIdTesisLink($idTesisLink) {
        $this->idTesisLink = $idTesisLink;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setIdEquipo($idEquipo) {
        $this->idEquipo = $idEquipo;
    }

    public function setFechasustentacion($fechasustentacion) {
        $this->fechasustentacion = $fechasustentacion;
    }





}
