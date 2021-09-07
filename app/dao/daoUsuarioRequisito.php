<?php

class daoUsuarioRequisito implements Iusuariorequisito {
    //put your code here
    public function listar() {
        $usuariorequisitos = array();
        try {
            $sql = 'SELECT COUNT(r.idrequisitos) as total, u.cedula,u.apellido,u.nombre,u.correo,u.idUsuario,r.status FROM tb_requisitos r INNER join tb_usuario u on r.idUsuario = u.idUsuario and r.status != 1 GROUP by r.idUsuario ORDER by r.status asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariorequisitos[] = new UsuarioRequisitos($obj->total, $obj->cedula, $obj->apellido, $obj->nombre, $obj->correo, $obj->idUsuario, $obj->status);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariorequisitos;
    
    }

    public function cantidad() {
        $usuariorequisitos = array();
        try {
            $sql = 'SELECT u.cedula,u.apellido,u.nombre,u.correo,u.idUsuario,r.status FROM tb_requisitos r INNER join tb_usuario u on r.idUsuario = u.idUsuario and r.status = 2 GROUP by r.idUsuario ORDER by r.status asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariorequisitos[] = new UsuarioRequisitos( $obj->cedula, $obj->apellido, $obj->nombre, $obj->correo, $obj->idUsuario, $obj->status);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariorequisitos;
    }

}
