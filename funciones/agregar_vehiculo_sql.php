<?php
include 'conexion.php';
$marca = $_POST['box_marcas'];
$modelo = $_POST['box_modelos'];
$tipo = $_POST['tipo_vehiculo'];
$descripcion = $_POST['descripcion_editar'];
$img = $_POST['img_editar'];
$caballos = $_POST['caballos_editar'];
$precio = $_POST['precio_editar'];
$combustible = $_POST['combustible_editar'];
$asientos = $_POST['asientos_editar'];
$transmision = $_POST['transmision_editar'];

$query = "INSERT INTO vehiculos(marca, modelo, tipo, descripcion, imagen, caballos, precio, Combustible,Asientos,Transmision) 
VALUES ('$marca','$modelo','$tipo','$descripcion','./Imagenes/$img','$caballos','$precio','$combustible','$asientos','$transmision')";

if ($conexion->query($query) === TRUE) {
    echo "Vehiculo agregado";
} else {
    echo "Error updating record: " . $mysqli->error;
}
header("location: /Proyecto%20autos/vehiculos.php");
?>
