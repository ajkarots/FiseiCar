<?php
// Configuración de la base de datos
$host = "localhost";       // Dirección del servidor
$usuario = "root";   // Nombre de usuario
$contraseña = "";  // Contraseña del usuario
$base_de_datos = "fisei_car";  // Nombre de la base de datos

// Crear la conexión
$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    
    die("Error de conexión: " . $conexion->connect_error);
}



?>