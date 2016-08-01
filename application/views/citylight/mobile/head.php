<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
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
  <link rel="stylesheet" href="https://s3-eu-west-1.amazonaws.com/hfstrcibkt/style.min.css.gz">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
  <script src="<?php echo $this->config->base_url()."js/bootstrap.min.js" ?>"></script>

  <script>

        function detectmob() {

         if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i)
         || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)
         || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)
         ){
            return true;
          }
         else {
            return false;
          }
        }

        jQuery(document).ready(function() {

        if (!detectmob()) {
            // Event move outside
          $('html').mouseleave(function(e) {
                var top = e.pageY;
                var right = document.body.clientWidth - e.pageX;
                var bottom = document.body.clientHeight - e.pageY;
                var left = e.pageX;
                if(top < 10 || right < 20 || bottom < 10 || left < 10){
                    var d = new Date();
                    var n = d.getTime();
                    var isShow = sessionStorage .getItem("show_popup");
                    if (!isShow && ((n - isShow) > 1800000) ) { // check exist storage or expires storage (30 mins)
                        $('#unbounce').modal("show");  // show popup
                        sessionStorage .setItem("show_popup", n); // set value to tick for show popup
                    }
                }
            });
          } else {
            var search = localStorage.getItem("search") != "undefined" ? localStorage.getItem("search") : "";
                var max_price = localStorage.getItem("max_price") != "undefined" ? localStorage.getItem("max_price") : "";
                var salerent = localStorage.getItem("salerent") != "undefined" ? localStorage.getItem("salerent") : "";
                //if (search != "" || max_price != "" || salerent != "") {
                    $(".mobile_bar").show();
                //}
        }

        });

</script>
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  </head>
