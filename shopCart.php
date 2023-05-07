<?php
session_start();

//para pruebas
// session_destroy();

//Recibimos la cadena en un string, con los elemtos separados por ','
if(isset($_POST['prod'])) {

    //guardamos en una variable todo el string recibido
    $prodStr = $_POST['prod'];

    //Creamos nuevo array dnd guardar el string que vamos a tratar
    $prod = [];
    //Eliminamos el carácter ',' para formar un array con id, nom_corto y precio(el precio aún está como tipo string)
    //había problemas en la obtención del string cuando tenía " en las pulgadas, en este fichero o en el .js
    $prod = explode("," ,$prodStr);

    //convertimos a entero la última posición -uds-
    $prod[count($prod)-1] = floatval($prod[count($prod)-1]);

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

















