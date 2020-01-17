<?php

include('../db/logic.php');

$appName = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['appName']));
$theme = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['theme']));
$backgroundImage = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['backgroundImage']));
$screenChangeInterval = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['screenChangeInterval']));

$appSettings = array();
$appSettings['appName'] = $appName;
$appSettings['theme'] = $theme;
$appSettings['backgroundImage'] = $backgroundImage;
$appSettings['screenChangeInterval'] = $screenChangeInterval;

if($db->updateAppSettings($appSettings)){
    echo "App settings updated successfully!";
} else {
    echo "Yikes, there was a problem updating app settings. Something is probably wrong with the database configuration.";
}

?>