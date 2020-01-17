    <?php
    if(strpos($_SERVER['PHP_SELF'],'settings.php') === false && $db->getScreenChangeInterval() > 0){
        ?>
        <script>
        setTimeout(function(){ 
          if(window.location.pathname === '/pibase/') {
              window.location.href = '/pibase/weather.php'
          }
          if(window.location.pathname === '/pibase/weather.php') {
              window.location.href = '/pibase/news.php'
          }
          if(window.location.pathname === '/pibase/news.php') {
              window.location.href = '/pibase'
          }
        }, <?php echo $db->getScreenChangeInterval() * 1000 * 60; ?>);
        </script>
        <?php
    }
    ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/feather.js"></script>
    <script>feather.replace()</script>