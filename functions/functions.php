<?php

error_reporting(E_ERROR | E_PARSE);

function getWeather($location) {
    $api_key = "YOUR WEATHERAPI KEY HERE";
    $url = "http://api.weatherapi.com/v1/current.json?key=$api_key&q=$location";

    try {
        $response = file_get_contents($url);
        
        if (strpos($response, '400') !== false) {
            return false;
        }

        $data = json_decode($response, true);

        if (isset($data['error'])) {
            return false;
        }

        if (!isset($data['current']['temp_c']) || !isset($data['current']['humidity']) || !isset($data['current']['wind_kph']) || !isset($data['current']['condition']['text'])) {
            return false;
        }

        $weather_data = array(
            'temperature' => $data['current']['temp_c'],
            'humidity' => $data['current']['humidity'],
            'wind_speed' => $data['current']['wind_kph'],
            'condition' => $data['current']['condition']['text']
        );

        return $weather_data;
    } catch (Exception $e) {
        return false;
    }
}

?>
