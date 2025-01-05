<?php
session_start();
include 'conexion.php';
$id = $_POST['id'];
$tiempo =intval($_POST['tiempo']);
$id_usuario= $_SESSION['usuario'];
$precio =intval($_POST['precio_auto']);
$total= $precio * $tiempo;
$query = "UPDATE vehiculos SET reservado ='1' WHERE id ='$id'";
$query2 = "INSERT INTO alquileres(vehiculo_alquilado,usuario_alquiler,dias,precio,venta) VALUES ('$id','$id_usuario','$tiempo','$precio','$total')";

if ($conexion->query($query) == TRUE and $conexion->query($query2) == TRUE) {
    echo "Vehiculo Actualizado";
} else {
    echo "Error updating record: " . $mysqli->error;
    $queryn = "UPDATE vehiculos SET reservado ='0' WHERE id ='$id'";
    $conexion->query($queryn);
}
header("location: /Proyecto%20autos/catalogo.php");
?>
