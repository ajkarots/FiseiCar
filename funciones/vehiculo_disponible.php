<?php
include 'conexion.php';
$id = $_GET['id'];
$query = "UPDATE vehiculos SET reservado ='0' WHERE id ='$id'";
if ($conexion->query($query) === TRUE) {
    echo '
    <script>
    alert("Vehiculo ahora disponible");
    window.location = "../vehiculos.php";
    </script>
';
} else {
    echo "Error updating record: " . $mysqli->error;
}
header("location: ../vehiculos.php");
?>
