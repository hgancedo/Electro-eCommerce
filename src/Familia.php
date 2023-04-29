<?php

include_once "./src/Conexion.php";

class Familia extends Conexion {

    public function __construct() {

        parent::__construct();

    }

    //Seleccionamos productos filtrando por familia
    public function getFamilyNames() {

        $sql="SELECT nombre FROM familias ORDER BY nombre DESC";
        $stm=$this->conexion->prepare($sql);
        try {
            $stm->execute();
        } catch (Exception $ex) {
            echo "Error al comprobar nombre de familia: <br>" .$ex->getMessage();
        }

        return $stm->fetchAll();
    }
}