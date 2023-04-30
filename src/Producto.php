<?php
include_once "./src/Conexion.php";

class Producto extends Conexion {

    public function __construct() {

        parent::__construct();

    }

    //Seleccionamos productos filtrando por familia
    public function getProducts($familia) {

        $sql="SELECT * FROM productos WHERE familia = :f";
        $stm=$this->conexion->prepare($sql);
        try {
            $stm->execute([":f"=>$familia]);
        } catch (Exception $ex) {
            echo "Error al comprobar el dorsal: <br>" .$ex->getMessage();
        }

        return $stm->fetchAll();
    }

    //Selección aleatoria. En producción filtraríamos por fecha para mostrar novedades recientes, calcularíamos productos mas vendidos para superventas y productos que hayan bajado de precio para las ofertas.
    public function getRandomProducts($num) {
        $sql = "SELECT id, nombre_corto, pvp, f.nombre FROM productos p inner join familias f 
        ON p.familia = f.cod order by RAND() LIMIT $num";
        $stm=$this->conexion->prepare($sql);
        try {
            $stm->execute();
        } catch (Exception $ex) {
            echo "Error al comprobar el dorsal: <br>" .$ex->getMessage();
        }

        return $stm->fetchAll();

    }
}

    

