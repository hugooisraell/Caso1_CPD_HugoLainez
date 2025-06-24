<?php

require_once '../models/Pedido.php';

$pedido = new Pedido();

// Almacena los nuevos datos
$id = 51;
$cliente = "Rosario Clemente";
$producto = "Helado Pinguino";
$cantidad = 5;
$estado = "pendiente";

// Intenta actualizar un pedido
if ($pedido->actualizarPedido($id, $cliente, $producto, $cantidad, $estado)) {
    echo "Pedido actualizado exitosamente.";
} else {
    echo "Error al actualizar el pedido";
}

