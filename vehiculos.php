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
if  ($usuario['rol']!='admin'){
    echo'
    <script>
    alert("Debes ser administrador");
    window.location = "/Proyecto autos/vehiculos.php";
    </script>';
    header("location: ./login.php");
    session_destroy();
    die();
}
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

            <div class="contenedor_administracion">
                
                    <table class="retorno_mysql" >
                        <tr class="enunciado">
                            <td class="caja_usuarios_1">Marca</td>
                            <td class="caja_usuarios_1">Modelo</td>
                            <td class="caja_usuarios_1">Tipo</td>
                            <td class="caja_usuarios_1">imagen</td>
                            <td class="caja_usuarios_1">Caballos</td>
                            <td class="caja_usuarios_1">Precio/dia</td>
                            <td class="caja_usuarios_1">Combustible</td>
                            <td class="caja_usuarios_1">Asientos</td>
                            <td class="caja_usuarios_1">Transmision</td>
                            <td class="caja_usuarios_1">Reservado</td>
                        </tr>
                        
                        <?php
                        include 'conexion.php';
                        $sql ="SELECT * FROM `vehiculos`";
                        $result = mysqli_query($conexion,$sql);
                        while($tabla = mysqli_fetch_array($result)){
                        ?>    
                        <tr>
                            <td class="caja_usuarios"><?php echo $tabla ['marca'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['modelo'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['tipo'] ?></td>
                            <td><img class="caja_usuarios_imagen" src=<?php echo $tabla['imagen'] ?>></td>
                            <td class="caja_usuarios"><?php echo $tabla ['caballos'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['precio'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['Combustible'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['Asientos'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['Transmision'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['reservado'] ?></td>
                            <td><a href="./editar_vehiculo.php?id=<?php echo $tabla ['id'] ?>" class="btn_sql" id="btn_editar" value="['id']">Editar</a></td>
                            <td><a href="./funciones/eliminar_vehiculo.php?id=<?php echo $tabla ['id'] ?>" class="btn_sql" id="btn_eliminar" value="['id']">Eliminar</a></td>
                            <td><a href="./funciones/vehiculo_disponible.php?id=<?php echo $tabla ['id'] ?>" class="btn_sql" id="btn_disponible" value="['id']">Disponible</a></td>
                            <td><a href="./reporte_falla.php?id=<?php echo $tabla ['id'] ?>" class="btn_sql_admin" id="btn_falla">Falla</a></td>
                        </tr>
                        <?php
                        }
                        mysqli_close($conexion);
                        ?>  
                    </table>
            </div>
        </section>
        <section>
        <a href="./administrador.php" class="btn_sql_tabla" id="btn_vehiculos">Volver</a>
        <a href="./agregar_vehiculo.php" class="btn_sql">agregar</a>
        </section>
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
    </main> 
</body>


</html>