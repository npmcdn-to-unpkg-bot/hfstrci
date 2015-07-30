<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Houses for Sale & to Rent">
  <link rel="shortcut icon" href="images/icon/favicon.jpg" type="image/x-icon">

  <?php if(isset($meta)){echo $meta;} ?>
  <?php //echo $js; ?>

  <!-- GOOGLE WEB FONTS INCLUDE -->
  <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic' rel='stylesheet' type='text/css'>

  <!-- STYLESHEETS -->
  <link rel="stylesheet" href="<?php echo $this->config->base_url(); ?>/css/citylight/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $this->config->base_url(); ?>/css/citylight/bootstrap-theme.min.css">
  <link rel="stylesheet" href="<?php echo $this->config->base_url(); ?>/css/citylight/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $this->config->base_url(); ?>/css/citylight/jquery.nouislider.min.css">

  <!-- THEME STYLESHEETS -->
  <link rel="stylesheet" href="<?php echo $this->config->base_url(); ?>/css/citylight/style.css">
  <link rel="stylesheet" href="<?php echo $this->config->base_url(); ?>/css/citylight/shortcode.css">
  <link rel="stylesheet" href="<?php echo $this->config->base_url(); ?>/css/citylight/citilights-shortcode.css">
  <link rel="stylesheet" href="<?php echo $this->config->base_url(); ?>/css/citylight/color/color1.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>