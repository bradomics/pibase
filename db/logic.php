<?php

include('config.php');

class db {
    public $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    public function getWeatherZipCode() {
        $stmt = "SELECT weatherZipCode FROM weatherSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $weatherZipCode =  $row['weatherZipCode'];
        }
        return $weatherZipCode;
    }

    public function getTemperatureUnits() {
        $stmt = "SELECT temperatureUnits FROM weatherSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $temperatureUnits =  $row['temperatureUnits'];
        }
        return $temperatureUnits;
    }

    public function getAppName() {
        $stmt = "SELECT appName FROM appSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $appName =  $row['appName'];
        }
        return $appName;
    }


    public function getAppTheme() {
        $stmt = "SELECT theme FROM appSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $theme =  $row['theme'];
        }
        return $theme;
    }

    public function getBackgroundImage() {
        $stmt = "SELECT backgroundImage FROM appSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $backgroundImage =  $row['backgroundImage'];
        }
        return $backgroundImage;
    }

    public function getScreenChangeInterval() {
        $stmt = "SELECT screenChangeInterval FROM appSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $screenChangeInterval =  $row['screenChangeInterval'];
        }
        return $screenChangeInterval;
    }

    public function getCNNSource() {
        $stmt = "SELECT sourceCNN FROM newsSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $cnnSource =  $row['sourceCNN'];
        }
        return $cnnSource;
    }

    public function getCBSSource() {
        $stmt = "SELECT sourceCBS FROM newsSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $cbsSource =  $row['sourceCBS'];
        }
        return $cbsSource;
    }

    public function getNBCSource() {
        $stmt = "SELECT sourceNBC FROM newsSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $nbcSource =  $row['sourceNBC'];
        }
        return $nbcSource;
    }

    public function getFoxSource() {
        $stmt = "SELECT sourceFox FROM newsSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $foxSource =  $row['sourceFox'];
        }
        return $foxSource;
    }

    public function getYahooSource() {
        $stmt = "SELECT sourceYahoo FROM newsSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $yahooSource =  $row['sourceYahoo'];
        }
        return $yahooSource;
    }

    public function showTrendingTwitterTopics() {
        $stmt = "SELECT showTrendingTwitterTopics FROM newsSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $showTrendingTwitterTopics =  $row['showTrendingTwitterTopics'];
        }
        return $showTrendingTwitterTopics;
    }

    public function showTopRedditPosts() {
        $stmt = "SELECT showTopRedditPosts FROM newsSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $showTopRedditPosts =  $row['showTopRedditPosts'];
        }
        return $showTopRedditPosts;
    }

    public function getHomeAddress() {
        $stmt = "SELECT homeAddress FROM mapSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['homeAddress'];
        }
        return $value;
    }

    public function getHomeCity() {
        $stmt = "SELECT homeCity FROM mapSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['homeCity'];
        }
        return $value;
    }

    public function getHomeState() {
        $stmt = "SELECT homeState FROM mapSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['homeState'];
        }
        return $value;
    }

    public function getHomeZip() {
        $stmt = "SELECT homeZip FROM mapSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['homeZip'];
        }
        return $value;
    }

    public function getWorkAddress() {
        $stmt = "SELECT workAddress FROM mapSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['workAddress'];
        }
        return $value;
    }

    public function getWorkCity() {
        $stmt = "SELECT workCity FROM mapSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['workCity'];
        }
        return $value;
    }

    public function getWorkState() {
        $stmt = "SELECT workState FROM mapSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['workState'];
        }
        return $value;
    }

    public function getWorkZip() {
        $stmt = "SELECT workZip FROM mapSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['workZip'];
        }
        return $value;
    }


    public function getTwitterConsumerAPIKey() {
        $stmt = "SELECT twitterConsumerAPIKey FROM apiKeys LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['twitterConsumerAPIKey'];
        }
        return $value;
    }


    public function getTwitterConsumerSecretAPIKey() {
        $stmt = "SELECT twitterConsumerSecretAPIKey FROM apiKeys LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['twitterConsumerSecretAPIKey'];
        }
        return $value;
    }


    public function getTwitterAccessToken() {
        $stmt = "SELECT twitterAccessToken FROM apiKeys LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['twitterAccessToken'];
        }
        return $value;
    }


    public function getTwitterAccessTokenSecret() {
        $stmt = "SELECT twitterAccessTokenSecret FROM apiKeys LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['twitterAccessTokenSecret'];
        }
        return $value;
    }

    public function getGoogleAPIKey() {
        $stmt = "SELECT googleAPIKey FROM apiKeys LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['googleAPIKey'];
        }
        return $value;
    }

    public function getOWMAPIKey() {
        $stmt = "SELECT owmAPIKey FROM apiKeys LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['owmAPIKey'];
        }
        return $value;
    }


    public function getZoomLevel() {
        $stmt = "SELECT zoomLevel FROM mapSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['zoomLevel'];
        }
        return $value;
    }

    public function getTransitMode() {
        $stmt = "SELECT transitMode FROM mapSettings LIMIT 1";
        $query = mysqli_query($this->conn, $stmt);
        while($row = mysqli_fetch_assoc($query)){
            $value = $row['transitMode'];
        }
        return $value;
    }

    public function updateMapSettings($mapSettings) {
        $stmt = "UPDATE mapSettings SET homeAddress = '" . $mapSettings['homeAddress'] . "', ";
        $stmt .= "homeCity = '" . $mapSettings['homeCity'] . "', ";
        $stmt .= "homeState = '" . $mapSettings['homeState'] . "', ";
        $stmt .= "homeZip = '" . $mapSettings['homeZip'] . "', ";
        $stmt .= "workAddress = '" . $mapSettings['workAddress'] . "', ";
        $stmt .= "workCity = '" . $mapSettings['workCity'] . "', ";
        $stmt .= "workState = '" . $mapSettings['workState'] . "', ";
        $stmt .= "workZip = '" . $mapSettings['workZip'] . "', ";
        $stmt .= "transitMode = '" . $mapSettings['transitMode'] . "', ";
        $stmt .= "zoomLevel = '" . $mapSettings['zoomLevel'] . "'";
        $query = mysqli_query($this->conn, $stmt);
        return $query;
    }

    public function updateWeatherSettings($weatherSettings) {
        $stmt = "UPDATE weatherSettings SET weatherZipCode = '" . $weatherSettings['weatherZipCode'] . "', ";
        $stmt .= "temperatureUnits = '" . $weatherSettings['temperatureUnits'] . "'";
        $query = mysqli_query($this->conn, $stmt);
        return $query;
    }

    public function updateNewsSettings($newsSettings) {
        $stmt = "UPDATE newsSettings SET sourceCNN = '" . $newsSettings['sourceCNN'] . "', ";
        $stmt .= "sourceCBS = '" . $newsSettings['sourceCBS'] . "', ";
        $stmt .= "sourceNBC = '" . $newsSettings['sourceNBC'] . "', ";
        $stmt .= "sourceFox = '" . $newsSettings['sourceFox'] . "', ";
        $stmt .= "sourceYahoo = '" . $newsSettings['sourceYahoo'] . "', ";
        $stmt .= "showTrendingTwitterTopics = '" . $newsSettings['showTrendingTwitterTopics'] . "', ";
        $stmt .= "showTopRedditPosts = '" . $newsSettings['showTopRedditPosts'] . "'";
        $query = mysqli_query($this->conn, $stmt);
        return $query;
    }

    public function updateAppSettings($appSettings) {
        $stmt = "UPDATE appSettings SET appName = '" . $appSettings['appName'] . "', ";
        $stmt .= "theme = '" . $appSettings['theme'] . "', ";
        $stmt .= "screenChangeInterval = '" . $appSettings['screenChangeInterval'] . "', ";
        $stmt .= "backgroundImage = '" . $appSettings['backgroundImage'] . "'";
        $query = mysqli_query($this->conn, $stmt);
        return $query;
    }

    public function updateAPISettings($apiSettings) {
        $stmt = "UPDATE apiKeys SET googleAPIKey = '" . $apiSettings['googleAPIKey'] . "', ";
        $stmt .= "owmAPIKey = '" . $apiSettings['owmAPIKey'] . "', ";
        $stmt .= "twitterConsumerAPIKey = '" . $apiSettings['twitterConsumerAPIKey'] . "', ";
        $stmt .= "twitterConsumerSecretAPIKey = '" . $apiSettings['twitterConsumerSecretAPIKey'] . "', ";
        $stmt .= "twitterAccessToken = '" . $apiSettings['twitterAccessToken'] . "', ";
        $stmt .= "twitterAccessTokenSecret = '" . $apiSettings['twitterAccessTokenSecret'] . "'";
        $query = mysqli_query($this->conn, $stmt);;
        return $query;
    }


}

$db = new db($conn);

//$weatherZipCode = $db->getWeatherZipCode();
//echo 'hi! -> ' . $weatherZipCode;
?>