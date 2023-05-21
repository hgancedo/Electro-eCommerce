<?php
session_start();

//para pruebas
//session_destroy();


//Si recibimos un producto para add al carrito
//Recibimos la cadena en un string, con los elemtos separados por ','
if(isset($_POST['prod'])) {

    //guardamos en una variable todo el string recibido
    $prodStr = $_POST['prod'];

    //Creamos nuevo array dnd guardar el string que vamos a tratar
    $prod = [];
    //Eliminamos el carácter ',' para formar un array con id, nom_corto y precio(el precio aún está como tipo string)
    //había problemas en la obtención del string cuando tenía " en las pulgadas, en este fichero o en el .js
    $prod = explode("," ,$prodStr);

    //convertimos a entero la penúltima posición -uds-
    $prod[count($prod)-2] = floatval($prod[count($prod)-2]);

    //pvp no hace falta pasarlo a float, porque lo devolvemos a js tal cual y hacemos el casting allí

    if(!isset($_SESSION['arrayProd'])) {
        $_SESSION['arrayProd'] = array();
        $_SESSION['arrayProd'][] = $prod; 
    } else {
        //Comprobar si producto existe, si es así, añadir una ud a su array
        $control = false;
        //cuando utilizamos "as" para recorrer $_SESSION ha de hacerse por referencia con "&"
        foreach($_SESSION['arrayProd'] as &$innerArray) {
                if(in_array($prod[0], $innerArray)) {
                    $innerArray[3] += $prod[3];
                    $control = true;
                }
        }
        //Si el producto no existe, añado todo el array a la cesta
        if(!$control) $_SESSION['arrayProd'][] = $prod; 
    
    }
    //para pruebas
    //session_destroy();
    echo json_encode($_SESSION['arrayProd']);
} 

//Si recibimos id para borrar ese producto (y todas sus uds) del carrito
if(isset($_POST['remove'])) {
    //id del producto a borrar
    $remProd = $_POST['remove'];

    //Buscamos en el array y borramos. Recordad usar "&" para modificar SESSION por referencia
    foreach($_SESSION['arrayProd'] as &$innerArray) {
        if($remProd === $innerArray[0]) {
            $innerArray = [];
            //hay que borrar el array, filtrar los array vacíos que quedan en SESSION arrayProd, si no se queda como vacío o undefined, pero sigue existiendo y da problemas
            $_SESSION['arrayProd'] = array_filter($_SESSION['arrayProd']);
            //Si se queda vacío el session array, lo eliminamos
            if(count($_SESSION['arrayProd']) == 0) unset($_SESSION['arrayProd']);
        }
        //no podemos devolver el array SESSION con echo aquí pq cuando se vacíe dará error undefined
        //devolvemos algo para que no salte al catch error
        echo 1;
        
    }
 
}

















