<?php
require_once '../conexion/DataBase.php';
class daoReporte {

    public function egresados() {
        try {
            $sql = 'select u.idUsuario,u.cedula,u.nombre,u.apellido,u.direccion,u.telefono,u.correo,u.usuario,t.descripcion idTipoUsuario,u.estado from tb_usuario u,tb_tipousuario t where u.idTipoUsuario=t.idTipoUsuario and u.idTipoUsuario = 3 group by u.idUsuario  order by u.apellido asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function egresados2() {
        try {
            $sql = 'SELECT u.cedula, u.nombre, u.apellido, u.correo FROM tb_tesis_link tl inner join tb_equipo e on e.idequipo = tl.idequipo inner join tb_usuario u on u.idUsuario = e.idUsuario where tl.status = 9 and isnull(e.idUsuario2)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function egresados3() {
        try {
            $sql = 'SELECT u.cedula, u.nombre, u.apellido, u.correo, us.cedula as cedula2, us.nombre as nombre2, us.apellido as apellido2, us.correo as correo2 FROM tb_tesis_link tl inner join tb_equipo e on e.idequipo = tl.idequipo inner join tb_usuario u on u.idUsuario = e.idUsuario inner join tb_usuario us on us.idUsuario = e.idUsuario2 where tl.status = 9';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function notas() {
        try {
            $sql = 'SELECT COUNT(r.idnota) as total, e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres, round(sum(r.nota)/3,2) as nota FROM tb_nota r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2 GROUP by r.idequipo ORDER by nota ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function notas2() {
        try {
            $sql = 'SELECT COUNT(r.idnota) as total, e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, round(sum(r.nota)/3,2) as nota FROM tb_nota r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario where isnull(idUsuario2) GROUP by r.idequipo ORDER by nota ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function jurados() {
        try {
            $sql = 'SELECT COUNT(r.idnota) as total ,concat( u.nombre," ",u.apellido ) as nombres,r.idUsuario, round(sum(r.nota)/COUNT(r.idnota),2) as nota FROM tb_nota r iNNER join tb_usuario u on u.idUsuario = r.idUsuario GROUP by r.idUsuario ORDER by nota ASC ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
    }


}