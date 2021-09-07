<?php
interface Iformato {
    public function aprobar (Formato $formato);
    public function cancelar (Formato $formato);
    public function aprobarformato (Formato $formato);
    public function noaprobarformato (Formato $formato);
    public function eliminar (Formato $formato);
    public function listartodo($idequipo);
    public function listar($idequipo);
    public function listartema($idequipo);
    public function listarhabilidades($idequipo);
    public function status($idequipo);
    public function status2($idequipo);
    public function observacion($idequipo);
    public function listarId($id);
    public function listarcantidad();
    public function listarcantidadx2();
}
