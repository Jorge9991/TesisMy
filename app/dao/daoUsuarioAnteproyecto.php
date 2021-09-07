<?php

class daoUsuarioAnteproyecto implements Iusuarioanteproyecto{
    //put your code here
    public function cantidad() {
        $usuarioanteproyectos = array();
        try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_anteproyecto r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario and r.status = 2 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarioanteproyectos[] = new UsuarioAnteproyecto($obj->idequipo, $obj->nombres, $obj->status);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarioanteproyectos;
    }

    public function listar() {
        $usuarioanteproyectos = array();
        try {
            $sql = 'SELECT COUNT(r.id_anteproyecto) as total, e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres, r.status FROM tb_anteproyecto r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2 and r.status != 1 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarioanteproyectos[] = new UsuarioAnteproyecto($obj->idequipo, $obj->nombres, $obj->status);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarioanteproyectos;
    }

    public function listar2() {
        $usuarioanteproyectos = array();
        try {
            $sql = 'SELECT COUNT(r.id_anteproyecto) as total, e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_anteproyecto r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario and isnull(idUsuario2) and r.status != 1 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarioanteproyectos[] = new UsuarioAnteproyecto($obj->idequipo, $obj->nombres, $obj->status);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarioanteproyectos;
    }

     public function listaranteproyectos($idusuario) {
        $usuarioanteproyectos = array();
        try {
           
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres, r.status, r.fechasustentacion FROM tb_anteproyecto r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2 INNER join tb_parciego p on p.idequipo = e.idequipo and p.idUsuario = "'. $idusuario .'" and p.proceso = 1 and r.status = 3 GROUP by r.idequipo ORDER by r.fechasustentacion ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
           foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarioanteproyectos[] = new UsuarioAnteproyecto($obj->status, $obj->nombres, $obj->fechasustentacion);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarioanteproyectos;
    }

    public function cantidadproyectos($idusuario) {
        $usuarioanteproyectos = array();
        try {
            $sql = 'SELECT e.idequipo , r.status, r.fechasustentacion FROM tb_anteproyecto r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_parciego p on p.idequipo = e.idequipo and p.idUsuario = "'. $idusuario .'" and p.proceso = 1 and r.status = 3 and r.fechasustentacion >= Now() GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarioanteproyectos[] = new UsuarioAnteproyecto($obj->idequipo, "", $obj->status);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarioanteproyectos;
    }

    public function listaranteproyectos2($idusuario) {
        $usuarioanteproyectos = array();
        try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status, r.fechasustentacion FROM tb_anteproyecto r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_parciego p on p.idequipo = e.idequipo and isnull(idUsuario2) and p.idUsuario = "'. $idusuario .'" and p.proceso = 1 and r.status = 3 GROUP by r.idequipo ORDER by r.fechasustentacion ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarioanteproyectos[] = new UsuarioAnteproyecto($obj->status, $obj->nombres, $obj->fechasustentacion);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarioanteproyectos;
    }

}
