<?php
include 'conexion.php';
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
    <script>
    alert("Debes iniciar sesion par alquilar");
    window.location = "/Proyecto autos/home.php";
    </script>';
    header("location: ./login.php");
    session_destroy();
    die();
}
$idUsuario = $_SESSION['usuario'];
$sql = "SELECT * FROM `usuarios` WHERE `id` = '$idUsuario'";
$result = mysqli_query($conexion, $sql);
$usuario = $result->fetch_assoc();
mysqli_close($conexion);
?>

<html lang="en">

<head>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
            <h3 class="nav_title">Alquiler de vehiculo</h3>
        </div>
    </nav>
</header>


<body>
    <main class="main_agregar_vehiculo">
        <section class="agregar">
            <?php
            include 'conexion.php';
            $id = $_GET['id'];
            $sql = "SELECT * FROM vehiculos WHERE `id` = '$id'";
            $result = mysqli_query($conexion, $sql);
            $vehiculo = $result->fetch_assoc();
            mysqli_close($conexion);
            echo '<h2> ' . $vehiculo['marca'] . '</h2>';
            $precio_alquilar = $vehiculo['precio'];
            ?>
            <form class="form_alquilar_vehiculo" action="./funciones/alquilar_vehiculo_sql.php" method="POST" id="form_alquilar_vehiculo">
                <br></br>
                <div id="pdf">
                <table class="editar_vehiculo_mysql ">
                    <tr>
                        <td>Marca&#160 </td>
                        <td>Caballos&#160 </td>
                        <td>Precio/dia&#160 </td>
                        <td>Combustible&#160 </td>
                        <td>Asientos&#160 </td>
                        <td>Transmision&#160 </td>
                        <td>Tiempo&#160 </td>
                    </tr>

                    <tr>
                        <td class="caja_usuarios"><?php echo $vehiculo['marca'] ?></td>
                        <img class="caja_imagen_vehiculo" src=<?php echo $vehiculo['imagen'] ?>>
                        <td class="caja_usuarios"><?php echo $vehiculo['caballos'] ?></td>
                        <td class="caja_usuarios"><?php echo $vehiculo['precio'] ?></td>
                        <td class="caja_usuarios"><?php echo $vehiculo['Combustible'] ?></td>
                        <td class="caja_usuarios"><?php echo $vehiculo['Asientos'] ?></td>
                        <td class="caja_usuarios"><?php echo $vehiculo['Transmision'] ?></td>
                        <td><input class="btn_sql" type="text" id="tiempo" name="tiempo" value="01/01/2025 - 01/15/2025"/></td>
                        <input class="cuadro_editar" type="hidden" id="precio_auto" value="<?php echo $precio_alquilar ?>" name="precio_auto">
                        <input class="cuadro_editar" type="hidden" id="id" value="<?php echo $id ?>" name="id">
                    </tr>

                </table>
                </div>
                
                <button type="submit" class="btn_sql" id="btn_guardar">Alquilar</button>
                <a href="./catalogo.php" class="btn_sql" id="btn_cancelar">Cancelar</a>
            </form>
            </div>
        </section>

        <section>
            <h2>Descripcion</h2>
            <article class="about_icons"><?php echo $vehiculo['descripcion'] ?></article>
        </section>

    </main>
    <section class="knowledge">
        <div class="knowledge_container container">
            <div class="knowledge_text">
                <h1>Alquiler de vehiculo</h1>
            </div>
            <figure class="knowledge_picture">
                <img src="./Imagenes/rcz.png" class="knowledge_picture_admin">
            </figure>
        </div>
    </section>
    <script>
        document.getElementById('form_alquilar_vehiculo').addEventListener('submit', function(event) {
            alert('Vehiculo reservado');
        });
        var today = new Date().toISOString().slice(0, 16)
        $(function() {
            $('input[name="tiempo"]').daterangepicker({
                opens: 'left',
                minDate:  moment().format('MM/DD/YYYY') 
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
</body>


</html>