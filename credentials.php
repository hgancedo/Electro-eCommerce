<?php
session_start();

if(isset($_POST['logout'])) {
    unset($_SESSION['login']);
    echo json_encode("usuario desconectado");
}