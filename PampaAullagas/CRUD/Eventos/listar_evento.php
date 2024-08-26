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

if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $result = $conn->query("SELECT * FROM eventos WHERE id = $edit_id");
    $evento = $result->fetch_assoc();
}

// Obtener todos los eventos
$eventos = $conn->query("SELECT * FROM eventos ORDER BY fecha ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Eventos</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Administrar Eventos</h2>
        <!-- CRUD de Eventos -->
        <form method="POST" action="admin.php">
            <div class="form-group">
                <label for="titulo">Título del Evento</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lugar">Lugar</label>
                <input type="text" name="lugar" class="form-control" required>
            </div>
            <button type="submit" name="agregar_evento" class="btn btn-primary">Agregar Evento</button>
        </form>
        <!-- Listado de eventos -->
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Lugar</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $eventos->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['lugar']; ?></td>
                    <td>
                        <a href="?edit_id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarEventoModal">Editar</a>
                        <a href="Eventos/eliminar.php?tipo=evento&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este evento?');">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de Edición -->
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

    <!-- Incluye jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
