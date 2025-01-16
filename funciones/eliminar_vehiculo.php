<?php
include 'conexion.php';
$id = $_GET['id'];
$query = "DELETE FROM vehiculos WHERE id='$id'";
try{
    if ($conexion->query($query) === TRUE) {
        echo '<script type="text/javascript">
        alert("vehiculo Eliminado");
        window.location.href="../vehiculos.php";
        </script>';}
        else if ($conexion->query($query) === false) {
            echo '<script type="text/javascript">
            alert("no se ha podido eliminar");
            window.location.href="../vehiculos.php";
            </script>';}

}catch(Exception $e){

header("location: ../vehiculos.php");

}

?>
