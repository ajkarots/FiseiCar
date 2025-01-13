<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Registro</title>
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
                <a href="./contacto.php" class="nav_links">Contacto</a>
            </li>
        </ul>
    </nav>
</header>

<body class="login">
    <main class="mainlog">
        <div class="contenedor_main">
            <div class="caja_trasera">
                <div class="caja_trasera-login">
                    <h3 class="ini">¿Ya tienes cuenta?</h3>
                    <p>Inicia sesion</p>
                    <button id="btn_iniciar-sesion"> Iniciar sesión</button>
                </div>
                <div class="caja_trasera-register">
                    <h3>¿Aun no tienes cuenta?</h3>
                    <p>Registrate para iniciar sesión</p>
                    <button class="rec" id="btn_registrarse">Registrate</button>
                    <h3 class="rec">¿Olvidaste tu contraseña?</h3>
                    <button class="rec" id="btn_recuperar">Recuperar</button>
                </div>
            </div>
                    <div class="contenedor_login-register">
                        <form id="Formulario1" action="./funciones/funciones_registro.php" method="POST" class="formulario_login">
                            <h2 id="titulo_rec">Iniciar sesión</h2>
                            <input type="email"  placeholder="Correo electronico" name="ingre_correo" id="ingre_correo">
                            <input type="password" placeholder="Contraseña" name="ingre_cont" id="ingre_cont">
                            <button name="btn_entrar" id="btn_entrar" type="submit" value="Entrar">Entrar</button>
                            <button class="btn_recuperar_2" name="btn_recuperar_2" id="btn_recuperar_2" type="submit" value="Recuperar">Recuperar</button>

                        </form>
                        <form id="Formulario2" action="./funciones/registro_usuario.php" method="POST" class="formulario_register">
                            <h2>Resgistrarse</h2>
                            <input type="text" placeholder="Nombre completo" name="nombre" id="nombre">
                            <input type="email" placeholder="Correo electronico" name="correo" id="correo">
                            <input type="password" placeholder="Contraseña" name="clave" id="clave">
                            <button id="Registrarse" type="submit">Registrarse</button>
                        </form>
                    </div>
        </div>
    </main>
    <script>
        document.getElementById('Formulario1').addEventListener('submit', function(event) {
 let campo1 = document.getElementById('ingre_correo').value;
 let campo2 = document.getElementById('ingre_cont').value;

 if (campo1 === '' || campo2 === '') {
     event.preventDefault(); // Evita el envío del formulario
     alert('Por favor, completa todos los campos.');
 }
});
</script>

<script>
    document.getElementById('Formulario2').addEventListener('submit', function(event) {
let campo1 = document.getElementById('nombre').value;
let campo2 = document.getElementById('correo').value;
let campo3 = document.getElementById('clave').value;

if (campo1 === '' || campo2 === '' || campo3 ==='') {
 event.preventDefault(); // Evita el envío del formulario
 alert('Por favor, completa todos los campos.');
}
});
</script>


   <script src="./JavaScript/script.js">  </script>

</body>
</html>