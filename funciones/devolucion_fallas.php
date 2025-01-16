<?php
include 'conexion.php';

date_default_timezone_set('America/Guayaquil');
$fechaActual = date("Y-m-d");

$usuario_falla = $_POST['usuario_falla'];
$id = $_POST['id'];
$estado = $_POST['estado'];
$descripcion_falla = $_POST['descripcion_falla'];
$excesoVelocidad = intval($_POST['excesoVelocidad']);
$estacionamientoProhibido =intval($_POST['estacionamientoProhibido']);
$cinturon =intval($_POST['cinturon']);
$lugaresNoPermitidos =intval($_POST['lugaresNoPermitidos']);
$multas=$excesoVelocidad+$estacionamientoProhibido+$cinturon+$lugaresNoPermitidos;


$query = "UPDATE vehiculos SET reservado ='0' WHERE id ='$id'";

$query2 = "INSERT INTO devoluciones (usuario, vehiculo, estado, descripcion_falla, fecha, excesoVelocidad, cinturonSeguridad, estacionamiento, lugaresNoPermitidos)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Ejemplo en PHP usando PDO para prevenir inyección SQL
$stmt = $conexion->prepare($query2);
$stmt->bind_param("sssssssss",$usuario_falla, $id , $estado, $descripcion_falla, $fechaActual, $excesoVelocidad, $cinturon, $estacionamientoProhibido, $lugaresNoPermitidos);



if($stmt->execute()===true && $conexion->query($query) === TRUE){
    echo '
    <script>
    alert("Vehiculo disponible  ");
    window.location = "../devolver.php";
    </script>
'; 
}else{
    echo "Error updating record: " . $mysqli->error;
}
header("location: ../vehiculos.php");
exit();
?>
