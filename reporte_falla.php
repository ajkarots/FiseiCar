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
$id_usuario=$_SESSION['usuario'];
$sql ="SELECT * FROM `usuarios` WHERE `id` = '$id_usuario'";
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
            <h3 class="nav_title">Editar vehiculo</h3>
        </div>
    </nav>
</header>


<body>
    <main class="main_editar_vehiculo">
                <?php
            include 'conexion.php';
            $id = $_GET['id'];
            $sql = "SELECT * FROM vehiculos WHERE `id` = '$id'";
            $result = mysqli_query($conexion, $sql);
            $vehiculo = $result->fetch_assoc();
            

            $sql2 = "SELECT * FROM alquileres WHERE vehiculo_alquilado = '$id' ORDER BY inicio DESC LIMIT 1";
            $result2 = mysqli_query($conexion, $sql2);
            $alquiler = $result2->fetch_assoc();

            $usuario_alquiler=$alquiler['usuario_alquiler'];
            mysqli_close($conexion);
            echo '<h2> ' . $vehiculo['marca'] . '</h2>';
            echo '<h2> ' . $vehiculo['modelo'] . '</h2>';
            ?>    
                        <div>   
            <table class="editar_vehiculo_mysql" >
                        <tr>
                            <td></td>
                            <td>Tipo</td>
                            <td>Caballos</td>
                            <td>Precio/dia</td>
                            <td>Combustible</td>
                            <td>Asientos</td>
                            <td>Transmision</td>
                        </tr>
                        
                        <tr>
                            <td ><img class="caja_usuarios" src="<?php echo $vehiculo ['imagen'] ?>" alt=""></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['tipo'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['caballos'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['precio'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['Combustible'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['Asientos'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['Transmision'] ?></td>
                        </tr>      
                        
                    </table>
                    </div> 
                    <div>
    <section class="editar">

            <form class="form_editar_vehiculo" action="./funciones/devolucion_fallas.php" method="POST" id="formulario_devolver_vehiculo">
                <br></br>
                <h2>Devolver</h2>
                
                <select class="btn_sql" name="usuario_falla" id="usuario_falla">
                    <?php
                    
                include 'conexion.php';
                $sql = "SELECT id,nombre FROM usuarios where id='$usuario_alquiler'";
                $result = $conexion->query($sql);
                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                    // Salida de cada fila
                    while($row = $result->fetch_assoc()) {
                        
                        $idusuario = $row['id'];
                        echo '<option value="'.$idusuario.'">'.$row['nombre'].'</option>';
                    }
                } else {
                    echo "No hay usuarios disponibles.";
                }

                // Cerrar conexión
                $conexion->close();
                ?>
                </select>
                <br><br>
                <h3>Multas</h3>
                <input type="checkbox" name="excesoVelocidad" id="excesoVelocidad" value="100">
                <label for="excesoVelocidad">Exceso de Velocidad</label>
                <br>
                <input type="checkbox" name="estacionamientoProhibido" id="estacionamientoProhibido" value="30">
                <label for="estacionamientoProhibido">Estacionamiento Prohibido</label>
                <br>
                <input type="checkbox" name="cinturon" id="cinturon" value="60">
                <label for="cinturon">Cinturon de seguridad</label>
                <br>
                <input type="checkbox" name="lugaresNoPermitidos" id="lugaresNoPermitidos" value="50">
                <label for="lugaresNoPermitidos">Circular en lugares no permitidos</label>
                <br>
                <br>
                <h3>Reporte</h3>
                <select class="btn_sql" name="estado" id="estado">
                    <option value="Observacion">Observacion</option>
                    <option value="Falla">Falla</option>
                    <option value="Ninguno">Ninguno</option>
                </select>
                <br><br>
                <h3>Descripcion del reporte</h3>
                <input class="cuadro_editar" type="text" placeholder="Reporte" id="descripcion_falla" name="descripcion_falla" >
                <input type="hidden" id="id" value="<?php echo $id; ?>" name="id">
                <br>
                <button type="submit" class="btn_sql" id="btn_guardar">Guardar</button>
                <a href="./vehiculos.php" class="btn_sql" id="btn_cancelar">Cancelar</a>
            </form>
            </div>
        </section>

    </main>
    <section class="knowledge">
            <div class="knowledge_container container">
                <div class="knowledge_text">
                    <h1>Pagina de administracion</h1>
                </div>
                <figure class="knowledge_picture">
                    <img src="./Imagenes/admin.png" class="knowledge_picture_admin">
                </figure>
            </div>
        </section>
    <script>
        document.getElementById('formulario_devolver_vehiculo').addEventListener('submit', function(event) {
            let campo1 = document.getElementById('descripcion_falla').value;

            if (campo1 === '' ) {
                event.preventDefault(); // Evita el envío del formulario
                alert('Por favor, completa todos los campos.');
            }
        });
    </script>
    
</body>


</html>