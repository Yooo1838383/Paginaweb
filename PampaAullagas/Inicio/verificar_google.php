<?php
$clienteID = "1098146008121-8qp6nptlfp1av95rrnj5oi3hvsqbgcu0.apps.googleusercontent.com";

$id_token = $_POST['idtoken'];
$url_verificacion = "https://oauth2.googleapis.com/tokeninfo?id_token=" . $id_token;
$respuesta = file_get_contents($url_verificacion);
$datos = json_decode($respuesta);

if ($datos->aud == $clienteID) {
    echo "Login con Google exitoso. Usuario: " . $datos->email;
    // Aquí puedes manejar la lógica para registrar o iniciar sesión al usuario
} else {
    echo "Error en la verificación del token de Google";
}
?>
