<?php

mysql://root:JPTzCuxsSMZGoFzSMafFaBhvQXTDIzde@viaduct.proxy.rlwy.net:24845/railway

// Configuración de la base de datos
$host = "viaduct.proxy.rlwy.net:24845";       // Dirección del servidor
$usuario = "root";   // Nombre de usuario
$contraseña = "JPTzCuxsSMZGoFzSMafFaBhvQXTDIzde";  // Contraseña del usuario
$base_de_datos = "fisei_car";  // Nombre de la base de datos

// Crear la conexión
$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    mysqli_close($conexion);
    die("Error de conexión: " . $conexion->connect_error);
}



?>