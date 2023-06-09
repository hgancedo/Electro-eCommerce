<?php
include_once "./src/Conexion.php";

class Usuario extends Conexion {

    public function __construct() {

        parent::__construct();

    }

    public function getUserData($user) {
        $sql = "SELECT * FROM usuarios WHERE usuario = :u";
        $stm=$this->conexion->prepare($sql);
        try {
            $stm->execute([":u"=> $user]);
        } catch (Exception $ex) {
            echo "Error en la consulta del alias del usuario: <br>" .$ex->getMessage();
        }

        return $stm->fetchAll();
    }

    public function checkUserEmail($email){
        $sql = "SELECT * FROM usuarios WHERE email = :e";
        $stm=$this->conexion->prepare($sql);
        try {
            $stm->execute([":e"=> $email]);
        } catch (Exception $ex) {
            echo "Error en la consulta de email del usuario: <br>" .$ex->getMessage();
        }

        return $stm->fetchAll();
    }
}