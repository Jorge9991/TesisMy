<?php

class daoCronograma implements Icronograma{
    
    public function editar(\Cronograma $cronograma) {
        
    try {
            $sql = 'UPDATE cronograma SET fechainicio = :fechainicio1 , fechafinal = :fechafinal1 WHERE idcronograma = :idcronograma1;'
                    . 'UPDATE cronograma SET fechainicio = :fechainicio2 , fechafinal = :fechafinal2 WHERE idcronograma = :idcronograma2;'
                    . 'UPDATE cronograma SET fechainicio = :fechainicio3 , fechafinal = :fechafinal3 WHERE idcronograma = :idcronograma3;'
                    . 'UPDATE cronograma SET fechainicio = :fechainicio4 , fechafinal = :fechafinal4 WHERE idcronograma = :idcronograma4;'
                    . 'UPDATE cronograma SET fechainicio = :fechainicio5 , fechafinal = :fechafinal5 WHERE idcronograma = :idcronograma5;'
                    . 'UPDATE cronograma SET fechainicio = :fechainicio6 , fechafinal = :fechafinal6 WHERE idcronograma = :idcronograma6;'
                    . 'UPDATE cronograma SET link = :link ;';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':idcronograma1', $cronograma->getIdCronograma1(), PDO::PARAM_INT);
            $stmp->bindParam(':fechainicio1', $cronograma->getFechainicio1(), PDO::PARAM_STR);
            $stmp->bindParam(':fechafinal1', $cronograma->getFechafin1(), PDO::PARAM_STR);
            $stmp->bindParam(':idcronograma2', $cronograma->getIdCronograma2(), PDO::PARAM_INT);
            $stmp->bindParam(':fechainicio2', $cronograma->getFechainicio2(), PDO::PARAM_STR);
            $stmp->bindParam(':fechafinal2', $cronograma->getFechafin2(), PDO::PARAM_STR);
            $stmp->bindParam(':idcronograma3', $cronograma->getIdCronograma3(), PDO::PARAM_INT);
            $stmp->bindParam(':fechainicio3', $cronograma->getFechainicio3(), PDO::PARAM_STR);
            $stmp->bindParam(':fechafinal3', $cronograma->getFechafin3(), PDO::PARAM_STR);
            $stmp->bindParam(':idcronograma4', $cronograma->getIdCronograma4(), PDO::PARAM_INT);
            $stmp->bindParam(':fechainicio4', $cronograma->getFechainicio4(), PDO::PARAM_STR);
            $stmp->bindParam(':fechafinal4', $cronograma->getFechafin4(), PDO::PARAM_STR);
            $stmp->bindParam(':idcronograma5', $cronograma->getIdCronograma5(), PDO::PARAM_INT);
            $stmp->bindParam(':fechainicio5', $cronograma->getFechainicio5(), PDO::PARAM_STR);
            $stmp->bindParam(':fechafinal5', $cronograma->getFechafin5(), PDO::PARAM_STR);
            $stmp->bindParam(':idcronograma6', $cronograma->getIdCronograma6(), PDO::PARAM_INT);
            $stmp->bindParam(':fechainicio6', $cronograma->getFechainicio6(), PDO::PARAM_STR);
            $stmp->bindParam(':fechafinal6', $cronograma->getFechafin6(), PDO::PARAM_STR);
            $stmp->bindParam(':link', $cronograma->getLink(), PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() >= 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
        
    }

    public function listar() {
         $cronogramas = array();
        try {
            $sql = 'SELECT idcronograma,descripcion,fechainicio, fechafinal,link FROM cronograma';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $cronogramas = $stmp->fetchAll();
            return $cronogramas;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $cronogramas;
    }

}
