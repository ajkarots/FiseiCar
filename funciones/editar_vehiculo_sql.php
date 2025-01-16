<?php
include 'conexion.php';
$id = $_POST['id'];
$marca = $_POST['box_marcas'];
$modelo =$_POST['box_modelos'];
$tipo = $_POST['tipo_vehiculo'];
$descripcion = $_POST['descripcion_editar'];
$img = $_POST['img_editar'];
$caballos = $_POST['caballos_editar'];
$precio = $_POST['precio_editar'];
$combustible = $_POST['combustible_editar'];
$asientos = $_POST['asientos_editar'];
$transmision = $_POST['transmision_editar'];
$query = "UPDATE vehiculos 
SET marca ='$marca',modelo='$modelo',tipo='$tipo',descripcion='$descripcion',imagen='./Imagenes/$img',caballos='$caballos',precio='$precio',Combustible='$combustible',Asientos='$asientos',Transmision='$transmision'
WHERE id='$id'";

if ($conexion->query($query) === TRUE) {
    echo "Vehiculo Actualizado";
} else {
    echo "Error updating record: " . $mysqli->error;
}
header("location: ../vehiculos.php");
exit();
?>
