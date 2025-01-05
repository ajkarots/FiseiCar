<?php 
include 'conexion.php';
session_start();
if(!isset($_SESSION['usuario'])){
    echo'
    <script>
    alert("Debes iniciar sesion par alquilar");
    window.location = "/Proyecto autos/home.php";
    </script>';
    header("location: ./login.php");
    session_destroy();
    die();
}
$id=$_SESSION['usuario'];
$sql ="SELECT * FROM `usuarios` WHERE `id` = '$id'";
                $result = mysqli_query($conexion,$sql);
                $usuario = $result->fetch_assoc();
                mysqli_close($conexion);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="./CCS/estilos.css">
    <link rel="stylesheet" href="./CCS//normalice.css">
</head>
<header class="hero2">
    <nav class="nav container">
        <div class="nav_logo">
            <h3 class="nav_title">Fisei Car</h3>
        </div>
        
    </nav>
</header>


<body>
    <main>
        <section class="administracion">

            <div class="contenedor_administracion">
                    <table class="retorno_mysql" >
                        <tr>
                            <td>Usuario que alquila</td>
                            <td>Vehículo alquilado</td>
                            <td>Tipo de falla</td>
                            <td>Descripcion</td>
                            <td>fecha</td>
                        </tr>
                        <tr>
                        <?php
                        include 'conexion.php';
                        $sql ="SELECT * FROM `devoluciones`";
                        $result = mysqli_query($conexion,$sql);
                        while($tabla = mysqli_fetch_array($result)){
                            $sql ="SELECT nombre FROM usuarios WHERE id='$tabla[usuario]'";
                            $result2 = mysqli_query($conexion,$sql);
                            $usuario = $result2->fetch_assoc();

                            $sql2 ="SELECT modelo,marca FROM vehiculos WHERE id='$tabla[vehiculo]'";
                            $result3 = mysqli_query($conexion,$sql2);
                            $usuario2 = $result3->fetch_assoc();
                        ?>    
                        <tr>
                            
                            <td class="caja_usuarios"><?php echo $usuario['nombre'] ?></td>
                            <td class="caja_usuarios"><?php echo $usuario2 ['marca'] ?></td>
                            <td class="caja_usuarios"><?php echo $usuario2 ['modelo'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['estado'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['descripcion_falla'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['fecha'] ?></td>
                            <td><a href="./funciones/eliminar_registro.php?id=<?php echo $tabla ['id'] ?>" class="btn_sql" id="btn_eliminar">Eliminar</a></td>
                        </tr>
                        <?php
                        }
                        ?>       
                        </tr>
                    </table>
                <a href="./administrador.php" class="btn_sql" id="btn_vehiculos">Volver</a>
            </div>
        </section>
        <section class="knowledge">
            <div class="knowledge_container container">
                <div class="knowledge_text">
                    <h2>Siugenos en nuestras redes sociales</h2>
                    <p class="knowledge_paragraph">Contactanos y envianos tus sugerencias mendiante
                        los canales disponibles
                    </p>
                        <a href="./contacto.html" class="cta">Contacto</a>
                </div>
                <figure class="knowledge_picture">
                    <img src="./Imagenes/bmw.png" class="knowledge_img">
                </figure>
            </div>
        </section>  
    </main>
    <script src="./JavaScript/scriptAdministracion.js"></script>
</body>


</html>