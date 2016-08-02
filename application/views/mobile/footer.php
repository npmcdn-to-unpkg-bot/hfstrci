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
<center>
<script type='text/javascript'>
 <!--//<![CDATA[
   if (!window.AdButler){(function(){var s = document.createElement("script"); s.async = true; s.type = "text/javascript";s.src = 'http://ab168091.adbutler-tachyon.com/app.js';var n = document.getElementsByTagName("script")[0]; n.parentNode.insertBefore(s, n);}());}
      var AdButler = AdButler || {}; AdButler.ads = AdButler.ads || [];
      var abkw = window.abkw || '';
      var plc208807 = window.plc208807 || 0;
      document.write('<'+'div id="placement_208807_'+plc208807+'"></'+'div>');
      AdButler.ads.push({handler: function(opt){ AdButler.register(168091, 208807, [320,100], 'placement_208807_'+opt.place, opt); }, opt: { place: plc208807++, keywords: abkw, domain: 'ab168091.adbutler-tachyon.com', click:'CLICK_MACRO_PLACEHOLDER' }});
//]]>-->

</script></center>

    <div class="box">
        <span class="socialmedia">find us on:</span>
        <a href="#" title="Houses for sale to rent on Facebook.">
            <img src="<?php echo $this->config->base_url(); ?>images/fb.png" alt="Houses for sale to rent on Facebook." title="Houses for sale to rent on Facebook.">
        </a>
    </div>
    <div ><a href="<?php echo $this->config->base_url(); ?>termsandconditions" style="color:#333;text-decoration:none;padding:5px;">Terms of Use & Privacy Policy </a></div>
</footer>

<div class="mobile_bar">
    <div class="content_bar">Learn about properties as soon  as they  come to market</div>
    <img src="<?php echo $this->config->base_url(); ?>images/bar_mobile_ic.jpg" class="unbounce_redirect">
    <div class="close_btn"></div>
</div>

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

<script>
    jQuery(document).ready(function() {
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

<!--Start Cookie Script--> <script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/102b9910812d65af6ded2834b5128bd8.js"></script> <!--End Cookie Script-->
</body>
</html>
