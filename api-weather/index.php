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
<!-- <script type="text/javascript" src="main.js"></script>
<?
include "main.js"; // ou a extensão que for
?>
  -->
</body>
</html></html>