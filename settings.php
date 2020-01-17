<!doctype html>
<html lang="en">
  <?php include('./partials/head.php');  ?>
  <body>
    <?php include('./partials/navbar.php'); ?>
    <main role="main" class="container">
      <div class="starter-template mb-0 pb-0">
        <h1>Settings</h1>
      </div>
      <div class="row">
        <div class="col-lg-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Map</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Weather</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="app-tab" data-toggle="tab" href="#app" role="tab" aria-controls="app" aria-selected="false">App</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="api-tab" data-toggle="tab" href="#api" role="tab" aria-controls="api" aria-selected="false">API Keys</a>
          </li>
        </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 mt-3">
          <div class="js-settingsNotificationContainer alert alert-success alert-dismissible fade show mb-3" role="alert" style="display:none">
            <strong class="js-settingsNotification">Settings updated successfully!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <form class="js-mapSettingsForm">
          <div class="row">
              <div class="col-lg-6">
              <h3>Home Address</h3>
              <div class="card">
                <div class="card-body">
                  <label class="mb-0">Address:</label>
                  <input type="text" class="form-control mb-3" name="homeAddress" placeholder="123 Main St." value="<?php echo $db->getHomeAddress(); ?>"/>
                  <label class="mb-0">City:</label>
                  <input type="text" class="form-control mb-3" name="homeCity" placeholder="Austin" value="<?php echo $db->getHomeCity(); ?>"/>
                  <label class="mb-0">State:</label>
                  <input type="text" class="form-control mb-3" name="homeState" placeholder="TX" value="<?php echo $db->getHomeState(); ?>"/>
                  <label class="mb-0">Zip:</label>
                  <input type="text" class="form-control mb-3" name="homeZip" placeholder="78704" value="<?php echo $db->getHomeZip(); ?>"/>
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col-lg-4 -->
            <div class="col-lg-6">
              <h3>Work Address</h3>
              <div class="card">
                <div class="card-body">
                  <label class="mb-0">Address:</label>
                  <input type="text" class="form-control mb-3" name="workAddress" placeholder="123 Main St." value="<?php echo $db->getWorkAddress(); ?>"/>
                  <label class="mb-0">City:</label>
                  <input type="text" class="form-control mb-3" name="workCity" placeholder="Austin" value="<?php echo $db->getWorkCity(); ?>"/>
                  <label class="mb-0">State:</label>
                  <input type="text" class="form-control mb-3" name="workState" placeholder="TX" value="<?php echo $db->getWorkState(); ?>"/>
                  <label class="mb-0">Zip:</label>
                  <input type="text" class="form-control mb-3" name="workZip" placeholder="78704" value="<?php echo $db->getWorkZip(); ?>"/>
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col-lg-4 -->
            </div><!-- row -->
            <div class="row mt-3">
              <div class="col-lg-6">
              <h3>Map Settings</h3>
              <div class="card">
                <div class="card-body">
                  <label class="mb-0">Zoom level:</label>
                  <input type="text" class="form-control mb-3" name="zoomLevel" placeholder="14" value="<?php echo $db->getZoomLevel(); ?>"/>
                  <label class="mb-0">Transit mode:</label>
                  <select class="form-control mb-3" name="transitMode">
                    <option value="driving" <?php echo $db->getTransitMode() === 'driving' ? 'selected' : ''; ?>>Driving (default)</option>
                    <option value="bicycling" <?php echo $db->getTransitMode() === 'bicycling' ? 'selected' : ''; ?>>Bicycling</option>
                    <option value="walking" <?php echo $db->getTransitMode() === 'walking' ? 'selected' : ''; ?>>Walking</option>
                  </select>
                </div><!-- card-body -->
              </div><!-- card -->
              <button type="button" class="btn btn-primary js-saveMapSettings mt-3 mb-5">Save</button>
            </div><!-- col-lg-4 -->
            </div><!-- row -->
            </form>
          </div>

          
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form class="js-weatherSettingsForm">
            <div class="row">
              <div class="col-lg-6">
              <h3>Weather</h3>
              <div class="card">
                <div class="card-body">
                  <label class="mb-0">Get weather for zip code:</label>
                  <input type="text" class="form-control mb-3" name="weatherZipCode" placeholder="78704" value="<?php echo $db->getWeatherZipCode(); ?>"/>
                  <label class="mb-0">Display temerature in:</label>
                  <select class="form-control" name="temperatureUnits">
                    <option value="Fahrenheit" <?php echo $db->getTemperatureUnits() === 'Fahrenheit' ? 'selected' : ''; ?>>Fahrenheit</option>
                    <option value="Celsius" <?php echo $db->getTemperatureUnits() === 'Celsius' ? 'selected' : ''; ?>>Celsius</option>
                  </select>
                </div><!-- card-body -->
              </div><!-- card -->
              <button type="button" class="btn btn-primary js-saveWeatherSettings mt-3">Save</button>
              </div><!-- col-lg-4 -->
            </div><!-- row -->
            </form>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <form class="js-newsSettingsForm">
            <div class="row">
              <div class="col-lg-6">
              <h3>World News</h3>
              <div class="card">

                <div class="card-body">
                  <h5 class="mb-3">Source newsfeed from:</h5>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" name="sourceCNN" id="sourceCNN" <?php echo $db->getCNNSource() === 'true' ? 'checked': ''; ?>>
                    <label class="form-check-label" for="sourceCNN">
                      CNN
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" name="sourceCBS" id="sourceCBS" <?php echo $db->getCBSSource() === 'true' ? 'checked': ''; ?>>
                    <label class="form-check-label" for="sourceCBS">
                      CBS
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" name="sourceNBC" id="sourceNBC" <?php echo $db->getNBCSource() === 'true' ? 'checked': ''; ?>>
                    <label class="form-check-label" for="sourceNBC">
                      NBC
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" name="sourceFox" id="sourceFox" <?php echo $db->getFoxSource() === 'true' ? 'checked': ''; ?>>
                    <label class="form-check-label" for="sourceFox">
                      Fox
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" name="sourceYahoo" id="sourceYahoo" <?php echo $db->getYahooSource() === 'true' ? 'checked': ''; ?>>
                    <label class="form-check-label" for="sourceYahoo">
                      Yahoo
                    </label>
                  </div>
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col-lg-4 -->
            <div class="col-lg-6">
              <h3>Social Media</h3>
              <div class="card">
                <div class="card-body">
                  <h5 class="mb-3">Display Tickers from:</h5>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" name="showTrendingTwitterTopics"  id="showTrendingTwitterTopics" <?php echo $db->showTrendingTwitterTopics() === 'true' ? 'checked': ''; ?>>
                    <label class="form-check-label" for="showTrendingTwitterTopics">
                      Twitter
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" name="showTopRedditPosts" id="showTopRedditPosts" <?php echo $db->showTopRedditPosts() === 'true' ? 'checked': ''; ?>>
                    <label class="form-check-label" for="showTopRedditPosts">
                      Reddit
                    </label>
                  </div>
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col-lg-4 -->
            </div><!-- row -->
            <button type="button" class="btn btn-primary js-saveNewsSettings mt-3">Save</button>
            </form>
          </div>
          <div class="tab-pane fade" id="app" role="tabpanel" aria-labelledby="app-tab">
            <form class="js-appSettingsForm">
            <div class="row">
              <div class="col-lg-6">
              <h3>Preferences</h3>
              <div class="card">
                <div class="card-body">
                  <label class="mb-0">App name:</label>
                  <input type="text" class="form-control mb-3" name="appName" placeholder="PiBase" value="<?php echo $db->getAppName(); ?>" />
                  <label class="mb-0">Theme:</label>
                  <select class="form-control mb-3" name="theme">
                    <option value="light" <?php echo $db->getAppTheme() === 'light' ? 'selected': ''; ?>>Light (default)</option>
                    <option value="dark" <?php echo $db->getAppTheme() === 'dark' ? 'selected': ''; ?>>Dark</option>
                    <option value="hacker" <?php echo $db->getAppTheme() === 'hacker' ? 'selected': ''; ?>>Hacker</option>
                    <option value="energy" <?php echo $db->getAppTheme() === 'energy' ? 'selected': ''; ?>>Energy</option>
                  </select>
                <label class="mb-0">Screen change interval (minutes):</label>
                  <input type="number" class="form-control mb-3" name="screenChangeInterval" placeholder="Set to 0 to disable automatic screen change" value="<?php echo $db->getScreenChangeInterval(); ?>"/>                
                </div><!-- card-body -->
              </div><!-- card -->
              <button type="button" class="btn btn-primary js-saveAppSettings mt-3">Save</button>
              </div><!-- col-lg-4 -->
            </div><!-- row -->
            </form>
          </div>
          <div class="tab-pane fade" id="api" role="tabpanel" aria-labelledby="api-tab">
            <form class="js-apiSettingsForm">
            <div class="row">
              <div class="col-lg-6">
              <h3>API Keys</h3>
              <div class="card">
                <div class="card-body">
                  <label class="mb-0">Google Maps API Key:</label>
                  <input type="text" class="form-control mb-3" name="googleAPIKey" placeholder="API Key:" value="<?php echo $db->getGoogleAPIKey(); ?>"/>
                  <label class="mb-0">OpenWeatherMap API Key:</label>
                  <input type="text" class="form-control mb-3" name="owmAPIKey" placeholder="API Key:" value="<?php echo $db->getOWMAPIKey(); ?>"/>
                  <label class="mb-0">Twitter Consumer API Key:</label>
                  <input type="text" class="form-control mb-3" name="twitterConsumerAPIKey" placeholder="Consumer API Key:" value="<?php echo $db->getTwitterConsumerAPIKey(); ?>"/>
                  <label class="mb-0">Twitter Consumer API Key Secret:</label>
                  <input type="text" class="form-control mb-3" name="twitterConsumerSecretAPIKey" placeholder="Consumer API Key Secret:" value="<?php echo $db->getTwitterConsumerSecretAPIKey(); ?>"/>
                  <label class="mb-0">Twitter Access Token:</label>
                  <input type="text" class="form-control mb-3" name="twitterAccessToken" placeholder="Twitter Access Token:" value="<?php echo $db->getTwitterAccessToken(); ?>"/>
                  <label class="mb-0">Twitter Access Token Secret:</label>
                  <input type="text" class="form-control mb-3" name="twitterAccessTokenSecret" placeholder="Twitter Access Token Secret:" value="<?php echo $db->getTwitterAccessTokenSecret(); ?>"/>
                </div><!-- card-body -->
              </div><!-- card -->
              <button type="button" class="btn btn-primary js-saveAPISettings mt-3">Save</button>
              </div><!-- col-lg-4 -->
            </div><!-- row -->
            </form>
          </div>
          </div>
        </div>
      </div>
    </main><!-- /.container -->
    <?php include('./partials/javascript.php'); ?>
    <script>
    $('.js-saveMapSettings').on('click', function(){
      $.ajax({
        url: 'endpoints/saveMapSettings.php',
        method: 'post',
        data: $('.js-mapSettingsForm').serialize(),
        success: function(data){
          $('.js-settingsNotificationContainer').show()
          $('.js-settingsNotification').html(data)
        },
        error: function(){
          $('.js-settingsNotification').html('Yikes, there was a problem updating map settings.')
        }
      })
    })
    $('.js-saveWeatherSettings').on('click', function(){
      $.ajax({
        url: 'endpoints/saveWeatherSettings.php',
        method: 'post',
        data: $('.js-weatherSettingsForm').serialize(),
        success: function(data){
          $('.js-settingsNotificationContainer').show()
          $('.js-settingsNotification').html(data)
        },
        error: function(){
          $('.js-settingsNotification').html('Yikes, there was a problem updating weather settings.')
        }
      })
    })
    $('.js-saveNewsSettings').on('click', function(){
      $.ajax({
        url: 'endpoints/saveNewsSettings.php',
        method: 'post',
        data: $('.js-newsSettingsForm').serialize(),
        success: function(data){
          $('.js-settingsNotificationContainer').show()
          $('.js-settingsNotification').html(data)
        },
        error: function(){
          $('.js-settingsNotification').html('Yikes, there was a problem updating newsfeed settings.')
        }
      })
    })
    $('.js-saveAppSettings').on('click', function(){
      $.ajax({
        url: 'endpoints/saveAppSettings.php',
        method: 'post',
        data: $('.js-appSettingsForm').serialize(),
        success: function(data){
          $('.js-settingsNotificationContainer').show()
          $('.js-settingsNotification').html(data)
        },
        error: function(){
          $('.js-settingsNotification').html('Yikes, there was a problem updating app settings.')
        }
      })
    })
    $('.js-saveAPISettings').on('click', function(){
      $.ajax({
        url: 'endpoints/saveAPISettings.php',
        method: 'post',
        data: $('.js-apiSettingsForm').serialize(),
        success: function(data){
          $('.js-settingsNotificationContainer').show()
          $('.js-settingsNotification').html(data)
        },
        error: function(){
          $('.js-settingsNotification').html('Yikes, there was a problem updating API settings.')
        }
      })
    })
    </script>
  </body>
</html>
