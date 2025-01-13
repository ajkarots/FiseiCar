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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car by</title>
        
    <link rel="stylesheet" href="./CCS/normalice.css">
    <link rel="stylesheet" href="./CCS/estilos.css">
</head>
<body>
    <header class="hero">
        <nav class="nav container">
            <div class="nav_logo">
                <h3 class="nav_title">
                Fisei Car
                </h3>
            </div>
            <ul class="nav_link nav_link--menu">
                <li class="nav_items">
                    <a href="./contacto.php" class="nav_links">Contacto</a>
                </li>
                <li class="nav_items">
                    <a href="./catalogo.php" class="nav_links">Catálogo</a>
                </li>
                <?php if($usuario['id']==null) {?>
                <li class="nav_items">
                    <a href="./login.php" class="nav_links">Accede</a>
                </li><?php } ?>
                <?php if($usuario['rol']=='admin'){?>
                <li class="nav_items">
                    <a href="./administrador.php" class="nav_links">Admin</a>
                </li><?php }?>
                <?php if($id!=null) { ?>
            <li class="nav_items">
                <a href="./funciones/salir.php" class="nav_links">Salir </a>
            </li> <?php } ?>
            </ul>
            <a href="./usuario.php" class="usuario"><?php echo $usuario['nombre']?></a>           
        </nav>
        <section class="hero_container container">
            <h1 class="hero_title">Tú comodidad no tiene límites</h1>
                <p class="hero_paragraph">Ve donde tú quieras</p>
                <a href="./catalogo.php" class="cta"> Vamos</a>
        </section>
    </header>

    <main >
        <section class="container about">
            <h2 class="subtitle">¿Por que elejir Fisei Car?</h2>
            <p class="about_paragraph">El servicio que prestamos es contempla su privacidad y sobre todo su seguridad,
                contamos con vehículos exclusivos, adaptativos y versátiles.
            </p>
            <div class="about_main">
                <article class="about_icons">
                    <img src="./Imagenes/flecha_derecha.svg" class="about_icon">
                    <h3 class="about_title">Nuestro compromiso</h3>
                    <p class="about_paragraph">En Fisei Car, nos comprometemos a ofrecer un servicio de alquiler de autos que prioriza la calidad, seguridad y satisfacción de nuestros clientes. Cada vehículo que ponemos a disposición es revisado y mantenido con los más altos estándares, garantizando su funcionamiento óptimo y su fiabilidad. Además, nos aseguramos de ofrecer una atención personalizada, flexible y transparente, adaptándonos a las necesidades de cada usuario. Nuestro compromiso es brindarte una experiencia de alquiler sin preocupaciones, 
                        con vehículos en excelente estado, precios competitivos y un servicio al cliente dedicado, para que tu viaje sea lo más cómodo y seguro posible.</p>
                </article>
                <article class="about_icons">
                    <img src="./Imagenes/flecha_derecha.svg" class="about_icon">
                    <h3 class="about_title">Nuestra visión</h3>
                    <p class="about_paragraph">Nuestra visión en Fisei Car es convertirnos en la opción líder en el mercado de alquiler de autos, ofreciendo soluciones de movilidad innovadoras, accesibles y sostenibles. Buscamos transformar la experiencia de rentar vehículos, brindando a nuestros clientes no solo un medio de transporte, sino una experiencia confiable y cómoda. A través de un servicio personalizado, una flota moderna y bien mantenida,
                         y un compromiso constante con la excelencia, aspiramos a ser la primera elección para quienes buscan calidad, seguridad y flexibilidad en cada viaje.</p>
                </article>
                <article class="about_icons">
                    <img src="./Imagenes/flecha_derecha.svg" class="about_icon">
                    <h3 class="about_title">Nuestra misión</h3>
                    <p class="about_paragraph">En Fisei Car, nuestra misión es proporcionar a nuestros clientes una experiencia de alquiler de autos única y sin complicaciones, ofreciéndoles vehículos de alta calidad, seguridad y confort. Nos esforzamos por brindar un servicio excepcional, personalizado y adaptado a las necesidades de cada usuario, garantizando que cada viaje sea cómodo, seguro y satisfactorio. A través de un enfoque ético, transparente y flexible,
                         buscamos generar confianza y ser una opción confiable y accesible para quienes necesitan una solución de movilidad eficiente en todo momento.</p>
                </article>
            </div>
        </section>

        <section class="knowledge">
            <div class="knowledge_container container">
                <div class="knowledge_text">
                    <h2>¡No experes más, comienza tu viaje!</h2>
                    <p class="knowledge_paragraph">¡Embarcate en la mejor aventura sobre ruedas!</p>
                        <a href="./catalogo.php" class="cta">Renta tu coche</a>
                </div>
                <figure class="knowledge_picture">
                    <img src="./Imagenes/bmw.png" class="knowledge_img">
                </figure>
            </div>
        </section>
    </main>

    
</body>
</html>