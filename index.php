<!doctype html>
<html lang="en">
  <?php include('./partials/head.php');  ?>
  <body>
    <?php include('./partials/navbar.php'); ?>

    <main role="main" class="container">

      <div class="starter-template mb-0 pb-0">
        <h1><?php echo $db->getAppName(); ?></h1>
        <p class="lead"><span class="js-commuteTimeText"></span>&nbsp;<span class="js-briefing__currentTemp"></span></p>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card mb-3" id="map"></div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-sm-12 col-md-6 col-lg-4 my-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Today</h5>
              <h6 class="card-subtitle mb-2 text-muted">Current Conditions</h6>
              <div class="weatherContainer my-4">
                <div class="weatherContainer__group">
                  <i class="weatherContainer__icon mb-3" data-feather="moon"></i>
                  <div class="weatherContainer__main text-center"></div>
                  <div class="weatherContainer__description text-center"></div>
                </div>
              </div>
              <div class="tempContainer">
                <div class="temp__flexGroup">
                  <p class="tempContainer__tempLabel">Current</p>
                  <p class="tempContainer__currentTemp"></p>
                </div>
                <div class="temp__flexGroup">
                  <p class="tempContainer__tempLabel">Lo</p>
                  <p class="tempContainer__low"></p>
                </div>
                <div class="temp__flexGroup">
                  <p class="tempContainer__tempLabel">Hi</p>
                  <p class="tempContainer__high"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 my-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tomorrow</h5>
              <h6 class="card-subtitle mb-2 text-muted">Forecast</h6>
              <div class="weatherContainer my-4">
                <div class="weatherContainer__group">
                  <i class="weatherContainer__icon--tomorrow mb-3" data-feather="moon"></i>
                  <div class="weatherContainer__main--tomorrow text-center"></div>
                  <div class="weatherContainer__description--tomorrow text-center"></div>
                </div>
              </div>
              <div class="tempContainer--future">
                <div class="temp__flexGroup">
                  <p class="tempContainer__tempLabel text-center">Lo</p>
                  <p class="tempContainer__low--tomorrow"></p>
                </div>
                <div class="temp__flexGroup">
                  <p class="tempContainer__tempLabel text-center">Hi</p>
                  <p class="tempContainer__high--tomorrow"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 my-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title js-twoDaysFromNow"></h5>
              <h6 class="card-subtitle mb-2 text-muted">Forecast</h6>
              <div class="weatherContainer my-4">
                <div class="weatherContainer__group">
                  <i class="weatherContainer__icon--twoDays mb-3" data-feather="moon"></i>
                  <div class="weatherContainer__main--twoDays text-center"></div>
                  <div class="weatherContainer__description--twoDays text-center"></div>
                </div>
              </div>
              <div class="tempContainer--future">
                <div class="temp__flexGroup">
                  <p class="tempContainer__tempLabel text-center">Lo</p>
                  <p class="tempContainer__low--twoDays"></p>
                </div>
                <div class="temp__flexGroup">
                  <p class="tempContainer__tempLabel text-center">Hi</p>
                  <p class="tempContainer__high--twoDays"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>

    </main><!-- /.container -->

    <style>
    #map {
      height: 600px;
    }
    .weatherContainer {
      display: flex;
      justify-content: center;
    }
    .weatherContainer__group {
      align-items: center;
      display: flex;
      flex-direction: column;
    }
    .weatherContainer__description, 
    .weatherContainer__description--tomorrow,
    .weatherContainer__description--twoDays {
      text-transform: capitalize;
    }
    .tempContainer,
    .tempContainer--future {
      display: flex;
      justify-content: space-between;
    }
    .tempContainer--future {
      max-width: 45%;
      margin: 0 auto;
    }
    .temp__flexGroup {
      display: flex;
      flex-direction: column;
    }
    .tempContainer__tempLabel {
      text-align: center;
    }
    .weatherContainer__icon,
    .weatherContainer__icon--tomorrow,
    .weatherContainer__icon--twoDays {
      height: 56px;
      width: 56px;
    }
    </style>
    <?php include('./partials/javascript.php'); ?>
    <script>
      var map;
      var coordsArray = []
      var numCallbacks = 0
      function initMap() {
        geocoder = new google.maps.Geocoder();
        getHomeCoordinates();
        getWorkCoordinates();
      }

      function initialize() {
        geocoder = new google.maps.Geocoder();
        getHomeCoordinates();
        getWorkCoordinates()
      }

    function getHomeCoordinates() {
        var latlng = new google.maps.Geocoder();
        var geocoder = new google.maps.Geocoder();
        var homeAddress = '<?php echo $db->getHomeAddress(); ?>';
        var homeCity = '<?php echo $db->getHomeCity(); ?>';
        var homeState = '<?php echo $db->getHomeState(); ?>';
        var fullHomeAddress = homeAddress + ', ' + homeCity + ', ' + homeState + ', United States';

        if (geocoder) {
            geocoder.geocode({'address': fullHomeAddress}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            coordsArray.push(results[0].geometry.location.lat())
                            coordsArray.push(results[0].geometry.location.lng())
                            numCallbacks = numCallbacks + 1
                            initContinued();
                        } else {
                            alert("No results found");
                        }
                    } else {
                        alert("Geocoder failed due to: " + status);
                    }
            });
        }
    }

    function getWorkCoordinates() {
        var latlng = new google.maps.Geocoder();
        var geocoder = new google.maps.Geocoder();
        var workAddress = '<?php echo $db->getWorkAddress(); ?>';
        var workCity = '<?php echo $db->getWorkCity(); ?>';
        var workState = '<?php echo $db->getWorkState(); ?>';
        var fullWorkAddress = workAddress + ', ' + workCity + ', ' + workState + ', United States';

        if (geocoder) {
            geocoder.geocode({'address': fullWorkAddress}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            coordsArray.push(results[0].geometry.location.lat())
                            coordsArray.push(results[0].geometry.location.lng())
                            numCallbacks = numCallbacks + 1
                            initContinued();
                        } else {
                            alert("No results found");
                        }
                    } else {
                        alert("Geocoder failed due to: " + status);
                    }
            });
          }
    }

    function initContinued() {
      if(numCallbacks == 2){
        homeLat = coordsArray[0];
        homeLng = coordsArray[1];
        workLat = coordsArray[2];
        workLng = coordsArray[3];

        latMidPoint = (homeLat + workLat) / 2;
        lngMidPoint = (homeLng + workLng) / 2;
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: {
            lat: latMidPoint,
            lng: lngMidPoint
          },
          zoom: <?php echo $db->getZoomLevel(); ?>,
          <?php 
          if($db->getAppTheme() === 'dark' || $db->getAppTheme() === 'hacker' || $db->getAppTheme() === 'energy'){
          ?>
          styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ]
          <?php
          }
          ?>
        });

        var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);
        $.ajax({
          url: 'endpoints/getCommuteTime.php?origin=' + homeLat + ',' + homeLng + '&destination=' + workLat + ',' + workLng + '&transitMode=' + '<?php echo $db->getTransitMode(); ?>',
          method: 'get',
          success: function(data){
            $('.js-commuteTimeText').html('Estimated commute: <strong>' + data.rows[0].elements[0].duration.text + '</strong>.')
          },
          error: function(){
            console.log('error!')
          }
        })

      }
    }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $db->getGoogleAPIKey(); ?>&callback=initMap"
    async defer></script>
    <?php include('./partials/javascriptUtils.php'); ?>
    <script>
      var objToday = new Date(),
        weekday = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
        dayOfWeek = weekday[objToday.getDay()],
        domEnder = function() { var a = objToday; if (/1/.test(parseInt((a + "").charAt(0)))) return "th"; a = parseInt((a + "").charAt(1)); return 1 == a ? "st" : 2 == a ? "nd" : 3 == a ? "rd" : "th" }(),
        dayOfMonth = today + ( objToday.getDate() < 10) ? '0' + objToday.getDate() + domEnder : objToday.getDate() + domEnder,
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
        curMonth = months[objToday.getMonth()],
        curYear = objToday.getFullYear(),
        curHour = objToday.getHours() > 12 ? objToday.getHours() - 12 : (objToday.getHours() < 10 ? "0" + objToday.getHours() : objToday.getHours()),
        curMinute = objToday.getMinutes() < 10 ? "0" + objToday.getMinutes() : objToday.getMinutes(),
        curSeconds = objToday.getSeconds() < 10 ? "0" + objToday.getSeconds() : objToday.getSeconds(),
        curMeridiem = objToday.getHours() > 12 ? "PM" : "AM";
      var today = dayOfWeek + ", " + curMonth + " " + dayOfMonth + ", " + curYear;
      var twoDaysFromNow = weekday[objToday.getDay() + 2]
      $('.js-twoDaysFromNow').html(twoDaysFromNow)
      document.getElementsByTagName('h1')[0].textContent = today;

      function gettingJSON(){
          $.getJSON("http://api.openweathermap.org/data/2.5/weather?zip=<?php echo $db->getWeatherZipCode(); ?>,us&units=<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'metric' : 'imperial'; ?>&APPID=<?php echo $db->getOWMAPIKey(); ?>",function(json){
              $('.tempContainer__currentTemp').html(json.main.temp + '&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?>')
              $('.tempContainer__low').html(json.main.temp_min + '&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?>')
              $('.tempContainer__high').html(json.main.temp_max + '&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?>')

              $('.weatherContainer__main').html(json.weather[0].main)
              $('.weatherContainer__description').html(json.weather[0].description)
              var conditionText = getConditionText(json.weather[0].main)
              $('.js-briefing__currentTemp').html("It's currently <strong>" + json.main.temp + "&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?></strong> " + conditionText)
              getIcon(json.weather[0].main, 'weatherContainer__icon', true)
          });

          $.getJSON("http://api.openweathermap.org/data/2.5/forecast?zip=<?php echo $db->getWeatherZipCode(); ?>,us&units=<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'metric' : 'imperial'; ?>&APPID=<?php echo $db->getOWMAPIKey(); ?>",function(json){

              $('.weatherContainer__main--tomorrow').html(json.list[2].weather[0].main)
              $('.weatherContainer__description--tomorrow').html(json.list[2].weather[0].description)
              getIcon(json.list[2].weather[0].main, 'weatherContainer__icon--tomorrow', false)
              $('.tempContainer__low--tomorrow').html(json.list[2].main.temp_min + '&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?>')
              $('.tempContainer__high--tomorrow').html(json.list[2].main.temp_max + '&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?>')

              $('.weatherContainer__main--twoDays').html(json.list[10].weather[0].main)
              $('.weatherContainer__description--twoDays').html(json.list[10].weather[0].description)
              getIcon(json.list[10].weather[0].main, 'weatherContainer__icon--twoDays', false)
              $('.tempContainer__low--twoDays').html(json.list[10].main.temp_min + '&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?>')
              $('.tempContainer__high--twoDays').html(json.list[10].main.temp_max + '&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?>')

          });
      }
      gettingJSON()
    </script>       
  </body>
</html>
