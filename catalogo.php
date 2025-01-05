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
    <title>Catalogo</title>
    <link rel="stylesheet" href="./CCS/normalice.css">
    <link rel="stylesheet" href="./CCS/estilos.css">
</head>
<header class="hero2">
    <nav class="nav container">
        <div class="nav_logo">
            <h3 class="nav_title">Fisei Car</h3>
            <h3>Catalogo</h3>
        </div>
        <ul class="nav_link nav_link--menu">
            <li class="nav_items">
                <a href="./home.php" class="nav_links">Inicio</a>
            </li>
            <li class="nav_items">
                <a href="./contacto.php" class="nav_links">Contacto</a>
            </li>
            <?php if($id==null) { ?>
            <li class="nav_items">
                <a href="./login.php" class="nav_links">Accede</a>
            </li> <?php } ?>
            <?php if($id!=null) { ?>
            <li class="nav_items">
                <a href="./funciones/salir.php" class="nav_links">Salir </a>
            </li> <?php } ?>
        </ul>
        <br></br>
        <a href="./usuario.php" class="usuario"><?php echo $usuario['nombre']?></a>
    </nav>
</header>

<body >

    <section class="catalogo">
    
        <div class="viñetas" id="viñetas">
            <form action="" method="post">
            <h2>Filtro por marcas</h2>
        <select class="btn_sql" name="buscador" id="buscador">
                    <option value="">Todas las marcas</option>
                    <option value="toyota">Toyota</option>
                    <option value="ford">Ford</option>
                    <option value="chevrolet">Chevrolet</option>
                    <option value="honda">Honda</option>
                    <option value="bmw">BMW</option>
                    <option value="audi">Audi</option>
                    <option value="mercedes">Mercedes-Benz</option>
                    <option value="volkswagen">Volkswagen</option>
                    <option value="nissan">Nissan</option>
                    <option value="kia">Kia</option>
                    <option value="mazda">Mazda</option>
                    <option value="hyundai">Hyundai</option>
                    <option value="jeep">Jeep</option>
                    <option value="subaru">Subaru</option>
                    <option value="peugeot">Peugeot</option>
                    <option value="suzuki">Suzuki</option>
                </select>
                <input class="btn_sql" type="submit" value="buscar">
            </form>
            <div class="fila">
            <?php
                $buscador = isset($_POST['buscador']) ? $_POST['buscador'] : '';
                $host = "localhost";       // Dirección del servidor
                $usuario = "root";   // Nombre de usuario
                $contraseña = "";  // Contraseña del usuario
                $base_de_datos = "fisei_car";  // Nombre de la base de datos
                
                // Crear la conexión
                $conn = new mysqli($host, $usuario, $contraseña, $base_de_datos);

                // Verificar conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Consulta para obtener los vehículos
                if($buscador==''){
                    $sql = "SELECT id,marca, modelo, descripcion, imagen, caballos, precio FROM vehiculos WHERE reservado ='0' ";
                    $result = $conn->query($sql);
    
                    // Verificar si hay resultados
                    if ($result->num_rows > 0) {
                        // Salida de cada fila
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="item" onclick="cargar(this)">';
                            echo '<div class="vehiculo_img">';
                            echo '<img src="' . $row["imagen"] . '" alt="">';
                            echo '<h2 class="modelo">' . $row["marca"] . '</h2>';
                            echo '<h2 class="modelo">' . $row["modelo"] . '</h2>';
                            echo '<p>' . $row["caballos"] . ' caballos</p>';
                            echo '<span class="precio">' . $row["precio"] . '$/d</span>';
                            echo '<input type="hidden" id="id" value="./alquilar.php?id='.$row["id"].'" name="id">';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No hay vehículos disponibles.";
                    }

                }else{
                    $sql = "SELECT id, marca, modelo, descripcion, imagen, caballos, precio FROM vehiculos WHERE reservado ='0' and  marca='$buscador'";
                    $result = $conn->query($sql);
    
                    // Verificar si hay resultados
                    if ($result->num_rows > 0) {
                        // Salida de cada fila
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="item" onclick="cargar(this)">';
                            echo '<div class="vehiculo_img">';
                            echo '<img src="' . $row["imagen"] . '" alt="">';
                            echo '<h2 class="modelo">' . $row["marca"] . '</h2>';
                            echo '<h2 class="modelo">' . $row["modelo"] . '</h2>';
                            echo '<p>' . $row["caballos"] . ' caballos</p>';
                            echo '<span class="precio">' . $row["precio"] . '$/d</span>';
                            echo '<input type="hidden" id="id" value="./alquilar.php?id='.$row["id"].'" name="id">';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No hay vehículos disponibles.";
                    }
                }


                // Cerrar conexión
                $conn->close();
                ?>
                <!--fin php-->
            </div>
        </div>
        <!-- contenedor item -->
         <div class="seleccion" id="seleccion">
            <div class="cerrar" onclick="cerrar()">
                &#x2718
            </div>
            <div class="info">
                <img src="" alt="" id="img">
                <h2 id="modelo"></h2>
                <p id="descripcion"></p>
                <span class="precio" id="precio"></span>
                <div class="fila">
                    <div class="size">
                        <label for="">Tiempo disponible</label>
                        <select name="" id="">
                            <option value="">1 dia</option>
                            <option value="">2 dias</option>
                            <option value="">5 dias</option>
                            <option value="">1 semana</option>
                        </select>
                    </div>
                    <a href="" class="btn_sql" id="boton_selecion_tiempo">Alquilar</a>
                </div>
            </div>
         </div>
    </section>
    <section class="knowledge">
        <div class="knowledge_container container">
            <div class="knowledge_text">
                <h2>Sobre nostros</h2>
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

    <script src="./JavaScript/scriptCatalogo.js"></script>

    
</body>
</html>