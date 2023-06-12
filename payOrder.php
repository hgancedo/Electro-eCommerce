<?php
include_once "./src/Order.php";
// Recibir el array enviado desde JavaScript
$data = json_decode(file_get_contents('php://input'), true);

// Acceder al array en PHP
$arrayOrder = $data['myData'];

//Extraemos el usuario que va en la primera pos.
//y modifica el array resultante dejando únicamente el pedido
$user = array_shift($arrayOrder);

//Obtenemos el id del último pedido
$order = new Order();
$order->insertOrder($user);
$lastOrder = $order->getLastIdOrder();

//Insertamos todos los productos en productos_pedido con el id del pedido obtenido

foreach($arrayOrder as $product) {
    $order->insertProducts($lastOrder, intval($product[0]), $product[3]);
}


// Devolver una respuesta (opcional)
$response = 'Pedido realizado y registrado en su cuenta->pedidos';
echo json_encode($response);