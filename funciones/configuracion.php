</*?php
require '../vendor/autoload.php';


$clientID='1009875495293-0lsbktpg9nc2gf958g19578ohqi95r0k.apps.googleusercontent.com';
$clientsecret='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';
$redirect_uri='http://localhost/Proyecto%20autos/home.php';

//cliente

$client = new Google\Client();
$client->setClientId($clientID);
$client->setClientSecret($clientsecret);
$client->setRedirectUri($redirect_uri);
$client->addScope('email');
$client->addScope('profile');
?>