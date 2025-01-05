<?php
    include'conexion.php';
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $query = "INSERT INTO usuarios(nombre,clave,correo,rol)
            VALUES('$nombre','$clave','$correo','usuario')";

    //VERIFICAR correo
    
    $verCorreo= mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo='$correo'");
    if(mysqli_num_rows($verCorreo)>0){
        echo '
            <script>
            alert("El correo ya se encuentra registrado");
            window.location = "/Proyecto autos/login.php";
            </script>
        ';
        mysqli_close($conexion);
        exit();
    }else{
    $ejecutar = mysqli_query($conexion,$query);

    if($ejecutar){
        echo '
            <script>
            alert("Usuario registrado");
            window.location = "/Proyecto autos/login.php";
            </script>
        ';
    }
    else{
        echo '
        <script>
        alert("Usuario no registrado");
        window.location = "/Proyecto autos/login.php";
        </script>
    ';

    mysqli_close($conexion);}
}
?>