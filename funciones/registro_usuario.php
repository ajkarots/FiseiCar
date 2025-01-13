<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

require_once('conexion.php');
session_start();
include 'conexion.php';
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$query = "INSERT INTO usuarios(nombre, clave, correo, rol) VALUES('$nombre', '$clave', '$correo', 'usuario')";
$query2 = "SELECT * FROM usuarios WHERE correo=? AND clave=?";
$stmt2 = $conexion->prepare($query2);
$stmt2->bind_param("ss", $correo, $clave); // Cambié $nombre a $clave aquí

// VERIFICAR correo
$verCorreo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
if (mysqli_num_rows($verCorreo) > 0) {
    echo '
        <script>
        alert("El correo ya se encuentra registrado");
        window.location = "/Proyecto autos/login.php";
        </script>
    ';
    mysqli_close($conexion);
    exit();
} else {
    $ejecutar = mysqli_query($conexion, $query);
    if ($ejecutar) {
        $stmt2->execute();
        $resultado2 = $stmt2->get_result();
        $row2 = $resultado2->fetch_assoc();

        $_SESSION['usuario'] = $row2['id'];
        $mail = new PHPMailer(true);
        $verificacion = uniqid();
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'jonathan130397@gmail.com';
            $mail->Password   = 'azdo xjgx uosu onkj';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            if (!empty($row2['correo']) && !empty($row2['nombre'])) {
                $mail->setFrom('jonathan130397@gmail.com', 'FiseiCar');
                $mail->addAddress($row2['correo'], $row2['nombre']);
                $mail->isHTML(true);
                $mail->Subject = 'Clave de cuenta';
                $mail->Body    = 'Hola, tu codigo de verificacion es: "' . htmlspecialchars($verificacion) . '"
                usalo para completar el registro.

                No hace falta que respondaseste mensaje.
                ';

                if ($mail->send()) {
                    $_SESSION['conf'] = $verificacion;
                    echo '
                    <script>
                    alert("Correo de verificación enviado");
                    window.location = "/Proyecto autos/nuevo_usuario.php";
                    </script>
                    ';
                    exit();
                } else {
                    $id_borrar = $row2['id'];
                    echo 'Error al enviar correo: ' . $mail->ErrorInfo;
                    $query = "DELETE FROM usuarios WHERE id='$id_borrar' ORDER BY inicio DESC LIMIT 1";
                    if ($conexion->query($query) === TRUE) {
                        echo '<script type="text/javascript">
                        alert("Usuario Eliminado");
                        window.location.href="/Proyecto%20autos/login .php";
                        </script>';
                    }
                    exit();
                }
            } else {
                echo 'Error: Dirección de correo o nombre no definidos.';
            }
        } catch (Exception $e) {
            error_log('Error al enviar correo: ' . $e->getMessage());
            echo 'Error: ' . $e->getMessage();
        }
    } else {
        echo '
        <script>
        alert("Usuario no registrado");
        window.location = "/Proyecto autos/login.php";
        </script>
    ';
        mysqli_close($conexion);
    }
}
