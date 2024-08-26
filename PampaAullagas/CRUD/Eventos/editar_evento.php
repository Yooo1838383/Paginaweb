<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar_evento'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $fecha = $conn->real_escape_string($_POST['fecha']);
    $lugar = $conn->real_escape_string($_POST['lugar']);
    
    $sql = "UPDATE eventos SET titulo='$titulo', descripcion='$descripcion', fecha='$fecha', lugar='$lugar' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin.php?section=eventos&success=Evento actualizado correctamente");
        exit();
    } else {
        echo "Error al actualizar el evento: " . $conn->error;
    }
} else {
    // Cargar datos del evento para mostrar en el formulario de edición
    if (isset($_GET['id'])) {
        $id = $conn->real_escape_string($_GET['id']);
        $result = $conn->query("SELECT * FROM eventos WHERE id='$id'");
        
        if ($result->num_rows > 0) {
            $evento = $result->fetch_assoc();
        } else {
            echo "Evento no encontrado.";
            exit();
        }
    }
}

$conn->close();
?>
 <?php if (isset($evento)): ?>
    <div class="modal fade show" id="editarEventoModal" tabindex="-1" role="dialog" aria-labelledby="editarEventoModalLabel" aria-hidden="true" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarEventoModalLabel">Editar Evento</h5>
                    <a href="admin.php" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <form method="POST" action="Eventos/editar_evento.php">
                        <input type="hidden" name="id" value="<?php echo $evento['id']; ?>">
                        <div class="form-group">
                            <label for="titulo">Título del Evento</label>
                            <input type="text" name="titulo" class="form-control" value="<?php echo $evento['titulo']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="3" required><?php echo $evento['descripcion']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" name="fecha" class="form-control" value="<?php echo $evento['fecha']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="lugar">Lugar</label>
                            <input type="text" name="lugar" class="form-control" value="<?php echo $evento['lugar']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Evento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
