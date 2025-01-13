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
$sql ="SELECT * FROM usuarios WHERE id = '$id'";
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
                        <tr class="enunciado">
                            <td>Usuario que alquila</td>
                            <td>Vehículo alquilado</td>
                            <td>Tipo de falla</td>
                            <td>Descripcion</td>
                            <td>fecha devolucion</td>
                            <td>Exceso de Velocidad</td>
                            <td>Sin cinturon</td>
                            <td>Mal estacionado</td>
                            <td>Circular en lugares no permitidos</td>
                        </tr>
                        <tr>
                        <?php
                        include 'conexion.php';
                        $sql ="SELECT * FROM devoluciones";
                        $result = mysqli_query($conexion,$sql);
                        while($tabla = mysqli_fetch_array($result)){
                            $sql ="SELECT * FROM usuarios WHERE id='" . $tabla['usuario'] . "'";
                            $result2 = mysqli_query($conexion,$sql);
                            $usuario = $result2->fetch_assoc();

                            $sql2 = "SELECT * FROM vehiculos WHERE id='".$tabla['vehiculo']."'";
                            $result3 = mysqli_query($conexion,$sql2);
                            $vehiculo = $result3->fetch_assoc();
                        ?>    
                        <tr>
                            
                            <td class="caja_usuarios"><?php
                                if (isset($usuario['nombre'])) {
                                    echo $usuario['nombre'];
                                    
                                } else {
                                    echo "Usuario no encontrado";
                                    
                                }
                            
                             ?></td>
                            <td class="caja_usuarios"><?php 
                                                            if (isset($vehiculo ['marca']) && isset($vehiculo ['modelo'])) {
                                                                echo $vehiculo['marca'] . " " . $vehiculo['modelo'];
                                                            } else {
                                                                echo "vehiculo no encontrado";
                                                            }
                            ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['estado'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['descripcion_falla'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['fecha'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['excesoVelocidad'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['cinturonSeguridad'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['estacionamiento'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['lugaresNoPermitidos'] ?></td>
                            <td><a href="./multas.php?id=<?php echo $tabla ['id'] ?>" class="btn_sql" id="btn_eliminar">Factura</a></td>
                            <td><a href="./funciones/eliminar_registro.php?id=<?php echo $tabla ['id'] ?>" class="btn_sql" id="btn_eliminar">Eliminar</a></td>
                        </tr>
                        <?php
                        }
                        ?>       
                        </tr>
                    </table>
                
            </div>
        </section>
        <section>
        <a href="./administrador.php" class="btn_sql_tabla" id="btn_vehiculos">Volver</a>
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