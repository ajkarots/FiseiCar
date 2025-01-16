<?php
include 'conexion.php';
$id = $_POST['id'];
$nombre = $_POST['nombre_editar'];
$clave = $_POST['clave_editar'];
$correo = $_POST['correo_editar'];
$rol =$_POST['rol_editar'];
$query = "UPDATE usuarios SET nombre ='$nombre',clave='$clave',correo='$correo', rol='$rol' WHERE id='$id'";

if ($conexion->query($query) === TRUE) {
    echo "Usuario Actualizado";
} else {
    echo "Error updating record: " . $mysqli->error;
}
header("location: ../usuarios.php");
?>
