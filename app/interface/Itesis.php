<?php
interface Itesis{
    public function aprobar (Tesis $tesis);
    public function cancelar (Tesis $tesis);
    public function aprobartesis (Tesis $tesis);
    public function noaprobartesis(Tesis $tesis);
    public function eliminar (Tesis $tesis);
    public function listar($idequipo);
    public function listartesisparciego($idusuario);
    public function status($idequipo);
    public function observacion($idequipo);
    public function listarcantidad();
    public function listarcantidadx2();
}
