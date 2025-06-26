<?php

header("Content-Type: application/json");

require_once __DIR__ . '/config/auth.php';

require_once __DIR__ . '/controllers/pedidoController.php';

// Obtiene la clave
$headers = getallheaders();
$apiKey = $headers['X-API-Key'] ?? null;

// obtiene la ruta
$method = $_SERVER['REQUEST_METHOD'];
$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

$controller = new PedidoController();

// Esto hace que todas las peticiones requieran una cabecera HTTP con la clave
if ($apiKey !== API_KEY) {
    http_response_code(401);
    echo json_encode(['error' => 'No autorizado: clave API inválida']);
    exit;
} else {
    echo json_encode(['resultado' => 'Acceso Concedido']);
}

// Ruta de ejecucion: 'http://localhost/comp-paralela-distribuida/Caso1_CPD_HugoLainez/index.php/api/pedidos'

/** Esto limpia la url
 * Elimina carpetas principales de la ruta, especificamente donde se almacena todo el proyecto.
 * NOTA: debe ser remplazada por la ruta actual donde se almacena. 
 * Ruta donde se desarrollo: '/comp-paralela-distribuida/Caso1_CPD_HugoLainez/'
 * Archivo principal: 'index.php'
*/

while(!empty($uri) && $uri[0] !== 'api') {
    array_shift($uri); // elimina cualquier carpeta o archivo antes de 'api/pedidos'
}

// verifica que la ruta sea correcta para usar los endpoints
// 'index.php/api/pedidos'
if (isset($uri[0], $uri[1]) && $uri[0] === 'api' && $uri[1] === 'pedidos') {
    $id = $uri[2] ?? null;

    switch ($method) {
        case 'GET':
            $id ? $controller->getIdPedido($id) : $controller->getAllPedidos();
            break;
        case 'POST':
            $controller->addNewPedido();
            break;
        case 'PUT':
            if ($id) $controller->updatePedido($id);
            break;
        case 'DELETE':
            if ($id) $controller->deletePedido($id);
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Método no permitido']);
    }
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Ruta no encontrada']);
}