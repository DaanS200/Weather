<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f24b0c19a4.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./style/style.css">

    <title>How is the weather in ? </title>
</head>

<body>

    <div class="inputField">
        <form action="" method="POST">
            <input type="text" name="city" required="required" placeholder="Enter City Name">
            <input type="submit" name="submit" value="Submit">
        </form>

    <?php

    include 'functions/functions.php';

    if (isset($_POST['submit'])) {
        $location = $_POST['city'];
        $weather_data = getWeather($location);

        if ($weather_data !== false) {
            echo '
                <div class="weatherData">
                <span><i class="fa-solid fa-location-dot"></i><div class="data"><a href="https://www.google.com/maps/search/' . $location . '" target="_blank">' . $location . '</a></div></span>
                <span><i class="fa-solid fa-cloud"></i><div class="data">' . $weather_data['temperature'] . '°C</div></span>
                <span><i class="fa-solid fa-droplet"></i><div class="data">' . $weather_data['humidity'] . '%</div></span>
                <span><i class="fa-solid fa-wind"></i><div class="data">' . $weather_data['wind_speed'] . 'km/h</div></span>
                <span><i class="fa-solid fa-cloud"></i><div class="data">' . $weather_data['condition'] . '</div></span>
                </div>
            ';
        } else {
            echo '<div class="error">City not found!</div>';
        }
    }

    ?>
    </div>
</body>

</html>
