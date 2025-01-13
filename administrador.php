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
    <title>Contacto</title>
    <link rel="stylesheet" href="./CCS/normalice.css">
    <link rel="stylesheet" href="./CCS/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

</head>
<header class="hero2">
    <nav class="nav container">
        <div class="nav_logo">
            <h3 class="nav_title">Fisei Car</h3>
        </div>
        <ul class="nav_link nav_link--menu">
            <li class="nav_items">
                <a href="./home.php" class="nav_links">Inicio</a>
            </li>
            <li class="nav_items">
                <a href="./catalogo.php" class="nav_links">catalogo</a>
            </li>
            <li class="nav_items">
                <a href="./funciones/salir.php" class="nav_links">salir</a>
            </li>
        </ul>
        <a href="./usuario.php" class="usuario"><?php echo $usuario['nombre']?></a>
    </nav>
</header>
<body>

    <main >
    <section class="administracion">
        <div class="contenedor_administracion">
            <h2 class="subtitle">Administador</h2>
            <div class="administrador">
                    <br></br>
                    <h3 class="about_title">Opciones de administración</h3>
                <a href="./vehiculos.php" class="btn_sql_admin" id="btn_vehiculos">Vehículos</a>
                <a href="./usuarios.php" class="btn_sql_admin" id="btn_usuarios">Usuarios</a>
                <a href="./historial.php" class="btn_sql_admin" id="btn_historial">Historial Alquileres</a>
                <a href="./fallas.php" class="btn_sql_admin" id="btn_falla">Devoluciones</a>
            </div>


    </div>
</section>
        <section class="body_reloj">
        <div class="reloj">
        <p class="fecha">1</p>
        <p class="tiempo">1</p>
    </div>
        </section>
        <section class="knowledge">
            <div class="knowledge_container container">
                <div class="knowledge_text">
                    <h1>Página de administracion</h1>
                </div>
                <figure class="knowledge_picture">
                    <img src="./Imagenes/admin.png" class="knowledge_picture_admin">
                </figure>
            </div>
        </section>
    </main>
    <script src="./JavaScript/script_reloj.js"></script>
        
</body>
</html>