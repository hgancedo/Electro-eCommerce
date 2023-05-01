<?php
include_once "./src/Conexion.php";

class Producto extends Conexion {

    public function __construct() {

        parent::__construct();

    }

    //Seleccionamos productos filtrando por familia e id como argumento opcional
    public function getProducts($familia, $id=null) {

        //Si $id==null, sólo consultamos por familia
        if(!$id) {
            $sql="SELECT * FROM productos WHERE familia = :f";
        } else {
            $sql="SELECT * FROM productos WHERE familia = :f AND id = :id";
        }

        $stm=$this->conexion->prepare($sql);
        try {
            if(!$id) {
                $stm->execute([":f"=>$familia]);
            } else {
                $stm->execute([":f"=>$familia, ":id"=>$id]);
            }
            
        } catch (Exception $ex) {
            echo "Error al seleccionar el producto: <br>" .$ex->getMessage();
        }

        return $stm->fetchAll();
    }

    //Selección aleatoria. En producción filtraríamos por fecha para mostrar novedades recientes, calcularíamos productos mas vendidos para superventas y productos que hayan bajado de precio para las ofertas. Devuelve columnas de tabla productos y las columnas, 2, de tabla familias
    public function getRandomProducts($num) {
        $sql = "SELECT id, nombre_corto, pvp, f.nombre, f.cod FROM productos p inner join familias f 
        ON p.familia = f.cod order by RAND() LIMIT $num";
        $stm=$this->conexion->prepare($sql);
        try {
            $stm->execute();
        } catch (Exception $ex) {
            echo "Error al seleccionar productos aleatorios <br>" .$ex->getMessage();
        }

        return $stm->fetchAll();

    }
}

    

