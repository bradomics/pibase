<?php

include('../db/logic.php');

$googleAPIKey = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['googleAPIKey']));
$owmAPIKey = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['owmAPIKey']));
$twitterConsumerAPIKey = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['twitterConsumerAPIKey']));
$twitterConsumerSecretAPIKey = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['twitterConsumerSecretAPIKey']));
$twitterAccessToken = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['twitterAccessToken']));
$twitterAccessTokenSecret = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['twitterAccessTokenSecret']));

$apiSettings = array();
$apiSettings['googleAPIKey'] = $googleAPIKey;
$apiSettings['owmAPIKey'] = $owmAPIKey;
$apiSettings['twitterConsumerAPIKey'] = $twitterConsumerAPIKey;
$apiSettings['twitterConsumerSecretAPIKey'] = $twitterConsumerSecretAPIKey;
$apiSettings['twitterAccessToken'] = $twitterAccessToken;
$apiSettings['twitterAccessTokenSecret'] = $twitterAccessTokenSecret;
 
if($db->updateAPISettings($apiSettings)){
    echo "API settings updated successfully!";
} else {
    echo "<br /><br/>Yikes, there was a problem updating API settings. Something is probably wrong with the database configuration.";
}

?>