<?php

include_once "./src/Conexion.php";

class Familia extends Conexion {

    public function __construct() {

        parent::__construct();

    }

    //Seleccionamos productos filtrando por familia
    public function getFamilies($fam=null) {

        if(!$fam) {
            $sql="SELECT * FROM familias ORDER BY nombre DESC";
        } else {
            $sql ="SELECT * FROM familias WHERE cod = :c ORDER BY nombre DESC";
        }
        
        $stm=$this->conexion->prepare($sql);
        try {
            if(!$fam) {
                $stm->execute();
            } else {
                $stm->execute([":c"=>$fam]);
            }
            ;
        } catch (Exception $ex) {
            echo "Error al comprobar nombre de familia: <br>" .$ex->getMessage();
        }

        return $stm->fetchAll();
    }
}