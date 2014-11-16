<!DOCTYPE html><html><head>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>css/normalize.css">
<script src=" http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url()."css/".$css; ?>.css" />
<title><?php echo $title; ?></title>
<?php if(isset($meta)){echo $meta;} ?>
<?php echo $js; //tt ?>
<script>
            jQuery(document).ready(function() {$("form input[type=submit]").click(function() {
                $("input[type=submit]", $(this).parents("form")).removeAttr("clicked");
                $(this).attr("clicked", "true");
            }); });


            jQuery(document).ready(function() {$( "#sea" ).submit(function( event ) {
                var keyword = $("#search1").val().replace(/[^A-Za-z0-9 ]/g,"");
                keyword = keyword.replace(/\s{2,}/g," ");
                keyword = keyword.replace(/\s/g, "-").toLowerCase();
                var sale = $("input[type=submit][clicked=true]").val();
                sale = sale.replace(/\s{2,}/g," ");
                sale = sale.replace(/\s/g, "-").toLowerCase();
               window.location = "<?php echo $this->config->base_url(); ?>houses/"+sale+"/"+keyword+".html";
                event.preventDefault()          });});
        </script>
</head><body><!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MMH24R"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MMH24R');</script>
<!-- End Google Tag Manager -->