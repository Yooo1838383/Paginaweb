function initMap() {
    // Coordenadas de Pampa Aullagas
    var pampaAullagas = { lat: -19.19603645597956, lng: -67.06179046317342 };

    // Crear el mapa centrado en Pampa Aullagas
    var map = new google.maps.Map(document.getElementById('map'), {
        center: pampaAullagas,
        zoom: 18
    });

    // Marcar Pampa Aullagas
    var marker = new google.maps.Marker({
        position: pampaAullagas,
        map: map,
        title: 'Pampa Aullagas'
    });
}

function showRoutes() {

     
    alert('Funcionalidad de mostrar rutas aún no implementada.');
}

function addStop() {
  
    alert('Funcionalidad de agregar paradas aún no implementada.');
}

function markTouristSpots() {
 
    alert('Funcionalidad de marcar lugares turísticos aún no implementada.');
}

function calculateArrivalTime() {
   
    alert('Funcionalidad de calcular el tiempo de llegada aún no implementada.');
}
