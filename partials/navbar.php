<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
<a class="navbar-brand" href="#"><?php echo $db->getAppName(); ?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarsExampleDefault">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item <?php if(strpos($_SERVER['PHP_SELF'], 'index') !== false){ echo "active"; } ?>">
      <a class="nav-link" href="/pibase/">Home</a>
    </li>
    <li class="nav-item <?php if(strpos($_SERVER['PHP_SELF'], 'weather') !== false){ echo "active"; } ?>">
      <a class="nav-link" href="/pibase/weather.php">Weather</a>
    </li>
    <li class="nav-item <?php if(strpos($_SERVER['PHP_SELF'], 'news') !== false){ echo "active"; } ?>">
      <a class="nav-link" href="/pibase/news.php">News</a>
    </li>
  </ul>
<button class="btn btn-primary icon__button my-2 my-sm-0" onClick="goToSettings()" type="submit"><i class="mb-3 icon__settings" data-feather="settings"></i></button>
  
</div>
</nav>
<style>
.icon__button{
    height: 40px;
}
.icon__settings {
    color: #fff;
}
</style>
<script>
    function goToSettings(){
        window.location = '/pibase/settings.php'
    }
</script>