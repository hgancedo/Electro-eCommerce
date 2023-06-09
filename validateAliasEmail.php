<?php
include_once "./src/Conexion.php";
include_once "./src/Usuario.php";

$user = new Usuario();

if(isset($_POST['alias']) && isset($_POST['email'])){
    $askAlias = $user->getUserData($_POST['alias']);
    //Si existe el alias
    if(count($askAlias) > 0) {
        echo json_encode(-1);
    //Si no existe el alias
    } else {
        $askEmail = $user->checkUserEmail($_POST['email']);
        //Si existe el email
        if(count($askEmail) > 0) {
            echo json_encode(-2);
        //Si no existe ni el alias ni el email
        } else {
            echo json_encode(1);
        }
    }
}


