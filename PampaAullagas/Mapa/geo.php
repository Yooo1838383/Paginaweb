<?php
// Aquí defines tu clave API de Google Maps
$googleMapsApiKey = "AIzaSyBvU5M1nDGavJ6q9qZMFeODLJhGvtPa2WE";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruta a Pampa Aullagas</title>
    <link rel="stylesheet" href="stylesgeo.css">
</head>
<body>
    <h1>Ruta a Pampa Aullagas</h1>
    <div id="map"></div>
    <div id="details"></div>

    <script src="scriptgeo.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $googleMapsApiKey; ?>&libraries=places&callback=initMap" async defer></script>
</body>
</html>
