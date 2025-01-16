<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';
    
    require_once('conexion.php');



    session_start();
    $correo = $_POST['ingre_correo'];
    $nombre = $_POST['ingre_cont'];
    $boton2 = $_POST['btn_recuperar_2'] ?? null;
    $boton = $_POST['btn_entrar'] ?? null;
    


    if(isset($boton2) && $boton2 == 'Recuperar'){
        $query = "SELECT * FROM usuarios WHERE correo= ? AND nombre=?";
        $stmt = $conexion->prepare($query);
        $stmt ->bind_param("ss",$correo,$nombre);
        $stmt ->execute();
        $resultado =$stmt->get_result();
        $row = $resultado->fetch_assoc();

        if($resultado->num_rows==0){
        echo '
            <script>
            alert("El usuario no encuentra registrado");
            window.location = "/Proyecto autos/login.php";
            </script>
        ';
        mysqli_close($conexion);
        exit();
        }
        else{
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'jonathan130397@gmail.com';
                $mail->Password   = 'azdo xjgx uosu onkj'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
            
                if (!empty($row['correo']) && !empty($row['nombre'])) {
                    $mail->setFrom('jonathan130397@gmail.com', 'FiseiCar');
                    $mail->addAddress($row['correo'], $row['nombre']);
                    $mail->isHTML(true);
                    $mail->Subject = 'Clave de cuenta';
                    $mail->Body    = 'Hola, tu clave es: "' . htmlspecialchars($row['clave']) . '"
                    usala para iniciar sesion, no comprastas tu contraseña.

                    No hace falta que respondaseste mensaje.
                    ';
            
                    if ($mail->send()) {
                        echo'
                        <script>
                        alert("Correo de recuperacion enviado");
                        window.location = "/Proyecto autos/login.php";
                        </script>
                        ';  
                    } else {
                        echo 'Error al enviar correo: ' . $mail->ErrorInfo;
                    }
                } else {
                    echo 'Error: Dirección de correo o nombre no definidos.';
                }
            } catch (Exception $e) {
                error_log('Error al enviar correo: ' . $e->getMessage());
                echo 'Error: ' . $e->getMessage();
            }  
        mysqli_close($conexion);
        }}
        
    if(isset($boton) && $boton == 'entrar'){
        $query2 = "SELECT id FROM usuarios WHERE correo=? AND clave=?";
        $stmt2 = $conexion->prepare($query2);
        $stmt2 ->bind_param("ss",$correo,$nombre);
        $stmt2 ->execute();
        $resultado2 =$stmt2->get_result();
        $row2 = $resultado2->fetch_assoc();

        if($resultado2->num_rows==0){
        echo '
            <script>
            alert("El usuario no encuentra registrado");
            window.location = "login.php";
            </script>
        ';
        mysqli_close($conexion);
        }
        else{
            $_SESSION['usuario']= $row2 ['id'];
            header("Location:home.php");
            exit();
            
        }
    }
    ob_end_flush();
?>