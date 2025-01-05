<?php 
include 'conexion.php';
session_start();
if(!isset($_SESSION['usuario'])){
    $id=null;
}else{
    $id=$_SESSION['usuario'];
    $sql ="SELECT * FROM `usuarios` WHERE `id` = '$id'";
                    $result = mysqli_query($conexion,$sql);
                    $usuario = $result->fetch_assoc();

}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="./CCS/normalice.css">
    <link rel="stylesheet" href="./CCS/estilos.css">

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
            <?php if($id=null) { ?>
                <li class="nav_items">
                    <a href="./login.php" class="nav_links">Accede</a>
                </li> <?php } ?>
                <?php if($id!=null) { ?>
                <li class="nav_items">
                    <a href="./funciones/salir.php" class="nav_links">Salir </a>
                </li> <?php } ?>
                <a href="./usuario.php" class="usuario"><?php echo $usuario['nombre']?></a>
        </ul>
    </nav>
</header>
<body>
    <main >
        <section class="container about">
            <h2 class="subtitle">Fisei Car</h2>
            <p class="about_paragraph">Página desarrolada para la materia de modelamiento de Sofware dirigida por el Ing. Leonardo Torres.
            </p>
            <div class="about_main">
                <article class="about_icons">
                    <img src="./Imagenes/jona.jpg" class="img_desarrolladores">
                    <h3 class="about_title">Jonathan Ojeda</h3>
                    <p class="about_paragraph">Estudiante de la carrera de Ingeniería en Software. </p>
                    <P class="about_paragraph">Tlf: 0963353752</P>
                </article>
            </div>
        </section>
        <section class="knowledge">
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

    
</body>
</html>