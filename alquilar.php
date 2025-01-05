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
$id = $_SESSION['usuario'];
$sql = "SELECT * FROM `usuarios` WHERE `id` = '$id'";
$result = mysqli_query($conexion, $sql);
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
                    <tr>
                        <td class="caja_usuarios"><?php echo $vehiculo['marca'] ?></td>
                        <img class="caja_usuarios" src=<?php echo $vehiculo['imagen'] ?>>
                        <td class="caja_usuarios"><?php echo $vehiculo['caballos'] ?></td>
                        <td class="caja_usuarios"><?php echo $vehiculo['precio'] ?></td>
                        <td class="caja_usuarios"><?php echo $vehiculo['Combustible'] ?></td>
                        <td class="caja_usuarios"><?php echo $vehiculo['Asientos'] ?></td>
                        <td class="caja_usuarios"><?php echo $vehiculo['Transmision'] ?></td>
                        <td><select class="caja_usuarios" name="tiempo" id="tiempo">
                                <option value="1">Dia: 1</option>
                                <option value="2">Dias: 2</option>
                                <option value="3">Dias: 3</option>
                                <option value="4">Dias: 4</option>
                                <option value="5">Dias: 5</option>
                                <option value="6">Dias: 6</option>
                                <option value="7">Dias: 7</option>
                                <option value="8">Dias: 8</option>
                                <option value="9">Dias: 9</option>
                                <option value="10">Dias: 10</option>
                                <option value="11">Dias: 11</option>
                                <option value="12">Dias: 12</option>
                                <option value="13">Dias: 13</option>
                                <option value="14">Dias: 14</option>
                                <option value="15">Dias: 15</option>
                                <option value="16">Dias: 16</option>
                                <option value="17">Dias: 17</option>
                                <option value="18">Dias: 18</option>
                                <option value="19">Dias: 19</option>
                                <option value="20">Dias: 20</option>
                                <option value="21">Dias: 21</option>
                                <option value="22">Dias: 22</option>
                                <option value="23">Dias: 23</option>
                                <option value="24">Dias: 24</option>
                                <option value="25">Dias: 25</option>
                                <option value="26">Dias: 26</option>
                                <option value="27">Dias: 27</option>
                                <option value="28">Dias: 28</option>
                                <option value="29">Dias: 29</option>
                                <option value="30">Dias: 30</option>
                            </select></td>
                        <input class="cuadro_editar" type="hidden" id="precio_auto" value="<?php echo $precio_alquilar ?>" name="precio_auto">
                        <input class="cuadro_editar" type="hidden" id="id" value="<?php echo $id ?>" name="id">
                    </tr>
                    </tr>
                </table>


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
    </script>
</body>


</html>