<footer>
<div class="box">
    <br>
    <p>
        <a href="<?php echo $this->config->base_url(); ?>houses/uk.html" alt="More than 200,000 houses for sale in the United Kingdom" title="Houses for sale in the United Kingdom"><strong>More than 200,000 houses for sale in the United Kingdom</strong></a>
        <?php foreach($links as $link){

              echo ' <a href="'.$link->link.'" alt="'.$link->title.'">'.$link->title.'</a>';

        }    ?>
        </p>
</div>
<?php /* -BANNER-
<center>
<script type='text/javascript'>
<!--//<![CDATA[
   if (!window.AdButler){(function(){var s = document.createElement("script"); s.async = true; s.type = "text/javascript";s.src = 'http://ab168091.adbutler-tachyon.com/app.js';var n = document.getElementsByTagName("script")[0]; n.parentNode.insertBefore(s, n);}());}
  var AdButler = AdButler || {}; AdButler.ads = AdButler.ads || [];
  var abkw = window.abkw || '';
  var plc206596 = window.plc206596 || 0;
  document.write('<'+'div id="placement_206596_'+plc206596+'"></'+'div>');
  AdButler.ads.push({handler: function(opt){ AdButler.register(168091, 206596, [728,90], 'placement_206596_'+opt.place, opt); }, opt: { place: plc206596++, keywords: abkw, domain: 'ab168091.adbutler-tachyon.com', click:'CLICK_MACRO_PLACEHOLDER' }});
//]]>-->
</script></center> */ ?>

    <div class="box">
        <span class="socialmedia">find us on:</span>
        <a href="#" title="Houses for sale to rent on Facebook.">
            <img src="<?php echo $this->config->base_url(); ?>images/fb.png" alt="Houses for sale to rent on Facebook." title="Houses for sale to rent on Facebook.">
        </a>
    </div>
    <div ><a href="<?php echo $this->config->base_url(); ?>termsandconditions" style="color:#333;text-decoration:none;padding:5px;">Terms of Use & Privacy Policy </a></div>
</footer>

<?php /*
<div class="mobile_bar">
    <div class="content_bar">Learn about properties as soon  as they  come to market</div>
    <img src="<?php echo $this->config->base_url(); ?>images/bar_mobile_ic.jpg" class="unbounce_redirect">
    <div class="close_btn"></div>
</div>
*/ ?>

<!-- Modal Unbounce -->
<div class="modal fade" id="unbounce" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog dialog_wrapper" role="document">
    <div class="modal-content iframe_wrapper">
      <!-- <iframe name='unbounce_frame' id='unbounce_frame'  onload="filldata()" src="http://unbouncepages.com/property-alerts/"></iframe> -->
      <div class="wrapper_unbounce">
        <div class="form_receive">
            <h1 class="title_receive">Receive properties as soon as they come to market! </h1>
            <h5 class="des_receive">Receive information about new properties for sale or to rent that match your budget and location as soon as these become available so you can get there first.</h5>
            <div class="form_input">
                <div class="row_receive">
                   <button class="btn_receive">YES, PLEASE!</buton>
                     <button class="btn_reject">Skip</button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo $this->config->base_url()."js/extrahome.min.js" ?>"></script>
<script>
    jQuery(document).ready(function() {

          $("#torent").click(function(){
              localStorage.setItem("search",$("#search1").val());
              localStorage.setItem("salerent","rent");
          });

          $("#forsale").click(function(){
              localStorage.setItem("search",$("#search1").val());
              localStorage.setItem("salerent","sale");
          });

          $("form input[type=submit]").click(function() {
                $("input[type=submit]", $(this).parents("form")).removeAttr("clicked");
                $(this).attr("clicked", "true");
            });

            $( "#rent" ).submit(function( event ) {
                $('#rentsearch').val($('#search1').val());
             });
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


        $(".btn_receive").click(function(){
            redirectToUnbounce()

        });
        $(".btn_reject").click(function(){
            $('#unbounce').modal("hide");
        });
        $(".unbounce_redirect").click(function(){
            redirectToUnbounce();
        });
        $(".content_bar").click(function(){
            redirectToUnbounce();
        });
         $(".close_btn").click(function(){
            $('.mobile_bar').hide();
        });
         function redirectToUnbounce(){
              var search = localStorage.getItem("search") != "undefined" ?localStorage.getItem("search"):"";
              var max_price = localStorage.getItem("max_price");
              var salerent = localStorage.getItem("salerent");
              window.location.assign("http://unbouncepages.com/property-alerts?keyword="+search+"&salerent="+salerent+"&pricerange="+max_price+"");
         }
    });
</script>
</body>
</html>
