<?php

include_once "./src/Conexion.php";

class Order extends Conexion {

    public function __construct() {

        parent::__construct();

    }

    public function insertOrder($user) {
        $sql = "INSERT INTO pedido (usuario, fecha) values(:u, :d)";
        $date = new DateTime();
        try {
            $this->conexion->beginTransaction();
            $stm = $this->conexion->prepare($sql);
            $stm->execute([":u"=>$user, ":d"=>$date->format('Y-m-d')]);
            $this->conexion->commit();
        } catch (Exception $ex) {
            $this->conexion->rollback();
            echo "Error al insertar en la tabla pedido: " .$ex->getMessage();
        }
    }

    public function getLastIdOrder() {
        $sql = "SELECT id from pedido ORDER BY id DESC LIMIT 1";
        try {
            $stm = $this->conexion->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();
            $lastId = $result[0]['id'];
        } catch (Exception $ex) {
            echo "Error en la obtención del último id de pedido: " .$ex->getMessage();
        }

        return $lastId;
    }
    
    public function insertProducts($order, $idProd, $ud) {
        $sql = "INSERT INTO productos_pedido VALUES(:o, :i, :u)";
        try {
            $this->conexion->beginTransaction();
            $stm = $this->conexion->prepare($sql);
            $stm->execute([":o"=>$order, ":i"=>$idProd, ":u"=> $ud]);
            $this->conexion->commit();
        } catch (Exception $ex) {
            $this->conexion->rollback();
            echo "Error al insertar en la tabla productos_pedido: " .$ex->getMessage();
        }
    }

    public function getUserOrders($user) {
        $sql = "SELECT * FROM pedido WHERE usuario = :u";
        try {
            $stm=$this->conexion->prepare($sql);
            $stm->execute([":u"=>$user]);
        } catch (Exception $ex) {
            echo "Error al comprobar los pedidos del usuario " .$ex->getMessage(). "<br>";
        }

        return $stm->fetchAll();
    }

    public function getProductsOrder($pedidoId) {
        $sql = "SELECT * FROM productos_pedido WHERE pedido_id = :p";
        try {
            $stm=$this->conexion->prepare($sql);
            $stm->execute([":p"=>$pedidoId]);
        } catch (Exception $ex) {
            echo "Error al comprobar los productos del pedido " .$ex->getMessage(). "<br>";
        }

        return $stm->fetchAll();
    }

}