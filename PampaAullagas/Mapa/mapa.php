<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Pampa Aullagas</title>
    <link rel="stylesheet" href="stylesmapa.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h1>¿Cómo llegar?</h1>
            <div class="buttons">
            <li><a href="geo.php">Rutas</a> </li>
                <button onclick="addStop()">Paradas (colocar puntos en el mapa)</button>
                <button onclick="markTouristSpots()">Señalizar los lugares turísticos</button>
                <button onclick="calculateArrivalTime()">Calcular el tiempo de llegada en el mapa</button>
            </div>
        </div>
        <div id="map"></div>
    </div>
    <script src="scriptmapa.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvU5M1nDGavJ6q9qZMFeODLJhGvtPa2WE&callback=initMap">
    </script>
</body>
</html>

