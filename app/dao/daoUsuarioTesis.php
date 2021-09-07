<?php

class daoUsuarioTesis implements Iusuariotesis{
    //put your code here
    public function cantidad() {
        $usuariotesis = array();
        try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario where r.status = 2 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function listar() {
        $usuariotesis = array();
        try {
            $sql = 'SELECT COUNT(r.id_tesis_link) as total, e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2 where r.status = 2  or r.status = 4 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function listar2() {
        $usuariotesis = array();
        try {
            $sql = 'SELECT COUNT(r.id_tesis_link) as total, e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario where isnull(idUsuario2) and r.status = 2 or r.status = 3 or r.status = 4 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function cantidadtesis($idusuario) {
        $usuariotesis = array();
        try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_parciego p on p.idequipo = e.idequipo where p.idUsuario = "'.$idusuario.'" and r.status = 3 and p.proceso = 2 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function listartesis($idusuario) {
        $usuariotesis = array();
        try {
           
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2 INNER join tb_parciego p on p.idequipo = e.idequipo where p.idUsuario = "'. $idusuario .'" and p.proceso = 2 and r.status = 3 or r.status = 5 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
           foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function listartesis2($idusuario) {
        $usuariotesis = array();
          try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_parciego p on p.idequipo = e.idequipo where isnull(idUsuario2) and p.idUsuario = "'. $idusuario .'" and p.proceso = 2 and r.status = 3 or r.status = 5 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function cantidadcorreciontesis($idusuario) {
        $usuariotesis = array();
        try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_parciego p on p.idequipo = e.idequipo where p.idUsuario = "'.$idusuario.'" and r.status = 6 and p.proceso = 2 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function listarcorreciontesis($idusuario) {
         $usuariotesis = array();
        try {
           
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2 INNER join tb_parciego p on p.idequipo = e.idequipo where p.idUsuario = "'. $idusuario .'" and p.proceso = 2 and r.status = 6 or r.status = 7 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
           foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function listarcorreciontesis2($idusuario) {
        $usuariotesis = array();
          try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_parciego p on p.idequipo = e.idequipo where isnull(idUsuario2) and p.idUsuario = "'. $idusuario .'" and p.proceso = 2 and r.status = 6 or r.status = 7 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function cantidadfechatesis() {
        $usuariotesis = array();
        try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_parciego p on p.idequipo = e.idequipo where r.status = 7 and p.proceso = 2 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function listarfechatesis() {
        $usuariotesis = array();
        try {
           
            $sql = 'SELECT COUNT(r.id_tesis_link) as total, e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2 where r.status = 7 or r.status = 8 or r.status = 9 GROUP by e.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
           foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function listarfechatesis2() {
        $usuariotesis = array();
          try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario and isnull(e.idUsuario2) where r.status = 7 or r.status = 8 or r.status = 9 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function cantidadcalificaciontesis($idusuario) {
        $usuariotesis = array();
        try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_parciego p on p.idequipo = e.idequipo where p.idUsuario = "'.$idusuario.'" and r.status = 8 and r.fechasustentacion >= Now() and p.proceso = 3 GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function listarcalificaciontesis($idusuario) {
         $usuariotesis = array();
        try {
           
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido," ","-"," ", us.nombre," ",us.apellido ) as nombres, r.status  FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_usuario us on us.idUsuario = e.idUsuario2 INNER join tb_parciego p on p.idequipo = e.idequipo INNER join tb_formatos f on f.idequipo = e.idequipo where  r.status = 8 or r.status = 9 and p.proceso = 3 and p.idUsuario = "'.$idusuario.'"  GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
           foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

    public function listarcalificaciontesis2($idusuario) {
        $usuariotesis = array();
          try {
            $sql = 'SELECT e.idequipo ,concat( u.nombre," ",u.apellido ) as nombres, r.status FROM tb_tesis_link r INNER join tb_equipo e on e.idequipo = r.idequipo INNER join tb_usuario u on u.idUsuario = e.idUsuario INNER join tb_parciego p on p.idequipo = e.idequipo INNER join tb_formatos f on f.idequipo = e.idequipo where  p.proceso = 3  and r.status = 8 or r.status = 9 and p.idUsuario = "'.$idusuario.'" and isnull(e.idUsuario2) GROUP by r.idequipo ORDER by r.status ASC';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuariotesis[] = new UsuarioTesis($obj->idequipo, $obj->nombres, $obj->status,"");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuariotesis;
    }

}
