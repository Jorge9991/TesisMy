<?php

class daoNota implements Inota{
    //put your code here
    public function actualizar(\Nota $nota) {
        try {            
            $sql0 = 'UPDATE tb_nota set nota = :nota where idUsuario = :idUsuario and idequipo = :idequipo ';
            $cn = DataBase::getInstancia();
            $stmp0 = $cn->prepare($sql0);
            $stmp0->bindParam(':idequipo', $nota->getIdEquipo(), PDO::PARAM_INT);
            $stmp0->bindParam(':idUsuario', $nota->getIdUsuario(), PDO::PARAM_INT);
            $stmp0->bindParam(':nota', $nota->getNota(), PDO::PARAM_INT);
            $stmp0->execute();
            return $stmp0->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function crear(\Nota $nota) {
        try {            
            $sql0 = 'INSERT INTO tb_nota ( idUsuario, idequipo, nota) VALUES (:idUsuario, :idequipo, :nota)';
            $cn = DataBase::getInstancia();
            $stmp0 = $cn->prepare($sql0);
            $stmp0->bindParam(':idequipo', $nota->getIdEquipo(), PDO::PARAM_INT);
            $stmp0->bindParam(':idUsuario', $nota->getIdUsuario(), PDO::PARAM_INT);
            $stmp0->bindParam(':nota', $nota->getNota(), PDO::PARAM_INT);
            $stmp0->execute();

            $sql = 'UPDATE tb_tesis_link SET status = 9  WHERE idequipo = :id';
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $nota->getIdEquipo(), PDO::PARAM_INT);
            
            $stmp->execute();
            return $stmp0->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listar($idusuario,$idequipo) {
        $notas = array();
        try {

            $sql = 'SELECT n.idnota as id,n.idUsuario,n.idequipo,n.nota FROM tb_nota n where proceso = 1 and idUsuario = "'.$idusuario.'" and idequipo = "'.$idequipo.'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $notas[] = new Nota($obj->id, $obj->idUsuario, $obj->idequipo, $obj->nota);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $notas;
    }

    public function listarall() {
        $notas = array();
        try {

            $sql = 'SELECT n.idnota as id,n.idUsuario,n.idequipo,n.nota FROM tb_nota n where proceso = 1 ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $notas[] = new Nota($obj->id, $obj->idUsuario, $obj->idequipo, $obj->nota);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $notas;
    }

    public function listarnota($idequipo) {
         $notas = array();
        try {

            $sql = 'SELECT n.idnota as id,n.idUsuario,n.idequipo,n.nota FROM tb_nota n where proceso = 1 and  idequipo = "'.$idequipo.'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $notas[] = new Nota($obj->id, $obj->idUsuario, $obj->idequipo, $obj->nota);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $notas;
    }

}
