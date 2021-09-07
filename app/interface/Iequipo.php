<?php
interface Iequipo {
    public function solicitud();
    public function crear(Equipo $equipo);
    public function crearsolo(Equipo $equipo);
    public function aceptar(Equipo $equipo);
    public function eliminar(Equipo $equipo);
    public function cancelarsolicitud(Equipo $equipo);
    public function listar($idusuario);
    public function equiposolo($idequipo);
    public function nombreequipo($idequipo);
    public function listarSolicitudes($idusuario);
    public function solicitudenviada($idusuario);
}
