<?php 
include 'conexion.php';
session_start();
if(!isset($_SESSION['usuario'])){
    echo'
    <script>
    alert("Debes iniciar sesion par alquilar");
    window.location = "login.php";
    </script>';
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

            <div class="contenedor_administracion" id="contenedor_administracion">
                    <table class="retorno_mysql" >
                        <tr>
                            <td>Usuario</td>
                            <td>Vehículo alquilado</td>
                            <td>Fecha Inicio</td>
                            <td>Fecha Fin</td>
                            <td>Días alquilados</td>
                            <td>Precio/Día</td>
                            <td>Total</td>
                        </tr>
                        <tr>
                        <?php
                        include 'conexion.php';
                        $total=0;
                        $sql ="SELECT * FROM `alquileres`where usuario_alquiler='$id'";
                        $result = mysqli_query($conexion,$sql);
                        while($tabla = mysqli_fetch_array($result)){
                            $sql ="SELECT nombre FROM usuarios WHERE id='$tabla[usuario_alquiler]'";
                            $result2 = mysqli_query($conexion,$sql);
                            $usuario = $result2->fetch_assoc();

                            $sql2 ="SELECT marca FROM vehiculos WHERE id='$tabla[vehiculo_alquilado]'";
                            $result3 = mysqli_query($conexion,$sql2);
                            $usuario2 = $result3->fetch_assoc();
                        ?>    
                        <tr>
                            
                            <td class="caja_usuarios"><?php echo $usuario['nombre'] ?></td>
                            <td class="caja_usuarios"><?php echo $usuario2 ['marca'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['inicio'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['fin'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['dias'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['precio'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['venta'] ?></td>  
                        </tr>
                        
                        <?php
                        $total = $total+$tabla ['venta'] ;
                        }
                        ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total:</td> 
                        <td class="caja_usuarios"><?php echo$total?> USD</td>      
                        </tr>

                    </table>
                    <button class="btn_sql_tabla" id="printPDF" onClick="window.print();">Imprimir</button>
                <a href="usuario.php" class="btn_sql" id="btn_volver_factura">Volver</a>
            </div>
        </section>
        <section class="knowledge" id="knowledge">
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