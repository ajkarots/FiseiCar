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
<form class="filtros" action="" method="post">
            <h2>Filtros de busqueda</h2>
        <select class="btn_sql" name="marca_buscar" id="marca_buscar">
                    <option value="">Marcas(Todas)</option>
                    <option value="Poyota">Toyota</option>
                    <option value="Ford">Ford</option>
                    <option value="Chevrolet">Chevrolet</option>
                    <option value="Honda">Honda</option>
                    <option value="BMW">BMW</option>
                    <option value="Audi">Audi</option>
                    <option value="Mercedes">Mercedes-Benz</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Kia">Kia</option>
                    <option value="Mazda">Mazda</option>
                    <option value="Hyundai">Hyundai</option>
                    <option value="Jeep">Jeep</option>
                    <option value="Subaru">Subaru</option>
                    <option value="Peugeot">Peugeot</option>
                    <option value="Suzuki">Suzuki</option>
                </select>
                <select class="btn_sql" name="tipo_buscar" id="tipo_buscar">
                    <option value="">Tipo(Todos)</option>
                <option value="Turismo">Turismo</option>
                    <option value="SUV">Suv</option>
                    <option value="Deportivo">Deportivo</option>
                </select>
                <select class="btn_sql" name="combustible_buscar" id="combustible_buscar">
                    <option value="">Combustible(Todos)</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Gasolina">Gasolina</option>
                </select>
                <select class="btn_sql" name="asientos_buscar" id="asientos_buscar">
                    <option value="">asientos(Todos)</option>
                    <option value="2">Asientos: 2</option>
                    <option value="4">Asientos: 4</option>
                    <option value="5">Asientos: 5</option>
                </select>
                <select class="btn_sql" name="transmision_buscar" id="transmision_buscar">
                    <option value="">Transmision(Todas)</option>
                    <option value="manual">Transmision: Manual</option>
                    <option value="automatica">Transmision: Automatica</option>
                </select>
                <input class="btn_sql" type="submit" value="buscar">
            </form>
    <section class="catalogo">
    
        <div class="viñetas" id="viñetas">
            
            <div class="fila">
            <?php
                include 'conexion.php';
                $marca_buscar = isset($_POST['marca_buscar']) ? $_POST['marca_buscar'] : '';
                $tipo_buscar = isset($_POST['tipo_buscar']) ? $_POST['tipo_buscar'] : '';
                $combustible_buscar = isset($_POST['combustible_buscar']) ? $_POST['combustible_buscar'] : '';
                $asientos_buscar = isset($_POST['asientos_buscar']) ? $_POST['asientos_buscar'] : '';
                $transmision_buscar = isset($_POST['transmision_buscar']) ? $_POST['transmision_buscar'] : '';


                // Verificar conexión
                if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }

                // Consulta para obtener los vehículos
                if($marca_buscar=='' && $tipo_buscar=='' && $combustible_buscar=='' && $asientos_buscar=='' && $transmision_buscar==''){
                    $sql = "SELECT * FROM vehiculos WHERE reservado ='0' ";
                    $result = $conn->query($sql);
    
                    // Verificar si hay resultados
                    if ($result->num_rows > 0) {
                        // Salida de cada fila
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="item" onclick="cargar(this)">';
                            echo '<div class="vehiculo_img">';
                            echo '<img src="' . $row["imagen"] . '" alt="">';
                            echo '<h2>' . $row["marca"] . '</h2>';
                            echo '<h2>' . $row["modelo"] . '</h2>';
                            echo '<input type="hidden" value="'. $row["tipo"] .'" >';
                            echo '<input type="hidden" value="'. $row["Combustible"] .'" >';
                            echo '<input type="hidden" value="'. $row["Transmision"] .'" >';
                            echo '<input type="hidden" value="'. $row["caballos"] . ' caballos">';
                            echo '<br>';
                            echo '<span class="precio">' . $row["precio"] . '$/d</span>';
                            echo '<input type="hidden" id="id" value="./alquilar.php?id='.$row["id"].'" name="id">';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No hay vehículos disponibles.";
                    }

                }else{
                    
                    $sql = "SELECT * FROM vehiculos WHERE 1";
                    if ($marca_buscar) {
                        $sql .= " AND marca = '$marca_buscar'";
                    }
                    if ($tipo_buscar) {
                        $sql .= " AND tipo = '$tipo_buscar'";
                    }
                    if ($combustible_buscar) {
                        $sql .= " AND Combustible = '$combustible_buscar'";
                    }
                    if ($asientos_buscar) {
                        $sql .= " AND Asientos = '$asientos_buscar'";
                    }
                    if ($transmision_buscar) {
                        $sql .= " AND Transmision = '$transmision_buscar'";
                    }
                    $result = $conn->query($sql);
    
                    // Verificar si hay resultados
                    if ($result->num_rows > 0) {
                        // Salida de cada fila
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="item" onclick="cargar(this)">';
                            echo '<div class="vehiculo_img">';
                            echo '<img src="' . $row["imagen"] . '" alt="">';
                            echo '<h2>' . $row["marca"] . '</h2>';
                            echo '<h2>' . $row["modelo"] . '</h2>';
                            echo '<input type="hidden" value="'. $row["tipo"] .'" >';
                            echo '<input type="hidden" value="'. $row["Combustible"] .'" >';
                            echo '<input type="hidden" value="'. $row["Transmision"] .'" >';
                            echo '<input type="hidden" value="'. $row["caballos"] . ' caballos">';
                            echo '<br>';
                            echo '<span class="precio">' . $row["precio"] . '$/d</span>';
                            echo '<input type="hidden" id="id" value="./alquilar.php?id='.$row["id"].'" name="id">';
                            echo '</div>';
                            echo '</div>';
                        }
                    }else{
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
                <img class="caja_usuarios_imagen" src="" alt="" id="img">
                <p id="marca"></p>
                <p id="modelo"></p>
                <p id="tipo"></p>
                <p id="combustible"></p>
                <p id="transmision"></p>
                <p id="caballos"></p>
                <span class="precio" id="precio"></span>
                <div class="fila">
                    <div class="size">
                    </div>
                    <a href="" class="btn_sql" id="id_vehiculo">Alquilar</a>
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
                    <a href="./contacto.php" class="cta">Contacto</a>
            </div>
            <figure class="knowledge_picture">
                <img src="./Imagenes/bmw.png" class="knowledge_img">
            </figure>
        </div>
    </section>

    <script src="./JavaScript/scriptCatalogo.js"></script>

    
</body>
</html>