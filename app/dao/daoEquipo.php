<?php

class daoEquipo implements Iequipo {

    //put your code here

    public function crear(\Equipo $equipo) {
        try {
            $sqlx = 'SELECT count(idequipo) as total FROM tb_equipo where idUsuario = :idUsuario2 or idUsuario2 = :idUsuario2 and solicitud =2';
            $cn = DataBase::getInstancia();
            $stm = $cn->prepare($sqlx);
            $stm->bindParam(':idUsuario2', $equipo->getIdUsuario2(), PDO::PARAM_INT);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $total = ($obj->total);
            }
            if ($total < 1) {
                $sql = 'INSERT INTO tb_equipo (idUsuario, idUsuario2, solicitud) VALUES ( :idUsuario, :idUsuario2, 1)';
                $stmp = $cn->prepare($sql);
                $stmp->bindParam(':idUsuario', $equipo->getIdUsuario(), PDO::PARAM_INT);
                $stmp->bindParam(':idUsuario2', $equipo->getIdUsuario2(), PDO::PARAM_INT);
                $stmp->execute();
            }
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listar($idusuario) {
        try {
            $sql = 'SELECT count(idequipo) as total FROM tb_equipo where idUsuario = "' . $idusuario . '"  and solicitud =2';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $total = ($obj->total);
            }
            $sql2 = 'SELECT count(idequipo) as total FROM tb_equipo where  idUsuario2 = "' . $idusuario . '" and solicitud =2';

            $stmp2 = $cn->prepare($sql2);
            $stmp2->execute();
            foreach ($stmp2->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $total2 = ($obj->total);
            }

            if ($total == 0 and $total2 == 0) {
                $consulta = 0;
            } else {
                $consulta = 1;
            }
            return $consulta;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function solicitud() {
        
    }

    public function aceptar(\Equipo $equipo) {
        try {
            $sql = 'UPDATE tb_equipo SET solicitud = 2 WHERE idequipo = :idEquipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':idEquipo', $equipo->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function crearsolo(\Equipo $equipo) {
        try {
            $sql = 'INSERT INTO tb_equipo (idUsuario, solicitud) VALUES ( :idUsuario, 2)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':idUsuario', $equipo->getIdUsuario(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function solicitudenviada($idusuario) {
        try {
            $sql = 'SELECT count(idequipo) as total FROM tb_equipo where idUsuario = "' . $idusuario . '"  and solicitud = 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $total = ($obj->total);
            }

            return $total;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function cancelarsolicitud(\Equipo $equipo) {
        try {
            $sql = 'delete from tb_equipo where idUsuario= :idUsuario';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':idUsuario', $equipo->getIdUsuario(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listarSolicitudes($idusuario) {
        $solicitudes = array();
        try {
            $sql = 'SELECT e.idequipo,e.idUsuario,e.idUsuario2,e.solicitud,CONCAT ( u.apellido," ", u.nombre ) as nombre from tb_equipo e inner join tb_usuario u on u.idUsuario = e.idUsuario where idUsuario2 = " ' . $idusuario . '"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $solicitudes[] = new Equipo($obj->idequipo, $obj->idUsuario, $obj->idUsuario2, $obj->solicitud, $obj->nombre);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $solicitudes;
    }

    public function eliminar(\Equipo $equipo) {
        try {
            $sql = 'delete from tb_equipo where idequipo = :idEquipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':idEquipo', $equipo->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function equiposolo($idequipo) {
        try {
            $sql = 'SELECT IF((SELECT COUNT(idequipo) FROM tb_equipo where isnull(idUsuario2) and idequipo = "' . $idequipo . '") = 1,1 ,2) as equipo1o2';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function nombreequipo($idequipo) {
        try {
            $sql1 = 'SELECT IF((SELECT COUNT(idequipo) FROM tb_equipo where isnull(idUsuario2) and idequipo = "' . $idequipo . '") = 1,1 ,2) as equipo1o2';
            $cn1 = DataBase::getInstancia();
            $stmp1 = $cn1->prepare($sql1);
            $stmp1->execute();
            foreach ($stmp1->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $total = ($obj->equipo1o2);
            }
            if ($total == 2) {
                $usuarioformatos = array();

                $sql = 'SELECT COUNT(r.id_formatos) as total, e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres, r.status FROM tb_formatos r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2 and e.idequipo = "'.$idequipo.'" and r.status != 1 GROUP by r.idequipo ORDER by r.status ASC';
                $cn = DataBase::getInstancia();
                $stmp = $cn->prepare($sql);
                $stmp->execute();
                foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                    $usuarioformatos[] = new UsuarioFormato($obj->idequipo, $obj->nombres, $obj->status);
                }

                return $usuarioformatos;
            }
            if ($total == 1) {
                  $usuarioformatos = array();

                $sql = 'SELECT COUNT(r.id_formatos) as total, e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_formatos r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario and isnull(idUsuario2) and e.idequipo = "'.$idequipo.'" and  r.status != 1 GROUP by r.idequipo ORDER by r.status ASC';
                $cn = DataBase::getInstancia();
                $stmp = $cn->prepare($sql);
                $stmp->execute();
                foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                    $usuarioformatos[] = new UsuarioFormato($obj->idequipo, $obj->nombres, $obj->status);
                }

                return $usuarioformatos;
            }
            return $usuarioformatos;
        } catch (PDOException $e) {
            throw $e;
        }
    }

}
