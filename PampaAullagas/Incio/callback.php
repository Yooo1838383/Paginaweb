<?php
session_start();

require_once 'vendor/autoload.php';

$cliente = new Google_Client(['client_id' => 'TU_CLIENT_ID_DE_GOOGLE']);  // Especifica tu Client ID

$token_id = $_POST['credencial'];
$informacion_usuario = $cliente->verifyIdToken($token_id);

if ($informacion_usuario) {
    $_SESSION['token_acceso'] = $token_id;
    $_SESSION['usuario'] = $informacion_usuario;
    header('Location: home.php');
} else {
    echo "Error de verificación del token.";
}
?>
