<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agregar_evento'])) {
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $fecha = $conn->real_escape_string($_POST['fecha']);
    $lugar = $conn->real_escape_string($_POST['lugar']);
    
    $sql = "INSERT INTO eventos (titulo, descripcion, fecha, lugar) VALUES ('$titulo', '$descripcion', '$fecha', '$lugar')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin.php?section=eventos&success=Evento agregado correctamente");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
