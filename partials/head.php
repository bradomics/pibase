<?php include('./db/logic.php'); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title><?php $db->getAppName(); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

    <!-- Theme styles -->
    <?php 
    if($db->getAppTheme() === 'dark') {
      ?>
      <link href="css/themes/dark.css" rel="stylesheet">
      <?php
    }
    if($db->getAppTheme() === 'hacker') {
      ?>
      <link href="css/themes/hacker.css" rel="stylesheet">
      <?php
    }
    if($db->getAppTheme() === 'energy') {
      ?>
      <link href="css/themes/energy.css" rel="stylesheet">
      <?php
    }
    ?>
  </head>
