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
                
        </ul>
    </nav>
</header>
<body>
    <main >
        <section class="container about">
            <h2 class="subtitle"><?php echo $usuario['nombre']?></h2>
            <div class="about_main">
                <article class="about_icons">
                    <img src="<?php echo $usuario['foto']?>" class="img_usuario">
                    <P class="info_usuario">Tefelono: 0<?php echo $usuario['telefono']?></P>
                    <P class="info_usuario">Edad: <?php echo $usuario['edad']?></P>
                    <P class="info_usuario">Ciudad: <?php echo $usuario['ciudad']?></P>
                </article>
        </section>
            </div>
            <div>                    <a href="" class="btn_sql">Editar</a>
            <a href="./historial_usuario.php" class="btn_sql">Historial de alquiler</a></div>
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

    <script src="./JavaScript/script_reloj.js"></script>
</body>
</html>