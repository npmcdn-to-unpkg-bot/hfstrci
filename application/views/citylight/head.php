<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <link rel="shortcut icon" href="images/icon/favicon.jpg" type="image/x-icon">
  <?php 
  if(isset($meta))
    echo $meta;
  /*if(isset($meta)){
  	foreach($meta as $met){
  		echo '<meta name="'.$met["name"].'" content="'.$met["content"].'">';
  	}
  }*/ 
  ?>
  <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/css/citylight/bootstrap.min.css">
  <link rel="stylesheet" href="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/css/citylight/bootstrap-theme.min.css">
  <link rel="stylesheet" href="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/css/citylight/font-awesome.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/css/citylight/style.css">
  <link rel="stylesheet" href="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/css/citylight/shortcode.css">
  <link rel="stylesheet" href="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/css/citylight/citilights-shortcode.css">
  <link rel="stylesheet" href="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/css/citylight/color/color1.css">
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]--> 
  </head>
