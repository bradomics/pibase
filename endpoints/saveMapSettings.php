<?php

include('../db/logic.php');

$homeAddress = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['homeAddress']));
$homeCity = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['homeCity']));
$homeState = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['homeState']));
$homeZip = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['homeZip']));
$workAddress = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['workAddress']));
$workCity = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['workCity']));
$workState = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['workState']));
$workZip = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['workZip']));
$zoomLevel = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['zoomLevel']));
$transitMode = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['transitMode']));


$mapSettings = array();
$mapSettings['homeAddress'] = $homeAddress;
$mapSettings['homeCity'] = $homeCity;
$mapSettings['homeState'] = $homeState;
$mapSettings['homeZip'] = $homeZip;
$mapSettings['workAddress'] = $workAddress;
$mapSettings['workCity'] = $workCity;
$mapSettings['workState'] = $workState;
$mapSettings['workZip'] = $workZip;
$mapSettings['zoomLevel'] = $zoomLevel;
$mapSettings['transitMode'] = $transitMode;

if($db->updateMapSettings($mapSettings)){
    echo "Map settings updated successfully!";
} else {
    echo "Yikes, there was a problem updating map settings. Something is probably wrong with the database configuration.";
}

?>