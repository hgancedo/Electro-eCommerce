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

    //convertimos a entero la última posición -precio-
    $prod[count($prod)-1] = floatval($prod[count($prod)-1]);

    if(!isset($_SESSION['arrayProd'])) {
        $_SESSION['arrayProd'] = array();
        $_SESSION['arrayProd'][] = $prod; 
    } else {
        $_SESSION['arrayProd'][] = $prod; 
    
    }
    
    echo json_encode($_SESSION['arrayProd']);
    
}
















