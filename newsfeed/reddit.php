<?php
$url = 'https://www.reddit.com/.rss';

header('Content-Type:text/json');
$myXMLData =  file_get_contents($url);


$xml = simplexml_load_string($myXMLData) or die("Error: Cannot create object");
$json = json_encode($xml);
echo $json;

?>