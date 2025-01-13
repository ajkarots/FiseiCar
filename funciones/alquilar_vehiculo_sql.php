<?php
session_start();
include 'conexion.php';
$id = $_POST['id'];
$tiempo =$_POST['tiempo'];
$id_usuario= $_SESSION['usuario'];
$precio =intval($_POST['precio_auto']);
 
// Separar las fechas
$dates = explode(' - ', $tiempo);
$inicio = $dates[0];
$fin = $dates[1];

// Convertir las fechas a objetos DateTime
$fechaInicial = DateTime::createFromFormat('m/d/Y', $inicio);
$fechaFinal = DateTime::createFromFormat('m/d/Y', $fin);
$inicialFormateada = $fechaInicial->format('Y-m-d');
$finalFormateada = $fechaFinal->format('Y-m-d');
// Calcular la diferencia en días
$interval = $fechaInicial->diff($fechaFinal);
$dias = $interval->days;


if($dias!=0){
    $total= $precio * $dias; 
}else{
    $dias=1;
    $total= $precio * $dias;    
}


$query = "UPDATE vehiculos SET reservado ='1' WHERE id ='$id'";

$query2 = "INSERT INTO alquileres (vehiculo_alquilado, usuario_alquiler, inicio, fin, dias, precio, venta)
VALUES (?, ?, ?, ?, ?, ?, ?)";

// Preparar la sentencia
$stmt = $conexion->prepare($query2);

// Asociar los parámetros y tipos (asumiendo que $id y $id_usuario son enteros)
$stmt->bind_param("iissddd", $id, $id_usuario, $inicialFormateada, $finalFormateada, $dias, $precio, $total);

// Ejecutar la sentencia
if ($stmt->execute()) {
    $conexion->query($query);
} else {
    $queryn = "UPDATE vehiculos SET reservado ='0' WHERE id ='$id'";
    $conexion->query($queryn);
echo "Error al registrar el alquiler: " . $conexion->error;
}

// Cerrar la sentencia
$stmt->close();

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="titulo">Administrador</title>
    <link rel="stylesheet" href="../CCS/estilos.css">
    <link rel="stylesheet" href="../CCS//normalice.css">
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

            <div class="contenedor_administracion" >
                    <table class="retorno_mysql" >
                        
                            <td>Usuario</td>
                            <td>Vehículo alquilado</td>
                            <td>Fecha Inicio</td>
                            <td>Fecha Fin</td>
                            <td>Días alquilados</td>
                            <td>Precio/Día</td>
                            <td>Total</td>
                        
                        
                        <?php
                        include 'conexion.php';
                        $sql3 ="SELECT * FROM usuarios WHERE id='$id_usuario'";
                        $result2 = mysqli_query($conexion,$sql3);
                        $usuario = $result2->fetch_assoc();
                        ?>
                                            <h1>Facturación</h1>
                    <h3>Correo</h3>
                    <P class="info_usuario"><?php echo $usuario['correo']?></P>
                    <h3>Tefelono</h3>
                    <P class="info_usuario">0<?php echo $usuario['telefono']?></P>
                    <h3>Edad</h3>
                    <P class="info_usuario"><?php echo $usuario['edad']?></P>
                    <h3>Provincia de residencia</h3>
                    <P class="info_usuario"><?php echo $usuario['provincia']?></P>
                    <h3>Ciudad</h3>
                    <P class="info_usuario"><?php echo $usuario['ciudad']?></P>
                    <br><br><br><br>
                        <?php
                        $total=0;
                        $sql ="SELECT * FROM alquileres where usuario_alquiler='$id_usuario' ORDER BY id DESC LIMIT 1;";
                        $result = mysqli_query($conexion,$sql);
                        $tabla=$result->fetch_assoc();

                            $sql2 ="SELECT * FROM vehiculos WHERE id='$id'" ;
                            $result3 = mysqli_query($conexion,$sql2);
                            $vehiculo = $result3->fetch_assoc();
                        ?>    
                        <tr>
                            
                            <td class="caja_usuarios"><?php echo $usuario['nombre'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['marca'] ?> <?php echo $vehiculo ['modelo'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['inicio'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['fin'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['dias'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['precio'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['venta'] ?></td>  
                        </tr>
                        
                        <?php
                        $total = $total+$tabla ['venta'] ;
                        
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

            </div>
        </section>
        <section>
        <button class="btn_sql_tabla" id="printPDF" onClick="window.print();">Imprimir</button>
        <a href="../catalogo.php" class="btn_sql_tabla" id="btn_volver_factura">Volver</a></section>
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
