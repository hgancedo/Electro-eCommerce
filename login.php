<?php
session_start();
include_once "./src/Conexion.php";

if(isset($_POST['user'])) $user = $_POST['user'];
if(isset($_POST['pass'])) $pass = $_POST['pass'];

$encrypt = hash('sha256', $pass);

$con = new Conexion();
$conexion = $con->createConnection();
$sql = "SELECT * FROM usuarios WHERE usuario = :u AND pass = :e";
try {
    $stm = $conexion->prepare($sql);
    $stm->execute([":u"=>$user, ":e"=>$encrypt]);
} catch (Exception $ex) {
    echo "Error en la consulta de usuario: " .$ex->getMessage();
}

if(count($stm->fetchAll()) > 0) {
    $_SESSION['login'] = $user;
    echo json_encode(["Usuario conectado como " .$user, true]);
} else {
    echo json_encode(["Usuario o contraseña incorrectos", false]); 
}
