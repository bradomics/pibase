
<?php
$origin = $_GET['origin'];
$destination = $_GET['destination'];
$transitMode = $_GET['transitMode'];

$url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=' . $origin . '&destinations=' . $destination . '&mode=' . $transitMode . '&key=AIzaSyCGWpllv-Zt9qGjyH-Jl-CHH47q2M1B6Bw';

header('Content-Type:text/json');
$json = file_get_contents($url);
echo $json;

?>

