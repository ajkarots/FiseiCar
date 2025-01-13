
</*?php
require_once 'vendor/autoload.php';

session_start();

$client = new Google\Client();
$client->setAuthConfig('path/to/client_secret.json');
$client->setRedirectUri('http://localhost/Proyecto%20autos/autentificacion.php');
$client->addScope('https://www.googleapis.com/auth/userinfo.profile');
$client->addScope('https://www.googleapis.com/auth/userinfo.email');
$client->setAccessType('offline');  // Solicita token de actualización
$client->setPrompt('consent');      // Fuerza mostrar pantalla de consentimiento

// Si ya se tiene un token de acceso
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);

    // Verificar si el token ha expirado
    if ($client->isAccessTokenExpired()) {
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Redirigir para obtener un nuevo token si no hay refresh token
            $authUrl = $client->createAuthUrl();
            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
            exit;
        }
        $_SESSION['access_token'] = $client->getAccessToken();
    }

    // Obtener información del usuario
    $oauth2 = new Google\Service\Oauth2($client);
    $userInfo = $oauth2->userinfo->get();
    echo 'Bienvenido, ' . htmlspecialchars($userInfo->name);
} else {
    // Si no hay token, iniciar el flujo de autorización
    if (!isset($_GET['code'])) {
        $authUrl = $client->createAuthUrl();
        header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
        exit;
    } else {
        // Intercambiar código de autorización por token de acceso
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;

        // Comprobar si se recibió un token de actualización
        if (!empty($token['refresh_token'])) {
            $client->setAccessToken($token);
        }

        header('Location: ' . filter_var('http://localhost/Proyecto%20autos/autentificacion.php', FILTER_SANITIZE_URL));
        exit;
    }
}
?>

