<?php

require_once '../models/Pedido.php';

$pedido = new Pedido();

// Obrener pedidos
$pedidos = $pedido->obtenerPedidos();

if (count($pedidos) > 0) {
    foreach ($pedidos as $p) {
        echo "ID: " . $p['id'] ."<br>";
        echo "Cliente: " . $p['cliente'] ."<br>";
        echo "Producto: " . $p['producto'] ."<br>";
        echo "Cantidad: " . $p['cantidad'] ."<br>";
        echo "Estado: " . $p['estado'] ."<br>";
        echo "Fecha del pedido: " . $p['fecha_pedido'] ."<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron pedidos";
}