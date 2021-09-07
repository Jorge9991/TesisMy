<?php
interface Irequisistos {
    public function aprobar (Requisitos $requisitos);
    public function cancelar (Requisitos $requisitos);
    public function aprobarrequisitos (Requisitos $requisitos);
    public function noaprobarrequisitos (Requisitos $requisitos);
    public function eliminar (Requisitos $requisitos);
    public function listar($idusuario);
    public function status($idusuario);
    public function observacion($idusuario);
    public function listarcantidad();
}
