<?php

class Cronograma {

    private $idCronograma1;
    private $descripcion1;
    private $fechainicio1;
    private $fechafin1;
    private $idCronograma2;
    private $descripcion2;
    private $fechainicio2;
    private $fechafin2;
    private $idCronograma3;
    private $descripcion3;
    private $fechainicio3;
    private $fechafin3;
    private $idCronograma4;
    private $descripcion4;
    private $fechainicio4;
    private $fechafin4;
    private $idCronograma5;
    private $descripcion5;
    private $fechainicio5;
    private $fechafin5;
    private $idCronograma6;
    private $descripcion6;
    private $fechainicio6;
    private $fechafin6;
    private $link;
    
    public function __construct($idCronograma1=0, $descripcion1="", $fechainicio1="", $fechafin1="", $idCronograma2=0, $descripcion2="", $fechainicio2="", $fechafin2="", $idCronograma3=0, $descripcion3="", $fechainicio3="", $fechafin3="", $idCronograma4=0, $descripcion4="", $fechainicio4="", $fechafin4="", $idCronograma5=0, $descripcion5="", $fechainicio5="", $fechafin5="", $idCronograma6=0, $descripcion6="", $fechainicio6="", $fechafin6="", $link="") {
        $this->idCronograma1 = $idCronograma1;
        $this->descripcion1 = $descripcion1;
        $this->fechainicio1 = $fechainicio1;
        $this->fechafin1 = $fechafin1;
        $this->idCronograma2 = $idCronograma2;
        $this->descripcion2 = $descripcion2;
        $this->fechainicio2 = $fechainicio2;
        $this->fechafin2 = $fechafin2;
        $this->idCronograma3 = $idCronograma3;
        $this->descripcion3 = $descripcion3;
        $this->fechainicio3 = $fechainicio3;
        $this->fechafin3 = $fechafin3;
        $this->idCronograma4 = $idCronograma4;
        $this->descripcion4 = $descripcion4;
        $this->fechainicio4 = $fechainicio4;
        $this->fechafin4 = $fechafin4;
        $this->idCronograma5 = $idCronograma5;
        $this->descripcion5 = $descripcion5;
        $this->fechainicio5 = $fechainicio5;
        $this->fechafin5 = $fechafin5;
        $this->idCronograma6 = $idCronograma6;
        $this->descripcion6 = $descripcion6;
        $this->fechainicio6 = $fechainicio6;
        $this->fechafin6 = $fechafin6;
        $this->link = $link;
    }

    public function getIdCronograma1() {
        return $this->idCronograma1;
    }

    public function getDescripcion1() {
        return $this->descripcion1;
    }

    public function getFechainicio1() {
        return $this->fechainicio1;
    }

    public function getFechafin1() {
        return $this->fechafin1;
    }

    public function getIdCronograma2() {
        return $this->idCronograma2;
    }

    public function getDescripcion2() {
        return $this->descripcion2;
    }

    public function getFechainicio2() {
        return $this->fechainicio2;
    }

    public function getFechafin2() {
        return $this->fechafin2;
    }

    public function getIdCronograma3() {
        return $this->idCronograma3;
    }

    public function getDescripcion3() {
        return $this->descripcion3;
    }

    public function getFechainicio3() {
        return $this->fechainicio3;
    }

    public function getFechafin3() {
        return $this->fechafin3;
    }

    public function getIdCronograma4() {
        return $this->idCronograma4;
    }

    public function getDescripcion4() {
        return $this->descripcion4;
    }

    public function getFechainicio4() {
        return $this->fechainicio4;
    }

    public function getFechafin4() {
        return $this->fechafin4;
    }

    public function getIdCronograma5() {
        return $this->idCronograma5;
    }

    public function getDescripcion5() {
        return $this->descripcion5;
    }

    public function getFechainicio5() {
        return $this->fechainicio5;
    }

    public function getFechafin5() {
        return $this->fechafin5;
    }

    public function getIdCronograma6() {
        return $this->idCronograma6;
    }

    public function getDescripcion6() {
        return $this->descripcion6;
    }

    public function getFechainicio6() {
        return $this->fechainicio6;
    }

    public function getFechafin6() {
        return $this->fechafin6;
    }

    public function getLink() {
        return $this->link;
    }

    public function setIdCronograma1($idCronograma1) {
        $this->idCronograma1 = $idCronograma1;
    }

    public function setDescripcion1($descripcion1) {
        $this->descripcion1 = $descripcion1;
    }

    public function setFechainicio1($fechainicio1) {
        $this->fechainicio1 = $fechainicio1;
    }

    public function setFechafin1($fechafin1) {
        $this->fechafin1 = $fechafin1;
    }

    public function setIdCronograma2($idCronograma2) {
        $this->idCronograma2 = $idCronograma2;
    }

    public function setDescripcion2($descripcion2) {
        $this->descripcion2 = $descripcion2;
    }

    public function setFechainicio2($fechainicio2) {
        $this->fechainicio2 = $fechainicio2;
    }

    public function setFechafin2($fechafin2) {
        $this->fechafin2 = $fechafin2;
    }

    public function setIdCronograma3($idCronograma3) {
        $this->idCronograma3 = $idCronograma3;
    }

    public function setDescripcion3($descripcion3) {
        $this->descripcion3 = $descripcion3;
    }

    public function setFechainicio3($fechainicio3) {
        $this->fechainicio3 = $fechainicio3;
    }

    public function setFechafin3($fechafin3) {
        $this->fechafin3 = $fechafin3;
    }

    public function setIdCronograma4($idCronograma4) {
        $this->idCronograma4 = $idCronograma4;
    }

    public function setDescripcion4($descripcion4) {
        $this->descripcion4 = $descripcion4;
    }

    public function setFechainicio4($fechainicio4) {
        $this->fechainicio4 = $fechainicio4;
    }

    public function setFechafin4($fechafin4) {
        $this->fechafin4 = $fechafin4;
    }

    public function setIdCronograma5($idCronograma5) {
        $this->idCronograma5 = $idCronograma5;
    }

    public function setDescripcion5($descripcion5) {
        $this->descripcion5 = $descripcion5;
    }

    public function setFechainicio5($fechainicio5) {
        $this->fechainicio5 = $fechainicio5;
    }

    public function setFechafin5($fechafin5) {
        $this->fechafin5 = $fechafin5;
    }

    public function setIdCronograma6($idCronograma6) {
        $this->idCronograma6 = $idCronograma6;
    }

    public function setDescripcion6($descripcion6) {
        $this->descripcion6 = $descripcion6;
    }

    public function setFechainicio6($fechainicio6) {
        $this->fechainicio6 = $fechainicio6;
    }

    public function setFechafin6($fechafin6) {
        $this->fechafin6 = $fechafin6;
    }

    public function setLink($link) {
        $this->link = $link;
    }



}
