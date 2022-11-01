<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="weather-app">
        <div class="container">
            <h3 class="brand">Clima Tempo</h3>
        </div>
        <h1 class="temp">16&#176</h1>
        <div class="city-time">
            <h1 class="name">São Paulo</h1>
            <small>
                <span class="time">06:09</span>
                -
                <span class="date">
                    Monday November 03
                </span>
            </small>
        </div>
        <div class="weather">
            <img src="./icons/day/113.png"
                class="icon"
                alt="icon"
                width="50"
                height="50"
            />
            <span class="condition">cloudy</span>
        </div>
        <div class="panel">
            <form id="locationInput">
                <input type="text"
                        class="search"
                        placeholder="Procure a cidade que deseja..." 
                        />
                <button type="submit" class="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
    
            <ul class="cities">
                <li class="city">São Paulo</li>
                <li class="city">Rio de Janeiro</li>
                <li class="city">Santos</li>
                <li class="city">Porto Seguro</li>
            </ul>
            <ul class="details">
                <h4>Weather details</h4>
                <li>
                    <span>Cloudy</span>
                    <span class="cloud">89%</span>
                </li>
                <li>
                    <span>Humidity</span>
                    <span class="humidity">64%</span>
                </li>
                <li>
                    <span>Wind</span>
                    <span class="wind">8Km/h</span>
                </li>
            </ul>
            <ul class="footer">
                &copy; Copyright <strong>Vector´s Code</strong>
            </ul>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="main.js"></script> -->
<script>
const app = document.querySelector('.weather-app');
const temp = document.querySelector('.temp');
const dateOutput = document.querySelector('.date');
const timeOutput = document.querySelector('.time');
const conditionOutput = document.querySelector('.condition');
const nameOutput = document.querySelector('.name');
const icon = document.querySelector('.icon');
const cloudOutput = document.querySelector('.cloud');
const humidityOutput = document.querySelector('.humidity');
const windOutput = document.querySelector('.wind');
const form = document.getElementById('locationInput');
const search = document.querySelector('.search');
const btn = document.querySelector('.submit');
const cities = document.querySelectorAll('.city');
const key = '430ae626d73e4360bdf211210223110' 
// Default cities when the page loads
let cityInput = "São Paulo";

// Add click event to each city in the panel
cities.forEach((city) => {
    city.addEventListener('click', (e) => {
        //change from default city to the clicked one
        cityInput = e.target.innerHTML;
        fetchWeatherData();
        app.style.opacity = "0";
    });
})

form.addEventListener('submit', (e) => {
    if(search.value.lenght == 0) {
        alert('Please type in a city name');
    } else {
        cityInput = search.value;
        fetchWeatherData();
        search.value = "";
        app.style.opacity = 0;
}  
e.preventDefault();
});

function dayOfTheWeek(day, month, year){
    const weekday = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday"
    ];

    return weekday[new Date(`${day}/${month}/${year}`).getDay()];
}

function fetchWeatherData(){
    fetch(`http://api.weatherapi.com/v1/current.json?key=${key}&q=${cityInput}`)
    .then(response => response.json())
    .then(data => {
        console.log(data);
        temp.innerHTML = data.current.temp_c + "&#176;";
        conditionOutput.innerHTML = data.current.condition.text;

        const date = data.location.localtime;
        const y = parseInt(date.substr(0,4));
        const m = parseInt(date.substr(5,2));
        const d = parseInt(date.substr(8,2));
        const time = date.substr(11);

        dateOutput.innerHTML = `${dayOfTheWeek(d,m,y)} ${d}, ${m}, ${y}`
        timeOutput.innerHTML = time;

        nameOutput.innerHTML = data.location.name;

        const iconId = data.current.condition.icon.substr(
            "//cdn.weatherapi.com/weather/64x64/".length);

        icon.src = "./icons/" + iconId;

        cloudOutput.innerHTML = data.current.cloud + "%";
        humidityOutput.innerHTML = data.current.humidity + "%";
        windOutput.innerHTML = data.current.wind_kph + "km/h";

        let timeOfDay = "day";

        const code = data.current.condition.code;

        // change to night if its night time in the city

        if(!data.current.is_day){
            timeOfDay = "night";
        }

        if(code == 1000){
            app.style.backgroundImage = `url(./images/night/clear.jpg)`;
            
            btn.style.background = "#e5ba92";
            if(timeOfDay == "night") {
                btn.style.background = "#181e27";
            }
        } else if (
            code == 1003 ||
            code == 1006 ||
            code == 1009 ||
            code == 1030 ||
            code == 1069 ||
            code == 1087 ||
            code == 1135 ||
            code == 1003 ||
            code == 1273 ||
            code == 1276 ||
            code == 1279 ||
            code == 1282 
        ){
            app.style.background = `url(./images/${timeOfDay}/cloudy.jpg)`;
            btn.style.background = "#fa6d1b";
            if(timeOfDay == "night") {
                btn.style.background = "#181e27";
            } 
        }
        else if (
                code == 1063 ||
                code == 1069 ||
                code == 1072 ||
                code == 1150 ||
                code == 1153 ||
                code == 1180 ||
                code == 1183 ||
                code == 1186 ||
                code == 1189 ||
                code == 1192 ||
                code == 1195 ||
                code == 1204 ||
                code == 1207 ||
                code == 1240 ||
                code == 1243 ||
                code == 1246 ||
                code == 1249 ||
                code == 1252          
            ){
                app.style.backgroundImage = `url(./images/${timeOfDay}/rainy.jpg)`;
                btn.style.background = "#647d75";
                if(timeOfDay == "night") {
                    btn.style.background = "#325c80";
                }
             } 
             else {
                    app.style.backgroundImage = `url(./images/${timeOfDay}/snowy.jpg)`;
                    btn.style.background = "#4d72aa";
                    if(timeOfDay == "night") {
                        btn.style.background = "#1b1b1b";
                    }
                }
                app.style.opacity = "1";
            })
            .catch(() => {
                alert('City not found , please try again');
                app.style.opacity = "1";
            });
        }
fetchWeatherData();
app.style.opacity = "1";
</script>
</body>
</html></html>