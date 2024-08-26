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

// Inserciones para Historia
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agregar_historia'])) {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $fecha = $_POST['fecha'];
    
    $sql = "INSERT INTO historia (titulo, contenido, fecha) VALUES ('$titulo', '$contenido', '$fecha')";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Inserciones para Eventos
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agregar_evento'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    
    $sql = "INSERT INTO eventos (titulo, descripcion, fecha, lugar) VALUES ('$titulo', '$descripcion', '$fecha', '$lugar')";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Inserciones para Lugares Turísticos
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agregar_lugar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $ubicacion = $_POST['ubicacion'];
    $imagen = $_POST['imagen']; // En este ejemplo, solo manejamos el nombre del archivo

    $sql = "INSERT INTO lugares (nombre, descripcion, ubicacion, imagen) VALUES ('$nombre', '$descripcion', '$ubicacion', '$imagen')";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener datos
$historias = $conn->query("SELECT * FROM historia ORDER BY fecha ASC");
$eventos = $conn->query("SELECT * FROM eventos ORDER BY fecha ASC");
$lugares = $conn->query("SELECT * FROM lugares ORDER BY nombre ASC");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php" class="nav-link">Inicio</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
            <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Usuario</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="menu-historias">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Historias</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="menu-eventos">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Eventos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="menu-lugares">
                            <i class="nav-icon fas fa-map-marker-alt"></i>
                            <p>Lugares Turísticos</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Panel de Administración</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Secciones de contenido -->
                <div id="section-historias" class="content-section">
                    <h2>Administrar Historias</h2>
                    <!-- Aquí va el CRUD de Historias -->
                </div>

                <div id="section-eventos" class="content-section" style="display:none;">
    <h2>Administrar Eventos</h2>

    <!-- Formulario para agregar eventos -->
    <?php include 'Eventos/insertar_evento.php'; ?>

    <!-- Listado de eventos -->
    <?php include 'Eventos/listar_evento.php'; ?>
    
</div>

                <div id="section-lugares" class="content-section" style="display:none;">
                    <h2>Administrar Lugares Turísticos</h2>
                    <!-- Aquí va el CRUD de Lugares Turísticos -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.1.0
        </div>
        <strong>Copyright &copy; 2024 <a href="https://adminlte.io">MCDLC</a>.</strong> Todos los derechos reservados.
    </footer>
</div>
<!-- ./wrapper -->

<!-- AdminLTE Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

<script>
    $(document).ready(function(){
        // Mostrar la sección de Historias por defecto
        $('#section-historias').show();

        // Manejar clics en el menú de la barra lateral
        $('#menu-historias').click(function() {
            $('.content-section').hide(); // Ocultar todas las secciones
            $('#section-historias').show(); // Mostrar la sección de Historias
        });

        $('#menu-eventos').click(function() {
            $('.content-section').hide(); // Ocultar todas las secciones
            $('#section-eventos').show(); // Mostrar la sección de Eventos
        });

        $('#menu-lugares').click(function() {
            $('.content-section').hide(); // Ocultar todas las secciones
            $('#section-lugares').show(); // Mostrar la sección de Lugares Turísticos
        });
    });
</script>
</body>
</html>