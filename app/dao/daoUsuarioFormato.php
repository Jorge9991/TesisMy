<?php

class daoUsuarioFormato implements Iusuarioformato {
    //put your code here
    public function listar() {
        $usuarioformatos = array();
        try {
            $sql = 'SELECT COUNT(r.id_formatos) as total, e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres, r.status FROM tb_formatos r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2 and r.status != 1 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarioformatos[] = new UsuarioFormato($obj->idequipo, $obj->nombres, $obj->status);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarioformatos;
    
    }

    public function listar2() {
         $usuarioformatos = array();
        try {
            $sql = 'SELECT COUNT(r.id_formatos) as total, e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_formatos r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario and isnull(idUsuario2) and r.status != 1 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarioformatos[] = new UsuarioFormato($obj->idequipo, $obj->nombres, $obj->status);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarioformatos;
    }

    public function cantidad() {
        $usuarioformatos = array();
        try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_formatos r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario and r.status = 2 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarioformatos[] = new UsuarioFormato($obj->idequipo, $obj->nombres, $obj->status);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarioformatos;
    }

 
}
