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
        <section class="Facturacion">

            <div class="contenedor_facturacion">

                
                <?php

                $id_alquiler = $_GET['id'];
                
                include 'conexion.php';
                $sql = "SELECT * FROM devoluciones where id='$id_alquiler' ;";
                    $result = mysqli_query($conexion, $sql);
                    $tabla = $result->fetch_assoc();

                $id_usuario = $tabla['usuario']; 
                $id_vehiculo= $tabla['vehiculo'];  
                $total = 0;
                $total= $tabla['excesoVelocidad']+$tabla['estacionamiento']+$tabla['cinturonSeguridad']+$tabla['lugaresNoPermitidos'];
                $sql3 = "SELECT * FROM usuarios WHERE id='$id_usuario'";
                $result2 = mysqli_query($conexion, $sql3);
                $usuario = $result2->fetch_assoc();
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
                <P class="info_usuario"><?php if (isset($usuario['telefono'] ) && $usuario['telefono']!=0) {
                                                // Safe to access the key
                                                echo '0'+$usuario['telefono'];
                                            } else {
                                                // Handle the case where the key does not exist
                                                echo 'No registrado';
                                            } ?></P>
                <br>
                <h3>Edad</h3>
                <P class="info_usuario"><?php if (isset($usuario['edad']) && $usuario['edad']!=0) {
                                            // Safe to access the key
                                            echo $usuario['edad'];
                                        } else {
                                            // Handle the case where the key does not exist
                                            echo 'no registrado';
                                        } ?></P>
                <br>
                <h3>Provincia de residencia</h3>
                <P class="info_usuario"><?php if (isset($usuario['provincia']) && $usuario['provincia']!='') {
                                            // Safe to access the key
                                            echo $usuario['provincia'];
                                        } else {
                                            // Handle the case where the key does not exist
                                            echo 'no registrado';
                                        } ?></P>
                <br>
                <h3>Ciudad</h3>
                <P class="info_usuario"><?php if (isset($usuario['ciudad'])&& $usuario['ciudad']!=0) {
                                            // Safe to access the key
                                            echo $usuario['ciudad'];
                                        } else {
                                            // Handle the case where the key does not exist
                                            echo 'no registrado';
                                        } ?></P>
                <h3>Exceso de velocidad</h3>
                <P class="info_usuario"><?php if (isset($tabla['excesoVelocidad']) && $tabla['excesoVelocidad']!=0) {
                                            // Safe to access the key
                                            echo $tabla['excesoVelocidad'];
                                        } else {
                                            // Handle the case where the key does not exist
                                            echo 'no registrado';
                                        } ?></P>
                <h3>Sin cinturon</h3>
                <P class="info_usuario"><?php if (isset($tabla['cinturonSeguridad']) && $tabla['cinturonSeguridad']!=0) {
                                            // Safe to access the key
                                            echo $tabla['cinturonSeguridad'];
                                        } else {
                                            // Handle the case where the key does not exist
                                            echo 'no registrado';
                                        } ?></P>
                                        <h3>Mal estacionado</h3>
                <P class="info_usuario"><?php if (isset($tabla['estacionamiento']) && $tabla['estacionamiento']!=0) {
                                            // Safe to access the key
                                            echo $tabla['estacionamiento'];
                                        } else {
                                            // Handle the case where the key does not exist
                                            echo 'no registrado';
                                        } ?></P>
                                        <h3>Circula en lugares no permitidos</h3>
                <P class="info_usuario"><?php if (isset($tabla['lugaresNoPermitidos']) && $tabla['lugaresNoPermitidos']!=0) {
                                            // Safe to access the key
                                            echo $tabla['lugaresNoPermitidos'];
                                        } else {
                                            // Handle the case where the key does not exist
                                            echo 'no registrado';
                                        } ?></P>                        
                <br><br><br><br>
                </section>
                <table class="tabla_facturacion">

                    <td>Usuario</td>
                    <td>Vehículo alquilado</td>
                    <td>Fecha de devolucion</td>
                    <td>Total</td>

                    <?php
                    

                    $sql2 = "SELECT * FROM vehiculos WHERE id='$id_vehiculo'";
                    $result3 = mysqli_query($conexion, $sql2);
                    $usuario2 = $result3->fetch_assoc();

                    ?>
                    <tr>

                        <td class="caja_usuarios"><?php echo $usuario['nombre'] ?></td>
                        <td class="caja_usuarios"><?php echo $usuario2['marca'] ?> <?php echo $usuario2['modelo'] ?></td>
                        <td class="caja_usuarios"><?php echo $tabla['fecha'] ?></td>
                        <td class="caja_usuarios"><?php echo $total?></td>
                    </tr>

                    <?php
                    

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
        <section><a href="./fallas.php" class="btn_sql_tabla" id="btn_vehiculos">Volver</a></section>
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