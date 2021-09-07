<?php

class daoUsuarioHabilidad implements Iusuariohabilidad{
    //put your code here
    public function crear(\UsuarioHabilidad $usuariohabilidad) {
        try {
            foreach ($usuariohabilidad->getIdHabilidades() as $idhabilidad){
            $sql = 'insert into tb_usuariohabilidades (id_habilidades,idUsuario,estado) values (:id_habilidades,:idUsuario,:estado)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id_habilidades', $idhabilidad, PDO::PARAM_INT);
            $stmp->bindParam(':idUsuario', $usuariohabilidad->getIdUsuario(), PDO::PARAM_INT);
            $stmp->bindParam(':estado', $usuariohabilidad->getEstado(), PDO::PARAM_INT);
            $stmp->execute();   
            }
            
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function delete(\UsuarioHabilidad $usuariohabilidad) {
         try {
            $sql = 'delete from tb_usuariohabilidades where idusuariohabilidades = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $usuariohabilidad->getIdUsuarioHabilidades(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\UsuarioHabilidad $usuariohabilidad) {
        
    }

    public function listar($idusuario) {
        $usuarioshabilidades = array();
        try {
            $sql = 'SELECT uh.idusuariohabilidades as id,uh.id_habilidades as idhabilidades, h.descripcion as descripcion, uh.estado as estado, uh.idUsuario from tb_usuariohabilidades uh INNER join tb_habilidades h on uh.id_habilidades = h.id_habilidades WHERE idUsuario = "'.$idusuario.'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarioshabilidades[] = new UsuarioHabilidad($obj->id, $obj->descripcion, $obj->idUsuario, $obj->estado);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarioshabilidades;
    }

    public function listarId($id) {
        $usuariohabilidad = null;
        try {
            $sql = 'SELECT * from tb_usuariohabilidades WHERE idusuariohabilidades = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariohabilidad = $obj;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariohabilidad;
    }

}
