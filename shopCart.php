<?php
session_start();

//Recibimos la cadena en un string, con los elemtos separados por ','
$prodStr = $_POST['prod'];

//Eliminamos el carácter ',' para formar un array con id, nom_corto y precio(string)
//había problemas en la obtención del string cuando tenía " en las pulgadas, aquí o en js
$prod = explode(",", $prodStr);
//convertimos a entero la última posición -precio-
$prod[count($prod)-1] = floatval($prod[count($prod)-1]);

if(!isset($_SESSION['arrayProd'])) {
    $_SESSION['arrayProd'] = array();
    $_SESSION['arrayProd'][] = $prod; 
} else {
    $_SESSION['arrayProd'][] = $prod; 
}

echo json_encode($_SESSION['arrayProd']);