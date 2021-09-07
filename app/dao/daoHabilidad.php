<?php

class daoHabilidad implements Ihabilidad{
    
    public function crear(\Habilidad $habilidad) {
          try {
            $sql = 'insert into tb_habilidades (descripcion,estado) values (:descripcion,:estado)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':descripcion', $habilidad->getDescripcion(), PDO::PARAM_STR);
            $stmp->bindParam(':estado', $habilidad->getEstado(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function delete(\Habilidad $habilidad) {
        try {
            $sql = 'delete from tb_habilidades WHERE id_habilidades = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $habilidad->getIdHabilidad(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\Habilidad $habilidad) {
        try {
            $sql = 'UPDATE tb_habilidades SET descripcion=:descripcion WHERE id_habilidades = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $habilidad->getIdHabilidad(), PDO::PARAM_INT);
            $stmp->bindParam(':descripcion', $habilidad->getDescripcion(), PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() >= 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listar() {
        $tipohabilidades = array();
        try {
            $sql = 'SELECT * from tb_habilidades';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $tipohabilidades[] = new Habilidad($obj->id_habilidades, $obj->descripcion, $obj->estado);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $tipohabilidades;
    }

    public function listarId($id) {
             $tipohabilidades = array();
        try {
            $sql = 'SELECT * from tb_habilidades WHERE id_habilidades = "'.$id.'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $tipohabilidades[] = new Habilidad($obj->id_habilidades, $obj->descripcion, $obj->estado);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $tipohabilidades;
        
    }

}
