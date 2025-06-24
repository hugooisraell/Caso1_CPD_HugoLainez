<?php

// Funciones de la API

// Incluye los archivos de conexion y del modelo
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../models/Pedido.php';

class PedidoController {

    private $pedidoModel;

    // Instanciar modelo de Pedido
    public function __construct() {
        $this->pedidoModel = new Pedido();
    }

    // Obtiene los datos de la tabla y los devuelve en JSON
    public function getAllPedidos() {
        $datos = $this->pedidoModel->obtenerPedidos();
        echo json_encode($datos);
    }

    // Obtiene un pedido por su id y lo devuelve en JSON
    public function getIdPedido($id) {
        $dato = $this->pedidoModel->obtenerPedidoPorId($id);

        if($dato) {
            echo json_encode($dato);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Pedido no encontrado']);
        }
    }

    public function addNewPedido() {
        $input = json_decode(file_get_contents("php://input"), true);
        if (!$input) {
            http_response_code(400);
            echo json_encode(['error' => 'Datos JSON invalidos']);
            return;
        }

        $cliente = $input['cliente'] ?? null;
        $producto = $input['producto'] ?? null;
        $cantidad = $input['cantidad'] ?? null;
        $estado = $input['estado'] ?? 'pendiente';

        $ok = $this->pedidoModel->agregarPedido($cliente, $producto, $cantidad, $estado);
        echo json_encode(['resultado' => $ok ? 'Pedido creado' : 'Error al agregar']);
    }

    public function updatePedido($id) {
        $input = json_decode(file_get_contents("php://input"), true);
        if (!$input) {
            http_response_code(400);
            echo json_encode(['error' => 'Datos JSON invalidos']);
            return;
        }

        $cliente = $input['cliente'] ?? null;
        $producto = $input['producto'] ?? null;
        $cantidad = $input['cantidad'] ?? null;
        $estado = $input['estado'] ?? 'pendiente';

        $ok = $this->pedidoModel->actualizarPedido($id, $cliente, $producto, $cantidad, $estado);
        echo json_encode(['resultado' => $ok ? 'Pedido actualizado' : 'Error al actualizar']);
    }

    // Elimina un pedido por su ID
    public function deletePedido($id) {
        $ok = $this->pedidoModel->eliminarPedido($id);
        echo json_encode(['resultado' => $ok ? 'Pedido eliminado' : 'Error al eliminar']);
    }
}