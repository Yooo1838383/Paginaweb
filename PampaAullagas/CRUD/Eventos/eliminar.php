<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    
    $sql = "DELETE FROM eventos WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin.php?section=eventos&success=Evento eliminado correctamente");
        exit();
    } else {
        echo "Error al eliminar el evento: " . $conn->error;
    }
}

$conn->close();
?>
