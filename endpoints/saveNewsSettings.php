<?php

include('../db/logic.php');

$sourceCNN = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['sourceCNN']));
$sourceCBS = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['sourceCBS']));
$sourceNBC = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['sourceNBC']));
$sourceFox = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['sourceFox']));
$sourceYahoo = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['sourceYahoo']));
$showTrendingTwitterTopics = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['showTrendingTwitterTopics']));
$showTopRedditPosts = mysqli_real_escape_string($db->conn, htmlspecialchars($_POST['showTopRedditPosts']));

$newsSettings = array();
$newsSettings['sourceCNN'] = $sourceCNN;
$newsSettings['sourceCBS'] = $sourceCBS;
$newsSettings['sourceNBC'] = $sourceNBC;
$newsSettings['sourceFox'] = $sourceFox;
$newsSettings['sourceYahoo'] = $sourceYahoo;
$newsSettings['showTrendingTwitterTopics'] = $showTrendingTwitterTopics;
$newsSettings['showTopRedditPosts'] = $showTopRedditPosts;

if($db->updateNewsSettings($newsSettings)){
    echo "Newsfeed settings updated successfully!";
} else {
    echo "Yikes, there was a problem updating newsfeed settings. Something is probably wrong with the database configuration.";
}

?>