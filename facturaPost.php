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
        <section class="Facturacion" id="Facturacion">

            <div class="contenedor_facturacion" id="contenedor_facturacion">

                
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
                $id_usuario=$_SESSION['usuario'];
                $sql ="SELECT * FROM `usuarios` WHERE `id` = '$id_usuario'";
                                $result = mysqli_query($conexion,$sql);
                                $usuario = $result->fetch_assoc();
                                
                $id_vehiculo = $_GET['id'];
                

                ?>
                <section>
                <h1>Facturación</h1>
                <br>
                <h3>Nombre</h3>
                <P class="info_usuario"><?php if (isset($usuario['nombre'])) {
                                            // Safe to access the key
                                            echo $usuario['nombre'];
                                        } else {
                                            // Handle the case where the key does not exist
                                            echo 'registro';
                                        }
                                        ?></P>
                <br>
                <h3>Correo</h3>
                <P class="info_usuario"><?php if (isset($usuario['correo'])) {
                                            // Safe to access the key
                                            echo $usuario['correo'];
                                        } else {
                                            // Handle the case where the key does not exist
                                            echo 'Sin correo';
                                        }
                                        ?></P>
                <br>
                <h3>Tefelono</h3>
                <P class="info_usuario">0<?php if (isset($usuario['telefono'])) {
                                                // Safe to access the key
                                                echo $usuario['telefono'];
                                            } else {
                                                // Handle the case where the key does not exist
                                                echo '000000000';
                                            } ?></P>
                <br>
                <h3>Edad</h3>
                <P class="info_usuario"><?php if (isset($usuario['edad'])) {
                                            // Safe to access the key
                                            echo $usuario['edad'];
                                        } else {
                                            // Handle the case where the key does not exist
                                            echo 'no registrado';
                                        } ?></P>
                <br>
                <h3>Provincia de residencia</h3>
                <P class="info_usuario"><?php if (isset($usuario['provincia'])) {
                                            // Safe to access the key
                                            echo $usuario['provincia'];
                                        } else {
                                            // Handle the case where the key does not exist
                                            echo 'no registrado';
                                        } ?></P>
                <br>
                <h3>Ciudad</h3>
                <P class="info_usuario"><?php if (isset($usuario['ciudad'])) {
                                            // Safe to access the key
                                            echo $usuario['ciudad'];
                                        } else {
                                            // Handle the case where the key does not exist
                                            echo 'no registrado';
                                        } ?></P>
                <br><br><br><br>
                </section>
                <table class="tabla_facturacion" id="tabla_facturacion">

                    <td>Usuario</td>
                    <td>Vehículo alquilado</td>
                    <td>Fecha Inicio</td>
                    <td>Fecha Fin</td>
                    <td>Días alquilados</td>
                    <td>Precio/Día</td>
                    <td>Total</td>

                    <?php
                    $total = 0;
                    $sql5 = "SELECT * FROM alquileres where usuario_alquiler='$id_usuario' and vehiculo_alquilado='$id_vehiculo' ORDER BY inicio DESC LIMIT 1;";
                    $result5 = mysqli_query($conexion, $sql5);
                    $tabla = $result5->fetch_assoc();

                    $sql2 = "SELECT * FROM vehiculos WHERE id='$id_vehiculo'";
                    $result3 = mysqli_query($conexion, $sql2);
                    $usuario2 = $result3->fetch_assoc();

                    ?>
                    <tr>

                        <td class="caja_usuarios"><?php echo $usuario['nombre'] ?></td>
                        <td class="caja_usuarios"><?php echo $usuario2['marca'] ?> <?php echo $usuario2['modelo'] ?></td>
                        <td class="caja_usuarios"><?php echo $tabla['inicio'] ?></td>
                        <td class="caja_usuarios"><?php echo $tabla['fin'] ?></td>
                        <td class="caja_usuarios"><?php echo $tabla['dias'] ?></td>
                        <td class="caja_usuarios"><?php echo $tabla['precio'] ?></td>
                        <td class="caja_usuarios"><?php echo $tabla['venta'] ?></td>
                    </tr>

                    <?php
                    $total = $total + $tabla['venta'];

                    ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total:</td>
                    <td class="caja_usuarios"><?php echo $total ?> USD</td>
                    </tr>

                </table>

            </div>
        </section>
        <section><a href="./historial_usuario.php" class="btn_sql_tabla" id="btn_volver_factura">Volver</a></section>
        <button class="btn_sql_tabla" id="printPDF" onClick="window.print();">Imprimir</button>
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