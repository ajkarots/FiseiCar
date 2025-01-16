<?php
include 'conexion.php';
$id = $_POST['id'];
$nombre = $_POST['nombre_editar'];
$clave = $_POST['clave_editar'];
$correo = $_POST['correo_editar'];
$telefono = $_POST['telefono_usuario'];
$edad = $_POST['edad_usuario'];
$provincia = $_POST['boxProvincias'];
$ciudad = $_POST['boxCiudades'];
$img = $_POST['img_editar'];

$query = "UPDATE usuarios SET nombre ='$nombre',clave='$clave',correo='$correo',foto='./Imagenes/$img',telefono='$telefono',edad='$edad',ciudad='$ciudad',
provincia='$provincia' WHERE id='$id'";

if ($conexion->query($query) === TRUE) {

} else {
    echo "Error updating record: " . $mysqli->error;
}
echo'
<script>
alert("Usuario actualizado");
window.location = "../editar_perfil.php";
</script>
';  
hecho '
<script>
window.location = "../home.php";
</script>
'; 
exit();
?>
