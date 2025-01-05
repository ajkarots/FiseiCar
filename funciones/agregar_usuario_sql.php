<?php
include 'conexion.php';
$nombre = $_POST['nombre_editar'];
$clave = $_POST['clave_editar'];
$correo = $_POST['correo_editar'];
$rol =$_POST['rol_editar'];
$query = "INSERT INTO usuarios(nombre,clave,correo,rol) VALUES ('$nombre','$clave','$correo','$rol')";

if ($conexion->query($query) === TRUE) {
    echo "Usuario creado";
} else {
    echo "Error updating record: " . $mysqli->error;
}
header("location: /Proyecto%20autos/usuarios.php");
?>
