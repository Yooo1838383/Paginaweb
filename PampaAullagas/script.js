function redireccionar(url) {
    window.location.href = url;
}


const latitude = -19.6808; // Latitud de Pampa Aullagas
const longitude = -67.6211; // Longitud de Pampa Aullagas
const url = `https://api.open-meteo.com/v1/forecast?latitude=${latitude}&longitude=${longitude}&current_weather=true&timezone=America/La_Paz`;

function fetchWeather() {
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const weatherContainer = document.getElementById('weather');
            const temperature = data.current_weather.temperature;
            const weatherDescription = data.current_weather.weathercode;

            // Puedes mapear el weathercode a una descripción más amigable
            const weatherDescriptions = {
                0: "Despejado",
                1: "Mayormente despejado",
                2: "Parcialmente nublado",
                3: "Nublado",
                45: "Neblina",
                48: "Neblina escarchada",
                51: "Llovizna ligera",
                53: "Llovizna moderada",
                55: "Llovizna densa",
                61: "Lluvia ligera",
                63: "Lluvia moderada",
                65: "Lluvia intensa",
                71: "Nieve ligera",
                73: "Nieve moderada",
                75: "Nieve intensa",
                80: "Chubascos ligeros",
                81: "Chubascos moderados",
                82: "Chubascos intensos",
                95: "Tormenta ligera",
                99: "Tormenta con granizo"
            };

            const description = weatherDescriptions[weatherDescription] || "No disponible";

            weatherContainer.innerHTML = `
                <div>
                    <p>Pampa Aullagas</p>
                    <p>${temperature}°C, ${description}</p>
                </div>
            `;
        })
        .catch(error => console.log('Error fetching weather data:', error));
}

document.addEventListener('DOMContentLoaded', fetchWeather);

