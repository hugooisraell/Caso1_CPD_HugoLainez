<?php

require_once '../models/Pedido.php';

$pedido = new Pedido();

// Almacena los datos
$cliente = "Rosario Clemente";
$producto = "Helado Pinguino";
$cantidad = "10";
$estado = "pendiente";

// Intenta agregar un pedido nuevo
if ($pedido->agregarPedido($cliente, $producto, $cantidad, $estado)) {
    echo "Pedido agregado exitosamente.";
} else {
    echo "Error al agregar un pedido";
}

