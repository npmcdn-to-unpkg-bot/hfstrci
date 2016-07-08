
<!DOCTYPE html><html><head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>css/normalize.css">
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>css/custom.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo $this->config->base_url()."js/bootstrap.min.js" ?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url()."css/".$css; ?>.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>css/bootstrap.min.css">
<title><?php echo $title; ?></title>
<link rel="canonical" href="<?php echo $this->config->base_url(); ?>" />
<?php if(isset($meta)){echo $meta;} ?>
<?php echo $js; //tt ?>
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
            $("form input[type=submit]").click(function() {
                $("input[type=submit]", $(this).parents("form")).removeAttr("clicked");
                $(this).attr("clicked", "true");
            });
        });

        jQuery(document).ready(function() {
            $( "#rent" ).submit(function( event ) {
                $('#rentsearch').val($('#search1').val());
             });
            // Event move outside
            if (!detectmob()) {
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
                var search = localStorage.getItem("search") != "undefined" ? (localStorage.getItem("search") != null ? localStorage.getItem("search"): "" ) : "";
                var max_price = localStorage.getItem("max_price") != "undefined" ? (localStorage.getItem("max_price") != null ? localStorage.getItem("max_price"): "" ) : "";
                var salerent = localStorage.getItem("salerent") != "undefined" ? (localStorage.getItem("salerent") != null ? localStorage.getItem("salerent"): "" ) : "";
                if (search == "" || max_price == "" || salerent == "") {
                    $(".mobile_bar").hide();
                } else {
                    $(".mobile_bar").show();
                }

            }


        });



</script>

</head><body ><!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MMH24R"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MMH24R');</script>
<!-- End Google Tag Manager -->
