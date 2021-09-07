<?php

class daoTesisLink implements Itesislink {

    public function aprobar(\TesisLink $tesis) {
        try {
            $sql = 'UPDATE tb_tesis_link SET status = 2  WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);

            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function cancelar(\TesisLink $tesis) {
        try {
            $sql = 'UPDATE tb_tesis_link SET status = 5 WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function crear(\TesisLink $tesis) {
        try {
            $sql = 'INSERT INTO tb_tesis_link ( link, status, idequipo) VALUES ( :link, 2, :id)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':link', $tesis->getLink(), PDO::PARAM_STR);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false; 
    }

    public function eliminar(\TesisLink $tesis) {
        try {
            $sql = 'delete from tb_tesis_link where idequipo = :id ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listar($idequipo) {
        $tesis = array();
        try {

            $sql = 'SELECT id_tesis_link as id,link,DATE_FORMAT(fechasustentacion, "%Y-%m-%dT%h:%i") as fechasustentacion,status,idequipo FROM tb_tesis_link WHERE  idequipo = "' . $idequipo . '"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $tesis[] = new TesisLink($obj->id, $obj->link, $obj->status, $obj->idequipo,$obj->fechasustentacion);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $tesis;
    }

    
    public function status($idequipo) {
        try {
            $sql = 'SELECT status FROM tb_tesis_link where idequipo = "'.$idequipo.'" LIMIT 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $tesis = $stmp->fetchAll();
            if(!$tesis){
                $datos = 0;
            }else{
                $datos = $tesis[0];
            }
          return $datos;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function actualizar(\TesisLink $tesis) {
        try {
            $sql = 'UPDATE tb_tesis_link SET link = :link where idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':link', $tesis->getLink(), PDO::PARAM_STR);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false; 
    }

    public function cancelarcorrecion(\TesisLink $tesis) {
        try {
            $sql = 'UPDATE tb_tesis_link SET status = 3  WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);

            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function correcionhecha(\TesisLink $tesis) {
        try {
            $sql = 'UPDATE tb_tesis_link SET status = 5  WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);

            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function actualizar2(\TesisLink $tesis) {
        try {
            $sql = 'UPDATE tb_tesis_link SET link = :link, status = 6 where idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':link', $tesis->getLink(), PDO::PARAM_STR);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false; 
    }

    public function aprobarcorrecion(\TesisLink $tesis) {
        try {
            $sql = 'UPDATE tb_tesis_link SET status = 7  WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);

            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function cancelar2(\TesisLink $tesis) {
         try {
            $sql = 'UPDATE tb_tesis_link SET status = 6  WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);

            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function cancelarfecha(\TesisLink $tesis) {
          try {
            $sql = 'UPDATE tb_tesis_link SET status = 7  WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);

            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listarcantidadx2() {
         $tesis = array();
        try {

            $sql = 'SELECT f.id_tesis_link as id,f.fechasustentacion,f.link,f.status,f.idequipo FROM tb_tesis_link f inner join tb_equipo e on e.idequipo = f.idequipo inner join tb_usuario u on u.idUsuario = e.idUsuario WHERE status = 9 and not isnull(e.idUsuario2) GROUP by e.idequipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $tesis[] = new TesisLink($obj->id, $obj->link, $obj->status, $obj->idequipo,$obj->fechasustentacion);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $tesis;
    }

    public function listarcantidad() {
         $tesis = array();
        try {

            $sql = 'SELECT f.id_tesis_link as id,f.fechasustentacion,f.link,f.status,f.idequipo FROM tb_tesis_link f inner join tb_equipo e on e.idequipo = f.idequipo inner join tb_usuario u on u.idUsuario = e.idUsuario WHERE status = 9 and isnull(e.idUsuario2) GROUP by e.idequipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $tesis[] = new TesisLink($obj->id, $obj->link, $obj->status, $obj->idequipo,$obj->fechasustentacion);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $tesis;
    }

}
