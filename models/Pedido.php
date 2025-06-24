<?php
// models/Pedido.php

// Incluye el archivo de configuración para usar la función conectarDB()
require_once __DIR__ . '/../config/conexion.php';

class Pedido {
    // Almacena la conexion de la base de datos
    private $conexion;

    // Establece la conexion a la base de datos
    public function __construct() {
        $this->conexion = conectarDB();
    }

    // Obtener todos los pedidos
    public function obtenerPedidos() {
        // Consulta SQL para manipular los registros de la tabla
        $sql = "SELECT * FROM pedidos";
        // Ejecutar consulta
        $resultado = $this->conexion->query($sql);

        // Retorna todos los registros como un array asociativo
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // Agregar un pedido
    public function agregarPedido($cliente, $producto, $cantidad, $estado) {
        // Consulta SQL con placeholders para evitar inyección
        $sql = "INSERT INTO pedidos (cliente, producto, cantidad, estado) VALUES (?, ?, ?, ?)";
        // Prepara la consulta
        $stmt = $this->conexion->prepare($sql);
        // Vincula los valores a los placeholders
        $stmt->bind_param('ssis', $cliente, $producto, $cantidad, $estado);
        // Ejecuta la consulta y retorna el resultado (true o false)
        return $stmt->execute();
    }

    // Actualizar un pedido
    public function actualizarPedido($id, $cliente, $producto, $cantidad, $estado) {
        // Consulta SQL para actualizar
        $sql = "UPDATE pedidos SET cliente = ?, producto = ?, cantidad = ?, estado = ? WHERE id = ?";
        // Prepara la consulta
        $stmt = $this->conexion->prepare($sql);
        // Vincula los valores a los placeholders
        $stmt->bind_param('ssisi', $cliente, $producto, $cantidad, $estado, $id);
        // Ejecuta la consulta y retorna el resultado (true o false)
        return $stmt->execute();
    }

    // Método para obtener un pedido por su ID
    public function obtenerPedidoPorId($id) {
        // Consulta para seleccionar un pedido según su ID
        $sql = "SELECT * FROM pedidos WHERE id = ?";
        // Prepara la consulta
        $stmt = $this->conexion->prepare($sql);
        // Vincula el ID al placeholder
        $stmt->bind_param('i', $id);
        // Ejecuta la consulta
        $stmt->execute();
        // Retorna el resultado como un array asociativo
        return $stmt->get_result()->fetch_assoc();
    }

    // Método para eliminar un pedido por su ID
    public function eliminarPedido($id) {
        // Consulta para eliminar un pedido según su ID
        $sql = "DELETE FROM pedidos WHERE id = ?";
        // Prepara la consulta
        $stmt = $this->conexion->prepare($sql);
        // Vincula el ID al placeholder
        $stmt->bind_param('i', $id);
        // Ejecuta la consulta
        $stmt->execute();
        // Retorna el resultado como un array asociativo
        return $stmt->execute();
    }
}