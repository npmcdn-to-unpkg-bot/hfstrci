<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="author" content="Houses for Sale & to Rent">
  <?php
  if(isset($canonical))
  	echo '<link rel="canonical" href="'.$canonical.'" />  <meta property=”og:url” content=”'.$canonical.'”/>';
  ?>
  <?php
  if(isset($prev))
  	echo '<link rel="prev" href="'.$prev.'" />';
  ?>
  <?php
  if(isset($next))
  	echo '<link rel="next" href="'.$next.'" />';
  ?>
<link rel="shortcut icon" href="<?php echo $this->config->base_url(); ?>images/icon/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo $this->config->base_url(); ?>images/icon/favicon.ico" type="image/x-icon">
  <?php
  if(isset($meta))
    echo $meta;
  /*if(isset($meta)){
  	foreach($meta as $met){
  		echo '<meta name="'.$met["name"].'" content="'.$met["content"].'">';
  	}
  }*/
  ?>
  <link rel="stylesheet" href="<?php echo $this->config->base_url(); ?>css/citylight/singlecss.min.css">
  <?php /*
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" /> */ ?>
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  </head>
