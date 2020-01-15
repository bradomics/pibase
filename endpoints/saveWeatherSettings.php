<?php

include('../db/logic.php');

$weatherZipCode = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['weatherZipCode']));
$temperatureUnits = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['temperatureUnits']));

$weatherSettings = array();
$weatherSettings['weatherZipCode'] = $weatherZipCode;
$weatherSettings['temperatureUnits'] = $temperatureUnits;

if($db->updateWeatherSettings($weatherSettings)){
    echo "Weather settings updated successfully!";
} else {
    echo "Yikes, there was a problem updating weather settings. Something is probably wrong with the database configuration.";
}

?>