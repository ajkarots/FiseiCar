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
            mysqli_close($conexion);
            echo '<h2> ' . $vehiculo['marca'] . '</h2>';
            echo '<h2> ' . $vehiculo['modelo'] . '</h2>';
            ?>    
                        <div>   
            <table class="editar_vehiculo_mysql" >
                        <tr>
                            <td>Marca</td>
                            <td>modelo</td>
                            <td>tipo</td>
                            <td>Descripcion</td>
                            <td>imagen</td>
                            <td>Caballos</td>
                            <td>Precio/dia</td>
                            <td>Combustible</td>
                            <td>Asientos</td>
                            <td>Transmision</td>
                        </tr>
                        <tr>
                        <tr>
                            <td class="caja_usuarios"><?php echo $vehiculo ['marca'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['modelo'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['tipo'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['descripcion'] ?></td>
                            <td class="caja_usuarios"> <img class="caja_usuarios_imagen" src="<?php echo $vehiculo ['imagen'] ?>" alt=""></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['caballos'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['precio'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['Combustible'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['Asientos'] ?></td>
                            <td class="caja_usuarios"><?php echo $vehiculo ['Transmision'] ?></td>
                        </tr>      
                        </tr>
                    </table>
                    </div> 
                    <div>
    <section class="editar">

            <form class="form_editar_vehiculo" action="./funciones/editar_vehiculo_sql.php" method="POST" id="formulario_editar_vehiculo">
                <br></br>
                <h2>Editar</h2>
                <h5>Marca</h5>
                <select class="btn_sql" name="box_marcas" id="box_marcas">
                    <option value="Toyota">Toyota</option>
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
                <h5>Modelo</h5>
                <select class="btn_sql" name="box_modelos" id="box_modelos">
                <option value="aygo">Toyota Aygo</option>
                    <option value="yaris">Toyota Yaris</option>
                    <option value="yaris-cross">Toyota Yaris Cross</option>
                    <option value="corolla">Toyota Corolla</option>
                    <option value="corolla-touring-sport">Toyota Corolla Touring Sport</option>
                    <option value="chr">Toyota C-HR</option>
                    <option value="rav4">Toyota RAV4</option>
                    <option value="rav4-plug-in">Toyota RAV4 Plug-in Hybrid</option>
                    <option value="prius">Toyota Prius</option>
                    <option value="prius-plug-in">Toyota Prius Plug-in</option>
                    <option value="land-cruiser">Toyota Land Cruiser</option>
                    <option value="land-cruiser-70">Toyota Land Cruiser 70</option>
                    <option value="hilux">Toyota Hilux</option>
                    <option value="supra">Toyota Supra</option>
                    <option value="mirai">Toyota Mirai (eléctrico de pila de hidrógeno)</option>
                    <option value="bZ4X">Toyota bZ4X (eléctrico)</option>
                    <option value="proace">Toyota Proace</option>
                    <option value="proace-city">Toyota Proace City</option>
                    <option value="camry">Toyota Camry</option>
                    <option value="avensis">Toyota Avensis</option>
                    <option value="prius-c">Toyota Prius C</option>
                    <option value="tundra">Toyota Tundra</option>
                    <option value="sequoia">Toyota Sequoia</option>
                    <option value="sienna">Toyota Sienna</option>
                    <option value="vios">Toyota Vios</option>
                    <option value="fortuner">Toyota Fortuner</option>
                    <option value="proace-ev">Toyota Proace EV (eléctrico)</option>
                </select>
                <h5>Tipo</h5>
                <select class="btn_sql" name="tipo_vehiculo" id="tipo_vehiculo">
                    <option value="Turismo">Turismo</option>
                    <option value="SUV">Suv</option>
                    <option value="Deportivo">Deportivo</option>
                </select>
                <h5>Descripcion</h5>
                <br>
                <textarea class="editar_descripcion" type="text" placeholder="<?php echo $vehiculo['descripcion']?>" id="descripcion_editar" name="descripcion_editar"></textarea>
                <br>
                <h5>Imagen</h5>
                <input class="cuadro_editar" type="file" placeholder="ruta imagen" id="img_editar" name="img_editar" accept="image/*" value="<?php echo $vehiculo['imagen']?>">
                <h5>Caballos</h5>
                <input class="cuadro_editar" type="number" placeholder="caballos" id="caballos_editar" name="caballos_editar" value="<?php echo $vehiculo['caballos']?>" min="0">
                <h5>Precio por dia</h5>
                <input class="cuadro_editar" type="number" placeholder="precio" id="precio_editar" name="precio_editar" value="<?php echo $vehiculo['precio']?>" min="0">
                <select class="btn_sql" name="combustible_editar" id="combustible_editar">
                    <option value="Diesel">Diesel</option>
                    <option value="Gasolina">Gasolina</option>
                </select>
                <select class="btn_sql" name="asientos_editar" id="asientos_editar">
                    <option value="2">Asientos: 2</option>
                    <option value="4">Asientos: 4</option>
                    <option value="5">Asientos: 5</option>
                </select>
                <select class="btn_sql" name="transmision_editar" id="transmision_editar">
                    <option value="manual">Transmision: Manual</option>
                    <option value="automatica">Transmision: Automatica</option>
                </select>
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
    <script src="./JavaScript/scriptBox.js">
        
    </script>
    
</body>


</html>