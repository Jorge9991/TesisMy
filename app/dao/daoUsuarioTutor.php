<?php

class daoUsuarioTutor implements Iusuariotutor{
    //put your code here
    public function listar($idusuario) {
         $usuario = array();
        try {
            $sql = 'SELECT COUNT(r.idequipotutor) as total, e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres FROM tb_equipo_tutor r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2 where r.idUsuario = "'.$idusuario.'" and r.solicitud = 2 GROUP by r.idequipo ORDER by r.idequipotutor ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuario[] = new UsuarioTutor($obj->idequipo, $obj->nombres, "");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuario;
    }

    public function listar2($idusuario) {
        $usuario = array();
        try {
            $sql = 'SELECT COUNT(r.idequipotutor) as total, e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres FROM tb_equipo_tutor r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario and isnull(idUsuario2) where r.idUsuario = "'.$idusuario.'" and r.solicitud = 2 GROUP by r.idequipo ORDER by r.idequipotutor ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuario[] = new UsuarioTutor($obj->idequipo, $obj->nombres,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuario;
    }

    public function listartodo() {
            $usuario = array();
        try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres FROM tb_equipo e INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuario[] = new UsuarioTutor($obj->idequipo, $obj->nombres, "");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuario;
    }

    public function listartodo2() {
         $usuario = array();
        try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres FROM tb_equipo e INNER join tb_usuario u on u.idUsuario = e.idUsuario and isnull(idUsuario2)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuario[] = new UsuarioTutor($obj->idequipo, $obj->nombres,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuario;
    }

    public function soytutor($idusuario) {
        $usuario = array();
       try {
           $sql = 'SELECT * FROM tb_equipo_tutor where idUsuario = "'.$idusuario.'" and solicitud = 2';
           $cn = DataBase::getInstancia();
           $stmp = $cn->prepare($sql);
           $stmp->execute();
           foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
               $usuario[] = new UsuarioTutor("", "", "");
           }
       } catch (PDOException $ex) {
           echo $ex->getMessage();
       }
       return $usuario;
   }
}
