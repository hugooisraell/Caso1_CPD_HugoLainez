<?php

require_once '../models/Pedido.php';

$pedido = new Pedido();

// Guarda el id del pedido a eliminar
$id = 51;

if ($pedido->eliminarPedido($id)) {
    echo "Pedido eliminado con exito";
} else {
    echo "Error al eliminar el pedido";
}