<?php
include 'conexion.php';
date_default_timezone_set('America/Guayaquil');
$fechaActual = date("d-m-Y");
$usuario_falla = $_POST['usuario_falla'];
$id = $_POST['id'];
$estado = $_POST['estado'];
$descripion_falla = $_POST['descripcion_falla'];
$query2= "INSERT INTO devoluciones (vehiculo, usuario, estado, descripcion_falla, fecha) VALUES ('$id','$usuario_falla','$estado','$descripion_falla','$fechaActual')";

if($conexion->query($query2)===true){
    echo '
    <script>
    alert("Vehiculo disponible");
    window.location = "./Proyecto%20autos/devolver.php";
    </script>
'; 
}else{
    echo "Error updating record: " . $mysqli->error;
}
header("location: /Proyecto%20autos/vehiculos.php");
?>
