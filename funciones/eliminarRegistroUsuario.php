<?php
include 'conexion.php';
$id = $_GET['id'];
$query = "DELETE FROM usuarios WHERE id='$id'";
if ($conexion->query($query) === TRUE) {
    session_destroy();
    echo '<script type="text/javascript">
    alert("Usuario Eliminado");
    window.location.href="../login.php";
    </script>';
} else {
    echo "Error updating record: " . $mysqli->error;
}
header("location: ../login.php");
exit();
?>
