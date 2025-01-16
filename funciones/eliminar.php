<?php
include 'conexion.php';
$id = $_GET['id'];
$query = "DELETE FROM usuarios WHERE id='$id'";
if ($conexion->query($query) === TRUE) {
    echo '<script type="text/javascript">
    alert("Usuario Eliminado");
    window.location.href="../usuarios.php";
    </script>';
} else {
    echo "Error updating record: " . $mysqli->error;
}
header("location: ../usuarios.php");
?>
