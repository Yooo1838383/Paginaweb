<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalnia+Glaze:wght@100..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <title>Pampa Aullagas</title>

    <link rel="stylesheet" href="index.css">
    
</head>
<body>
    <header>
        <nav>
            
            <ul>
                <li><a href="#Atracciones">Atracciones Turísticas</a></li>
                <li><a href="#Alojamientos">Alojamientos</a></li>
                <li><a href="Mapa/mapa.php">Como llegar</a> </li>
                <li><a href="Eventos/index.php">Actividades</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
            <div class="weather" id="weather">
            <!-- Aquí se mostrará el clima -->
        </div>
            <div class="auth-buttons">
            <button class="login" onclick="redireccionar('Inicio/login.html')">Iniciar Sesión</button>
            <button class="signup" onclick="redireccionar('Inicio/registro.html')">Registrarse</button>
            </div>
        </nav>
    </header>
    
    <section class="hero">
        <div class="hero-content">
            <h1>PAMPA AULLAGAS CAPITAL DE LA ATLANTIDA PERDÍDA</h1>
            <p>Descubre la gran Historia que tiene la Marka Pampa Aullagas</p>
            <button class="cta-button">Descubre más</button>
        </div>
    </section>
    
    <section class="services">
        <h2>Nuestros Servicios</h2>
        <div class="service-cards">
            <div class="service-card">
                <img src="weather-icon.png" alt="Calcular Clima">
                <h3>Ver Clima</h3>
                <p>Información precisa sobre el clima </p>
            </div>
            <div class="service-card">
                <img src="Images/Pampa Aullagas.jpeg" alt="Como llegar">
                <h3>Como llegar</h3>
                <p>Encuentra las rutas del destino y las paradas del transporte publico.</p>
            </div>
            <div class="service-card">
                <img src="Images/Eventosenvvio.jpeg" alt="Eventos en Vivo">
                <h3>En vivos</h3>
                <p>Disfruta de nuestras transmiciones de eventos en vivo </p>
            </div>
            <div class="service-card">
                <img src="Images/Actividades.jpeg" alt="Eventos Locales">
                <h3>Eventos Locales</h3>
                <p>Descubre eventos locales y actividades para disfrutar.</p>
            </div>
        </div>
    </section>
    
    <section class="top-destinations">
        <h2>Destinos Populares</h2>
        <div class="destination-cards">
            <div class="destination-card">
                <img src="Images/cerro.jpeg" alt="Cerro">
                <h3>Cerro Pedro Santos Villca</h3>
                <p>encuentra una vista increible del lugar ademas de sentir debajo de tus pies la capital de atlantida perdida</p>
            </div>
            <div class="destination-card">
                <img src="Images/lago.jpeg" alt="Lago">
                <h3>Polloqh'eri </h3>
                <p>Conocido como el lago más visitado por su siniestra reputación, Polloqh'eri es temido y admirado como el "lago endemoniado".
                </p>
            </div>
            <!-- Añade más tarjetas de destino según sea necesario -->
        </div>
    </section>
    

    <footer>
        <p> &copy 2024 Pampa Aullagas Turismo. Todos los derechos reservados.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
