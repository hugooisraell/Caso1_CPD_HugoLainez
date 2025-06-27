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
        $datos = $this->pedidoModel->obtenerPedidos(); // almacena los datos

        // valida la informacion obtenida
        if($datos) {
            echo json_encode($datos);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'No hay pedidos existentes']);
        }
    }

    // Obtiene un pedido por su id y lo devuelve en JSON
    public function getIdPedido($id) {
        // valida si el valor es numérico
        if (!is_numeric($id)) {
            http_response_code(400);
            echo json_encode(['error' => 'ID no válido, debe ser un número']);
            return;
        }
        
        $dato = $this->pedidoModel->obtenerPedidoPorId($id); // almacena los datos

        // valida la informacion obtenida
        if($dato) {
            echo json_encode($dato);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Pedido no encontrado']);
        }
    }

    // Agrega un nuevo pedido
    public function addNewPedido() {
        // obtiene los datos del nuevo pedido
        $input = json_decode(file_get_contents("php://input"), true);

        // valida los datos
        if (!$input) {
            http_response_code(400);
            echo json_encode(['error' => 'Datos JSON invalidos']);
            return;
        }

        // almacenan los datos obtenidos
        $cliente = $input['cliente'] ?? null;
        $producto = $input['producto'] ?? null;
        $cantidad = $input['cantidad'] ?? null;
        $estado = $input['estado'] ?? 'pendiente';

        // Verificar si algún campo obligatorio está vacío
        if (!$cliente || !$producto || !$cantidad) {
            http_response_code(400);
            echo json_encode(['error' => 'Faltan campos obligatorios: cliente, producto o cantidad']);
            return;
        }

        // valida si el valor es numérico
        if (!is_numeric($cantidad)) {
            http_response_code(400);
            echo json_encode(['error' => 'Cantidad debe ser un número']);
            return;
        }

        // almacena el resultado de la operacion
        $ok = $this->pedidoModel->agregarPedido($cliente, $producto, $cantidad, $estado);
        // valida el resultado
        if($ok) {
            echo json_encode(['resultado' => 'Pedido creado']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Error al agregar']);
        }
    }

    // Actualiza los datos de un pedido
    public function updatePedido($id) {
        // obtiene los datos actualizados del pedido
        $input = json_decode(file_get_contents("php://input"), true);
        // valida la informacion
        if (!$input) {
            http_response_code(400);
            echo json_encode(['error' => 'Datos JSON invalidos']);
            return;
        }

        // valida si el valor es numérico
        if (!is_numeric($id)) {
            http_response_code(400);
            echo json_encode(['error' => 'ID no válido, debe ser un número']);
            return;
        }

        // almacena los datos del pedido que se va a modificar
        $dato = $this->pedidoModel->obtenerPedidoPorId($id);
        // valida la informacion obtenida
        if(!$dato) {
            http_response_code(404);
            echo json_encode(['error' => 'Pedido no encontrado']);
            return;
        }

        // almacena los datos actualizados
        $cliente = $input['cliente'] ?? null;
        $producto = $input['producto'] ?? null;
        $cantidad = $input['cantidad'] ?? null;
        $estado = $input['estado'] ?? 'pendiente';

        // Verificar si algún campo obligatorio está vacío
        if (!$cliente || !$producto || !$cantidad) {
            http_response_code(400);
            echo json_encode(['error' => 'Faltan campos obligatorios: cliente, producto o cantidad']);
            return;
        }

        // valida si el valor es numérico
        if (!is_numeric($cantidad)) {
            http_response_code(400);
            echo json_encode(['error' => 'Cantidad debe ser un número']);
            return;
        }

        // almacena el resultado de la operacion
        $ok = $this->pedidoModel->actualizarPedido($id, $cliente, $producto, $cantidad, $estado);
        // valida el resultado
        if($ok) {
            // almacena el pedido actualizado
            $datoActualizado = $this->pedidoModel->obtenerPedidoPorId($id);
            echo json_encode([
                // muetra el pedido antes de actualizar
                'pedido' => $dato,
                'resultado' => 'Pedido actualizado',
                // muestra el pedido actualizado
                'pedido_actualizado' => $datoActualizado
        ]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Error al actualizar']);
        }
    }

    // Elimina un pedido por su ID
    public function deletePedido($id) {
        // valida si el valor es numérico
        if (!is_numeric($id)) {
            http_response_code(400);
            echo json_encode(['error' => 'ID no válido, debe ser un número']);
            return;
        }

        // almacena los datos del pedido que se va a eliminar
        $dato = $this->pedidoModel->obtenerPedidoPorId($id);
        // valida la informacion obtenida
        if(!$dato) {
            http_response_code(404);
            echo json_encode(['error' => 'Pedido no encontrado']);
            return;
        }

        // almacena el resultado de la operacion
        $ok = $this->pedidoModel->eliminarPedido($id);
        // valida el resultado
        if($ok) {
            echo json_encode([
                'resultado' => 'Pedido eliminado',
                // muestra el pedido eliminado
                'pedido_eliminado' => $dato
            ]);
        } else {
            http_response_code(500);
            echo json_encode(['error' =>  'Error al eliminar']);
        }
    }
}