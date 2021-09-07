<?php

class daoUsuario implements Iusuario {

    public function crear(\Usuario $usuario) {
        try {
            $sql = 'insert into tb_usuario (cedula,nombre,apellido,direccion,telefono,correo,usuario,contrasena,idTipoUsuario,estado) values (:cedula,:nombre,:apellido,:direccion,:telefono,:correo,:usuario,:contrasena,:idtipo,:estado)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':cedula', $usuario->getCedula(), PDO::PARAM_STR);
            $stmp->bindParam(':nombre', $usuario->getNombre(), PDO::PARAM_STR);
            $stmp->bindParam(':apellido', $usuario->getApellido(), PDO::PARAM_STR);
            $stmp->bindParam(':direccion', $usuario->getDireccion(), PDO::PARAM_STR);
            $stmp->bindParam(':telefono', $usuario->getTelefono(), PDO::PARAM_STR);
            $stmp->bindParam(':correo', $usuario->getCorreo(), PDO::PARAM_STR);
            $stmp->bindParam(':usuario', $usuario->getUsuario(), PDO::PARAM_STR);
            $stmp->bindParam(':contrasena', $usuario->getClave(), PDO::PARAM_STR);
            $stmp->bindParam(':idtipo', $usuario->getIdTipoUsuario(), PDO::PARAM_INT);
            $stmp->bindParam(':estado', $usuario->getEstado(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function delete(\Usuario $usuario) {
        try {
            $sql = 'delete from tb_usuario WHERE idUsuario = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
       
            $stmp->bindParam(':id', $usuario->getIdUsuario(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\Usuario $usuario) {
        try {
            $sql = 'UPDATE tb_usuario SET cedula=:cedula, nombre=:nombre, apellido=:apellido, direccion=:direccion, telefono=:telefono, correo=:correo, usuario=:usuario, contrasena=:contrasena, idTipoUsuario=:idtipo, estado=:estado WHERE idUsuario = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $usuario->getIdUsuario(), PDO::PARAM_INT);
            $stmp->bindParam(':cedula', $usuario->getCedula(), PDO::PARAM_STR);
            $stmp->bindParam(':nombre', $usuario->getNombre(), PDO::PARAM_STR);
            $stmp->bindParam(':apellido', $usuario->getApellido(), PDO::PARAM_STR);
            $stmp->bindParam(':direccion', $usuario->getDireccion(), PDO::PARAM_STR);
            $stmp->bindParam(':telefono', $usuario->getTelefono(), PDO::PARAM_STR);
            $stmp->bindParam(':correo', $usuario->getCorreo(), PDO::PARAM_STR);
            $stmp->bindParam(':usuario', $usuario->getUsuario(), PDO::PARAM_STR);
            $stmp->bindParam(':contrasena', $usuario->getClave(), PDO::PARAM_STR);
            $stmp->bindParam(':idtipo', $usuario->getIdTipoUsuario(), PDO::PARAM_INT);
            $stmp->bindParam(':estado', $usuario->getEstado(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() >= 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listar() {
        $usuarios = array();
        try {
            $sql = 'select u.idUsuario,u.cedula,u.nombre,u.apellido,u.direccion,u.telefono,u.correo,u.usuario,t.descripcion idTipoUsuario,u.estado from tb_usuario u,tb_tipousuario t where u.idTipoUsuario=t.idTipoUsuario  group by u.idUsuario  order by u.idUsuario asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarios[] = new Usuario($obj->idUsuario, $obj->cedula, $obj->nombre, $obj->apellido, $obj->direccion, $obj->telefono, $obj->correo, $obj->usuario, "", $obj->idTipoUsuario, $obj->estado);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarios;
    }

    public function listarId($id) {
        $usuario = array();
        try {
            $sql = 'select u.idUsuario,u.cedula,u.nombre,u.apellido,u.direccion,u.telefono,u.correo,u.usuario,u.contrasena,t.descripcion idTipoUsuario,u.idTipoUsuario as idtipo,u.estado from tb_usuario u,tb_tipousuario t where u.idTipoUsuario=t.idTipoUsuario and idUsuario = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $u) {
                $usuario = $u;
            }
            return $usuario;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuario;
    }

    public function login(\Usuario $usuario) {
        $usuario_obj = array();
        try {
            $sql = "select * from tb_usuario where usuario = :user and contrasena = :password and estado=1";
            //Abro la conexion a la BD
            $con = DataBase::getInstancia();
            //prepara el Query SQL
            $stmp = $con->prepare($sql);
            $stmp->bindParam(':user', $usuario->getUsuario(), 5);
            $stmp->bindParam(':password', $usuario->getClave(), 5);
            //Ejecuto el Query SQL
            $stmp->execute();
            if (($u = $stmp->fetch(PDO::FETCH_OBJ))) {
                $usuario_obj = $u;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $usuario_obj;
    }

    public function habilidades($idusuario) {
        $id = '';
        try {
            $sql = 'SELECT IF((select idTipoUsuario from tb_usuario WHERE idUsuario = :idUsuario) = 2,
            (SELECT COUNT(idusuariohabilidades) as habilidades FROM tb_usuariohabilidades where idUsuario = :idUsuario), 0) as agregarhabilidades';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':idUsuario', $idusuario, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $id = $obj->agregarhabilidades;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $id;
    }

    public function equipo($idusuario) {
        $id = '';
        try {
            $sql = 'SELECT IF((select idTipoUsuario from tb_usuario WHERE idUsuario = :idUsuario) = 2,
            (SELECT COUNT(idusuariohabilidades) as habilidades FROM tb_usuariohabilidades where idUsuario = :idUsuario), 0) as agregarhabilidades';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':idUsuario', $idusuario, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $id = $obj->agregarhabilidades;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $id;
    }

    public function listaregresado($idusuario) {
        $usuarios = array();
        try {
            $sql = 'select u.idUsuario,u.apellido,u.nombre from tb_usuario u inner join tb_requisitos r where r.idUsuario = u.idUsuario and r.status = 3 and u.idUsuario != "'.$idusuario.'" GROUP by idUsuario';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarios[] = new Usuario($obj->idUsuario, "", $obj->nombre, $obj->apellido, "", "", "", "", "", "", "");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarios;
    }
    
    

    public function listarequipo($idequipo) {
        try {
            $sql = 'SELECT idequipo FROM tb_equipo where idUsuario = "'.$idequipo.'" or idUsuario2 = "'.$idequipo.'" and solicitud =2';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $equipo = $stmp->fetchAll();
            if(!$equipo){
                $datos = 0;
            }else{
                $datos = $equipo[0];
            }
          return $datos;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function listadejurado() {
        $usuarios = array();
        try {
            $sql = 'select u.idUsuario,u.cedula,u.nombre,u.apellido,u.direccion,u.telefono,u.correo,u.usuario,t.descripcion idTipoUsuario,u.estado from tb_usuario u,tb_tipousuario t where u.idTipoUsuario=t.idTipoUsuario and u.idTipoUsuario = 2 group by u.idUsuario  order by u.idUsuario asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarios[] = new Usuario($obj->idUsuario, $obj->cedula, $obj->nombre, $obj->apellido, $obj->direccion, $obj->telefono, $obj->correo, $obj->usuario, "", $obj->idTipoUsuario, $obj->estado);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarios;
    }

    public function listadeusuarioparciego($idequipo) {
        $usuarios = array();
        try {
            $sql = 'SELECT u.idUsuario,u.nombre,u.apellido FROM tb_usuario u inner JOIN tb_usuariohabilidades uh on u.idUsuario = uh.idUsuario inner join tb_equipohabilidades e on uh.id_habilidades = e.id_habilidades where e.idequipo = "'. $idequipo. '" GROUP by u.idUsuario';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarios[] = new Usuario($obj->idUsuario, "", $obj->nombre, $obj->apellido, "", "", "", "", "", "", "");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarios;
    }

    public function listaparciego($idequipo) {
        try {
            $sql = ' SELECT u.idUsuario, usu.nombre, usu.apellido FROM tb_parciego u inner JOIN tb_usuario usu on usu.idUsuario = u.idUsuario inner JOIN tb_usuariohabilidades uh on u.idUsuario = uh.idUsuario inner join tb_equipohabilidades e on uh.id_habilidades = e.id_habilidades where u.idequipo = "'.$idequipo.'" GROUP by u.idUsuario';
            $cn = DataBase::getInstancia();
             $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function listaparciego2($idequipo) {
        $usuarios = array();
        try {
            $sql = 'SELECT u.idUsuario, usu.nombre, usu.apellido FROM tb_parciego u inner JOIN tb_usuario usu on usu.idUsuario = u.idUsuario   where u.idequipo = "'.$idequipo.'" GROUP by u.idUsuario';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarios[] = new Usuario($obj->idUsuario, "", $obj->nombre, $obj->apellido, "", "", "", "", "", "", "");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarios;
    }

    public function listaparciego2tesis($idequipo) {
        $usuarios = array();
        try {
            $sql = 'SELECT u.idUsuario, usu.nombre, usu.apellido FROM tb_parciego u inner JOIN tb_usuario usu on usu.idUsuario = u.idUsuario   where u.proceso = 2 and u.idequipo = "'.$idequipo.'" GROUP by u.idUsuario';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarios[] = new Usuario($obj->idUsuario, "", $obj->nombre, $obj->apellido, "", "", "", "", "", "", "");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarios;
    }

    public function listaparciegotesis($idequipo) {
        try {
            $sql = ' SELECT u.idUsuario, usu.nombre, usu.apellido FROM tb_parciego u inner JOIN tb_usuario usu on usu.idUsuario = u.idUsuario inner JOIN tb_usuariohabilidades uh on u.idUsuario = uh.idUsuario inner join tb_equipohabilidades e on uh.id_habilidades = e.id_habilidades where u.proceso = 2 and u.idequipo = "'.$idequipo.'" GROUP by u.idUsuario';
            $cn = DataBase::getInstancia();
             $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function listadeusuarioparciego2($idequipo) {
         $usuarios = array();
        try {
            $sql = 'SELECT u.idUsuario,u.nombre,u.apellido FROM tb_usuario u inner JOIN tb_usuariohabilidades uh on u.idUsuario = uh.idUsuario inner join tb_equipohabilidades e on uh.id_habilidades = e.id_habilidades where  e.idequipo = "'. $idequipo. '" GROUP by u.idUsuario';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarios[] = new Usuario($obj->idUsuario, "", $obj->nombre, $obj->apellido, "", "", "", "", "", "", "");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarios;
    }

    public function listajurado2tesis($idequipo) {
        $usuarios = array();
        try {
            $sql = 'SELECT u.idUsuario,u.nombre,u.apellido FROM tb_usuario u inner JOIN tb_usuariohabilidades uh on u.idUsuario = uh.idUsuario inner join tb_equipohabilidades e on uh.id_habilidades = e.id_habilidades where  e.idequipo = "'. $idequipo. '" GROUP by u.idUsuario';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarios[] = new Usuario($obj->idUsuario, "", $obj->nombre, $obj->apellido, "", "", "", "", "", "", "");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarios;
    }

    public function listajuradotesis($idequipo) {
        try {
            $sql = ' SELECT u.idUsuario, usu.nombre, usu.apellido FROM tb_parciego u inner JOIN tb_usuario usu on usu.idUsuario = u.idUsuario inner JOIN tb_usuariohabilidades uh on u.idUsuario = uh.idUsuario inner join tb_equipohabilidades e on uh.id_habilidades = e.id_habilidades where u.proceso = 3 and u.idequipo = "'.$idequipo.'" GROUP by u.idUsuario';
            $cn = DataBase::getInstancia();
             $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function listajurado3tesis($idequipo) {
           $usuarios = array();
        try {
            $sql = 'SELECT u.idUsuario, usu.nombre, usu.apellido FROM tb_parciego u inner JOIN tb_usuario usu on usu.idUsuario = u.idUsuario   where u.proceso = 3 and u.idequipo = "'.$idequipo.'" GROUP by u.idUsuario';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarios[] = new Usuario($obj->idUsuario, "", $obj->nombre, $obj->apellido, "", "", "", "", "", "", "");
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarios;
    }

    public function listargestor() {
          $usuarios = array();
        try {
            $sql = 'select u.idUsuario,u.cedula,u.nombre,u.apellido,u.direccion,u.telefono,u.correo,u.usuario,t.descripcion idTipoUsuario,u.estado from tb_usuario u,tb_tipousuario t where u.idTipoUsuario=t.idTipoUsuario and u.idTipoUsuario != 4 group by u.idUsuario  order by u.idUsuario asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarios[] = new Usuario($obj->idUsuario, $obj->cedula, $obj->nombre, $obj->apellido, $obj->direccion, $obj->telefono, $obj->correo, $obj->usuario, "", $obj->idTipoUsuario, $obj->estado);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarios;
    }

    public function listartutor() {
         $usuarios = array();
        try {
            $sql = 'select u.idUsuario,u.cedula,u.nombre,u.apellido,u.direccion,u.telefono,u.correo,u.usuario,t.descripcion idTipoUsuario,u.estado from tb_usuario u,tb_tipousuario t where u.idTipoUsuario=t.idTipoUsuario and u.idTipoUsuario != 3 group by u.idUsuario  order by u.idUsuario asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarios[] = new Usuario($obj->idUsuario, $obj->cedula, $obj->nombre, $obj->apellido, $obj->direccion, $obj->telefono, $obj->correo, $obj->usuario, "", $obj->idTipoUsuario, $obj->estado);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarios;
    }

    public function listarcantidadegresado() {
        $usuarios = array();
        try {
            $sql = 'select u.idUsuario,u.cedula,u.nombre,u.apellido,u.direccion,u.telefono,u.correo,u.usuario,t.descripcion idTipoUsuario,u.estado from tb_usuario u,tb_tipousuario t where u.idTipoUsuario=t.idTipoUsuario and u.idTipoUsuario = 3 group by u.idUsuario  order by u.idUsuario asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $usuarios[] = new Usuario($obj->idUsuario, $obj->cedula, $obj->nombre, $obj->apellido, $obj->direccion, $obj->telefono, $obj->correo, $obj->usuario, "", $obj->idTipoUsuario, $obj->estado);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $usuarios;
    }

}
