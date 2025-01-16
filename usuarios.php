<?php 
include 'conexion.php';
session_start();
if(!isset($_SESSION['usuario'])){
    echo'
    <script>
    alert("Debes iniciar sesion par alquilar");
    window.location = "login.php";
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
                            <td class="caja_usuarios_1">Nombre</td>
                            <td class="caja_usuarios_1">Correo</td>
                            <td class="caja_usuarios_1">Rol</td>
                        </tr>
                        <tr>
                        <?php
                        include 'conexion.php';
                        $sql ="SELECT `id`,`nombre`, `clave`, `correo`, `rol` FROM `usuarios`";
                        $result = mysqli_query($conexion,$sql);
                        while($tabla = mysqli_fetch_array($result)){
                        ?>    
                        <tr>
                            <td class="caja_usuarios"><?php echo $tabla ['nombre'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['correo'] ?></td>
                            <td class="caja_usuarios"><?php echo $tabla ['rol'] ?></td>
                            <td><a href="editar_usuario.php?id=<?php echo $tabla ['id'] ?>" class="btn_sql" id="btn_editar" value="['id']">Editar</a></td>
                            <td><a href="./funciones/eliminar.php?id=<?php echo $tabla ['id'] ?>" class="btn_sql" id="btn_eliminar" value="['id']">Eliminar</a></td>
                        </tr>
                        <?php
                        }
                        mysqli_close($conexion);
                        ?>       
                        </tr>
                    </table>
            </div>
        </section>
        <a href="./administrador.php" class="btn_sql_tabla" id="btn_volver">Volver</a>
        <a href="./agregar_usuario.php" class="btn_sql_tabla" id="btn_agregar_usuario">Agregar</a>
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
    <script src="./JavaScript/scriptAdministracion.js"></script>
</body>


</html>