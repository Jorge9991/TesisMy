<?php
interface Ianteproyecto {
    public function aprobar (Anteproyecto $anteproyecto);
    public function cancelar (Anteproyecto $anteproyecto);
    public function aprobaranteproyecto (Anteproyecto $anteproyecto);
    public function noaprobaranteproyecto (Anteproyecto $anteproyecto);
    public function eliminar (Anteproyecto $anteproyecto);
    public function listar($idequipo);
    public function listarcantidad();
    public function listarcantidadx2();
    public function status($idequipo);
    public function observacion($idequipo);
}
