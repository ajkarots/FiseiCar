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
        </div>
    </nav>
</header>


<body>
    <main>
        <section class="editar">
        <?php
                include 'conexion.php';
                $sql ="SELECT * FROM `usuarios` WHERE `id` = '$id'";
                $result = mysqli_query($conexion,$sql);
                $usuario = $result->fetch_assoc();
                mysqli_close($conexion);
                echo '<h2> '.$usuario['nombre'].'</h2>';
                ?>     <img class="img_usuario_editar" src="<?php echo $usuario['foto']?>" alt="">
                <form class="form_editar" action="./funciones/editar_perfil.php" method="POST" id="formulario_editar_perfil">
                <br>
                <h2>Editar</h2>
                <br>
                <h5>Nombre</h5>
                <input class="cuadro_editar" type="text" value="<?php echo $usuario['nombre']?>" id="nombre_editar" name="nombre_editar" placeholder="nombre">
                <h5>Contraseña</h5>
                <input class="cuadro_editar" type="password" value="<?php echo $usuario['clave']?>" id="clave_editar" name="clave_editar" placeholder="Clave">
                <h5>Correo</h5>
                <input class="cuadro_editar" type="email" value="<?php echo $usuario['correo']?>" id="correo_editar" name="correo_editar" placeholder="Correo">
                <h5>Edad</h5>
                <input class="cuadro_editar" type="text" min="16" id="edad_usuario" name="edad_usuario" placeholder="Edad" value="<?php echo $usuario['edad']?>">
                <h5>Provincia</h5>
                <select class="btn_sql" name="boxProvincias" id="boxProvincias">
                    <option value="" disabled selected>Seleccione una provincia</option>
                    <option value="Azuay">Azuay</option>
                    <option value="Bolívar">Bolívar</option>
                    <option value="Cañar">Cañar</option>
                    <option value="Carchi">Carchi</option>
                    <option value="Chimborazo">Chimborazo</option>
                    <option value="Cotopaxi">Cotopaxi</option>
                    <option value="El Oro">El Oro</option>
                    <option value="Esmeraldas">Esmeraldas</option>
                    <option value="Galápagos">Galápagos</option>
                    <option value="Guayas">Guayas</option>
                    <option value="Imbabura">Imbabura</option>
                    <option value="Loja">Loja</option>
                    <option value="Los Ríos">Los Ríos</option>
                    <option value="Manabí">Manabí</option>
                    <option value="Morona Santiago">Morona Santiago</option>
                    <option value="Napo">Napo</option>
                    <option value="Orellana">Orellana</option>
                    <option value="Pastaza">Pastaza</option>
                    <option value="Pichincha">Pichincha</option>
                    <option value="Santa Elena">Santa Elena</option>
                    <option value="Santo Domingo de los Tsáchilas">Santo Domingo de los Tsáchilas</option>
                    <option value="Sucumbíos">Sucumbíos</option>
                    <option value="Tungurahua">Tungurahua</option>
                    <option value="Zamora Chinchipe">Zamora Chinchipe</option>
                </select>
                <h5>Ciudad</h5>
                <select class="btn_sql" name="boxCiudades" id="boxCiudades">
                    <option value="" disabled selected>Seleccione una ciudad</option>
                    <option value="Cuenca">Cuenca</option>
                    <option value="Gualaceo">Gualaceo</option>
                    <option value="Paute">Paute</option>
                    <option value="Sígsig">Sígsig</option>
                    <option value="Nabón">Nabón</option>
                    <option value="Chordeleg">Chordeleg</option>
                    <option value="Girón">Girón</option>
                    <option value="Santa Isabel">Santa Isabel</option>
                    <option value="Camilo Ponce Enríquez">Camilo Ponce Enríquez</option>
                    <option value="Oña">Oña</option>
                    <option value="Sevilla de Oro">Sevilla de Oro</option>
                    <option value="San Fernando">San Fernando</option>
                </select>
                <h5>Telefono</h5>
                <input class="cuadro_editar" type="text" minlength="10" id="telefono_usuario" name="telefono_usuario" placeholder="Telefono" value="<?php echo $usuario['telefono']?>">
                <h5>Foto de perfil</h5>
                <input class="cuadro_editar" type="file" placeholder="ruta imagen" id="img_editar" name="img_editar" accept="image/*" required>
                <input class="cuadro_editar" type="hidden" id="id" value="<?php echo $id;?>" name="id">
                <button type="submit" class="btn_sql" id="btn_guardar">Guardar</button>
                <a href="./usuario.php" class="btn_sql" id="btn_cancelar">Cancelar</a>  
                </form>
           
                </section> 
        <section class="knowledge">
            <div class="knowledge_container container">
                <div class="knowledge_text">
                    <h1>Editar perfil</h1>
                </div>
                <figure class="knowledge_picture">
                    <img src="./Imagenes/admin.png" class="knowledge_picture_admin">
                </figure>
            </div>
        </section>  
    </main>
    <script>
    document.getElementById('formulario_editar_perfil').addEventListener('submit', function(event) {
let campo1 = document.getElementById('nombre_editar').value;
let campo2 = document.getElementById('clave_editar').value;
let campo3 = document.getElementById('correo_editar').value;
let campo4 = document.getElementById('edad_usuario').value;
let campo5 = document.getElementById('ciudad_usuario').value;
let campo6 = document.getElementById('telefono_usuario').value;
let campo7 = document.getElementById('img_editar').value;


if (campo1 === '' || campo2 === '' || campo3 ==='' || campo4 ==='' || campo5 ==='' || campo6 ==='' || campo7 ==='') {
 event.preventDefault(); // Evita el envío del formulario
 alert('Por favor, completa todos los campos.');
}
});
</script>
<script src="./JavaScript/scriptProv.js"></script>
</body>


</html>