<!doctype html>
<html lang="en">
  <?php include('./partials/head.php');  ?>
  <body>

    <?php include('./partials/navbar.php'); ?>

    <main role="main" class="container">

      <div class="starter-template mb-0 pb-0">
        <h1>5-day forecast for Austin, Texas</h1>
        <p class="lead"><span class="js-briefing__currentTemp"></span></p>
      </div>
      <div class="row mb-5">
        <?php
        for($i = 0; $i < 5; $i++) {
        ?>
        <div class="col-sm-12 col-md-12 col-lg-12 my-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title js-dayOfWeek"></h5>
              <h6 class="js-forecastDate card-subtitle mb-2 text-muted">12/30/2019</h6>
              <div class="weatherContainer my-4 pl-5 pr-5">
                <?php
                 for($j = 0; $j < 8; $j++){
                     ?>
                        <div class="weatherContainer__group">
                            <i class="weatherContainer__icon--forecast js-icon-day<?php echo $i; ?>-hr<?php echo $j; ?> mb-3" data-feather="moon"></i>
                            <div style="display:none" class="js-weatherMain-day<?php echo $i; ?>-hr<?php echo $j; ?> weatherContainer__main--forecast text-center"></div>
                            <div class="js-weatherDescription-day<?php echo $i; ?>-hr<?php echo $j; ?> weatherContainer__description--forecast text-center"></div>
                            <div class="timeLabel my-4 js-timeLabel-day<?php echo $i; ?>-hr<?php echo $j; ?> "></div>
                            <div class="tempLabel">Temp.</div>
                            <div class="js-temp-day<?php echo $i; ?>-hr<?php echo $j; ?>"></div>
                        </div>
                     <?php
                 }
                ?>
              </div>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
        </div>
      </div>

    </main><!-- /.container -->

    <style>
    .weatherContainer {
      display: flex;
      justify-content: space-between;
    }
    .weatherContainer__group {
      align-items: center;
      display: flex;
      flex-direction: column;
    }
    .weatherContainer__description, 
    .weatherContainer__description--tomorrow,
    .weatherContainer__description--forecast {
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
    .weatherContainer__icon,
    .weatherContainer__icon--tomorrow,
    .weatherContainer__icon--forecast {
      height: 56px;
      width: 56px;
    }
    </style>

    <?php include('./partials/javascript.php'); ?>
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
      $('.js-dayOfWeek').each(function(index, object){
        $(this).html(weekday[objToday.getDay() + (index)])
      })

      function getWeather(dates){
          $.getJSON("http://api.openweathermap.org/data/2.5/weather?zip=<?php echo $db->getWeatherZipCode(); ?>,us&units=<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'metric' : 'imperial'; ?>&APPID=<?php echo $db->getOWMAPIKey(); ?>",function(json){
              var conditionText = getConditionText(json.weather[0].main)
              $('.js-briefing__currentTemp').html("It's currently <strong>" + json.main.temp + "&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?></strong> " + conditionText)

          });

          $.getJSON("http://api.openweathermap.org/data/2.5/forecast?zip=<?php echo $db->getWeatherZipCode(); ?>,us&units=<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'metric' : 'imperial'; ?>&APPID=<?php echo $db->getOWMAPIKey(); ?>", function(json){
              json.list.forEach(function (item, index) {
                if(index < 8){
                    $('.js-weatherMain-day0-hr'+ index).html(json.list[index].weather[0].main)
                    $('.js-weatherDescription-day0-hr'+ index).html(json.list[index].weather[0].description)
                    $('.js-timeLabel-day0-hr'+ index).html(formatDate(item.dt_txt))
                    
                    getIcon(json.list[index].weather[0].main, 'js-icon-day0-hr' + index, false)
                    $('.js-temp-day0-hr'+ index).html(json.list[index].main.temp + '&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?>')
                    
                } else if(index >= 8 && index < 16){

                    $('.js-weatherMain-day1-hr'+ (index - (1 * 8))).html(json.list[index].weather[0].main)
                    $('.js-weatherDescription-day1-hr'+ (index - (1 * 8))).html(json.list[index].weather[0].description)
                    getIcon(json.list[index].weather[0].main, 'js-icon-day1-hr'+ (index - (1 * 8)), false)
                    $('.js-temp-day1-hr'+ (index - (1 * 8))).html(json.list[index].main.temp + '&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?>')
                    $('.js-timeLabel-day1-hr'+ (index - (1 * 8))).html(formatDate(item.dt_txt))

                } else if(index >= 16 && index < 24){

                    $('.js-weatherMain-day2-hr'+ (index - (2 * 8))).html(json.list[index].weather[0].main)
                    $('.js-weatherDescription-day2-hr'+ (index - (2 * 8))).html(json.list[index].weather[0].description)
                    getIcon(json.list[index].weather[0].main, 'js-icon-day2-hr'+ (index - (2 * 8)), false)
                    $('.js-temp-day2-hr'+ (index - (2 * 8))).html(json.list[index].main.temp + '&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?>')
                    $('.js-timeLabel-day2-hr'+ (index - (2 * 8))).html(formatDate(item.dt_txt))

                } else if(index >= 24 && index < 32){
                    $('.js-weatherMain-day3-hr'+ (index - (3 * 8))).html(json.list[index].weather[0].main)
                    $('.js-weatherDescription-day3-hr'+ (index - (3 * 8))).html(json.list[index].weather[0].description)
                    getIcon(json.list[index].weather[0].main, 'js-icon-day3-hr'+ (index - (3 * 8)), false)
                    $('.js-temp-day3-hr'+ (index - (3 * 8))).html(json.list[index].main.temp + '&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?>')
                    $('.js-timeLabel-day3-hr'+  (index - (3 * 8))).html(formatDate(item.dt_txt))

                } else if(index >= 32 && index <= 39){
                    $('.js-weatherMain-day4-hr'+ (index - (4 * 8))).html(json.list[index].weather[0].main)
                    $('.js-weatherDescription-day4-hr'+ (index - (4 * 8))).html(json.list[index].weather[0].description)
                    getIcon(json.list[index].weather[0].main, 'js-icon-day4-hr'+ (index - (4 * 8)), false)
                    $('.js-temp-day4-hr'+ (index - (4 * 8))).html(json.list[index].main.temp + '&nbsp;°<?php echo $db->getTemperatureUnits() === 'Celsius' ? 'C' : 'F'; ?>')
                    $('.js-timeLabel-day4-hr'+  (index - (4 * 8))).html(formatDate(item.dt_txt))                                          
                }
              });
          });
      }


      var days = 5
      var date = new Date()
      var isoString = date.toISOString()
      var cleanDate = isoString.substring(0, isoString.indexOf('T'))

      dates = getCleanDates(7)
      getWeather(dates)

      $('.js-forecastDate').each(function(index, item){
          $('.js-forecastDate')[index].innerHTML = dates[index]
      })
    </script>
  </body>
</html>
