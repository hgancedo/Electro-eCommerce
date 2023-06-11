<?php
include_once "./src/Usuario.php";

if(isset($_POST['alias']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['lastName']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['tel'])) {
    $user = new Usuario();
    $user->insertUser($_POST['alias'], $_POST['password'], $_POST['nom'], $_POST['lastName'], $_POST['email'], $_POST['address'], $_POST['tel']);
    echo json_encode("registro realizado correctamente");
}
