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
            <h3 class="nav_title">Nuevo usuario</h3>
        </div>
    </nav>
</header>


<body>
    <main>
        <section class="editar">   
                <form class="form_editar" action="./funciones/agregar_usuario_sql.php" method="POST" id="formulario_editar">
                <br></br>
                <h2>Editar</h2>
                <input class="cuadro_editar" type="text" placeholder="Nombre" id="nombre_editar" name="nombre_editar" >
                <input class="cuadro_editar" type="password" placeholder="Contraseña" id="clave_editar" name="clave_editar">
                <input class="cuadro_editar" type="email" placeholder="Correo" id="correo_editar" name="correo_editar">
                <select class="cuadro_editar" name="rol_editar" id="rol_editar">
                    <option value="admin">Administrador</option>
                    <option value="alimentador">alimentador</option>
                    <option value="usuario">Usuario</option>
                </select>
                <button type="submit" class="btn_sql" id="btn_guardar">Guardar</button>
                <a href="./usuarios.php" class="btn_sql" id="btn_cancelar">Cancelar</a>  
                </form>
           
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
    <script>
    document.getElementById('formulario_editar').addEventListener('submit', function(event) {
let campo1 = document.getElementById('nombre_editar').value;
let campo2 = document.getElementById('clave_editar').value;
let campo3 = document.getElementById('correo_editar').value;

if (campo1 === '' || campo2 === '' || campo3 ==='') {
 event.preventDefault(); // Evita el envío del formulario
 alert('Por favor, completa todos los campos.');
}
});
</script>
</body>


</html>