<?php

class daoUsuarioNota implements Iusuarionota{
    //put your code here
    public function listar() {
        $usuariotesis = array();
        try {
            $sql = 'SELECT COUNT(r.idnota) as total, e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres, sum(r.nota) as nota FROM tb_nota r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2 GROUP by r.idequipo ORDER by nota ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioNota($obj->idequipo, $obj->nombres, $obj->nota);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function listar2() {
        $usuariotesis = array();
        try {
            $sql = 'SELECT COUNT(r.idnota) as total, e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, sum(r.nota) as nota FROM tb_nota r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario where isnull(idUsuario2) GROUP by r.idequipo ORDER by nota ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                 $usuariotesis[] = new UsuarioNota($obj->idequipo, $obj->nombres, $obj->nota);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

}
