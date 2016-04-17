
<!DOCTYPE html><html><head>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>css/normalize.css">
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>css/custom.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo $this->config->base_url()."js/bootstrap.min.js" ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url()."css/".$css; ?>.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>css/bootstrap.min.css">
<title><?php echo $title; ?></title>
<link rel="canonical" href="<?php echo $this->config->base_url(); ?>" />
<meta name=viewport content="width=device-width, initial-scale=1">
<?php if(isset($meta)){echo $meta;} ?>
<?php echo $js; //tt ?>
<script>
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
        	$('html').mouseleave(function() {
                var d = new Date();
                var n = d.getTime(); 
                var isShow = sessionStorage .getItem("show_popup"); 
                if (!isShow && ((n - isShow) > 1800000) ) { // check exist storage or expires storage (30 mins)
                    $('#unbounce').modal("show");  // show popup
                    sessionStorage .setItem("show_popup", n); // set value to tick for show popup
                }            
            });


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


