<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$dbname = "pampaaullagas";
$conn = new mysqli($host, $user, $password, $dbname);

// Manejo de Errores
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
