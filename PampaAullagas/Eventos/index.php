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

// Obtener todos los eventos
$eventos = $conn->query("SELECT * FROM eventos ORDER BY fecha ASC");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos Locales</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Bienvenidos a Nuestra Página de Eventos</h1>
        
        <h2 class="mt-5">Próximos Eventos</h2>
        <div class="row">
            <?php if ($eventos->num_rows > 0): ?>
                <?php while($row = $eventos->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['titulo']; ?></h5>
                                <p class="card-text"><?php echo $row['descripcion']; ?></p>
                                <p><strong>Fecha:</strong> <?php echo date("d M Y", strtotime($row['fecha'])); ?></p>
                                <p><strong>Lugar:</strong> <?php echo $row['lugar']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">No hay eventos próximos en este momento.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Incluye jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
