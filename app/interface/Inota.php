<?php

interface Inota {
    public function crear(Nota $nota);
    public function actualizar(Nota $nota);
    public function listar ($idusuario,$idequipo);
    public function listarnota ($idequipo);
    public function listarall ();

}
