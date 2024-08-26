function initMap() {
    // Coordenadas de Pampa Aullagas
    const destination = { lat: -19.196305997053077, lng: -67.06179906686899 };

    // Crear el mapa centrado en el destino
    const map = new google.maps.Map(document.getElementById("map"), {//inicializa el mapa
        center: destination,
        zoom: 10,
    });

    // Solicitar la ubicación del usuario
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((position) => {
            const userLocation = {//almacena usurio
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };

            // Dibujar la ruta
            const directionsService = new google.maps.DirectionsService();//Se usa para calcular rutas.
            const directionsRenderer = new google.maps.DirectionsRenderer();//Se usa para mostrar la ruta en el mapa.
            directionsRenderer.setMap(map);

            const request = {//define detalles de la ruta
                origin: userLocation,
                destination: destination,
                travelMode: 'DRIVING',
            };

            directionsService.route(request, function (result, status) {
                if (status == 'OK') {
                    directionsRenderer.setDirections(result);

                    // Mostrar detalles de la ruta
                    const route = result.routes[0].legs[0];//Accede al primer segmento de la ruta. //guarga +los detalles en un html
                    document.getElementById('details').innerHTML = `
                        <p>Distancia: ${route.distance.text}</p>
                        <p>Tiempo estimado de llegada: ${route.duration.text}</p>
                    `;
                }
            });
        }, () => {
            alert("No se pudo obtener la ubicación");
        });
    } else {
        alert("El navegador no soporta Geolocation");
    }
}
