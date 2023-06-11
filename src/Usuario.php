<?php
include_once "./src/Conexion.php";

class Usuario extends Conexion {

    public function __construct() {

        parent::__construct();

    }

    public function getUserData($user) {
        $sql = "SELECT * FROM usuarios WHERE usuario = :u";
        try {
            $stm=$this->conexion->prepare($sql);
            $stm->execute([":u"=> $user]);
        } catch (Exception $ex) {
            echo "Error en la consulta del alias del usuario: <br>" .$ex->getMessage();
        }

        return $stm->fetchAll();
    }

    public function checkUserEmail($email){
        $sql = "SELECT * FROM usuarios WHERE email = :e"; 
        try {
            $stm=$this->conexion->prepare($sql);
            $stm->execute([":e"=> $email]);
        } catch (Exception $ex) {
            echo "Error en la consulta de email del usuario: <br>" .$ex->getMessage();
        }

        return $stm->fetchAll();
    }

    public function insertUser($alias, $pass, $nom, $lastName, $email, $address, $tel) {
        $passEnc = hash('sha256', $pass);
        $sql = "INSERT INTO usuarios values(:a, :p, :n, :l, :e, :ad, :t)";
        try {
            $this->conexion->beginTransaction();
            $stm = $this->conexion->prepare($sql);
            $stm->execute([":a"=> $alias, ":p"=> $passEnc, ":n"=> $nom, ":l"=> $lastName, ":e"=> $email, ":ad"=> $address, ":t"=> $tel]);
            $this->conexion->commit();

        } catch (Exception $ex) {
            $this->conexion->rollBack();
            echo "Error en la inserción del nuevo usuario: " .$ex->getMessage();
        }
    }

    
}