<?php
// config/conexion.php

// Define la constante de la dirección del host de la base de datos
define('DB_HOST', 'localhost');
// Define la constante para el usuario de la base de datos
define('DB_USER', 'root');
// Define la constante para la contraseña del usuario de la base de datos
define('DB_PASS', '');
// Define la constante para el nombre de la base de datos
define('DB_NAME', 'gestion_pedidos');

// Función para conectarse a la base de datos
function conectarDB() {
    // Crea una conexión usando las constantes definidas
    $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Verifica si la conexión tiene un error
    if ($conexion->connect_error) {
        // Muestra el mensaje de error y detiene la ejecución
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Retorna la conexión establecida
    return $conexion;
}
