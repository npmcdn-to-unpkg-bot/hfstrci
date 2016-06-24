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
if (!detectmob()) {
<!--//<![CDATA[
   document.MAX_ct0 ='';
   var m3_u = (location.protocol=='https:'?'https://cas.criteo.com/delivery/ajs.php?':'http://cas.criteo.com/delivery/ajs.php?');
   var m3_r = Math.floor(Math.random()*99999999999);
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("zoneid=412337");document.write("&amp;nodis=1");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location).substring(0,1600));
   if (document.context) document.write ("&context=" + escape(document.context));
   if ((typeof(document.MAX_ct0) != 'undefined') && (document.MAX_ct0.substring(0,4) == 'http')) {
       document.write ("&amp;ct0=" + escape(document.MAX_ct0));
   }
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   
   document.write ("'></scr"+"ipt>");
//]]>-->
  } else {
    <!--//<![CDATA[
   document.MAX_ct0 ='';
   var m3_u = (location.protocol=='https:'?'https://cas.criteo.com/delivery/ajs.php?':'http://cas.criteo.com/delivery/ajs.php?');
   var m3_r = Math.floor(Math.random()*99999999999);
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("zoneid=434917");document.write("&amp;nodis=1");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location).substring(0,1600));
   if (document.context) document.write ("&context=" + escape(document.context));
   if ((typeof(document.MAX_ct0) != 'undefined') && (document.MAX_ct0.substring(0,4) == 'http')) {
       document.write ("&amp;ct0=" + escape(document.MAX_ct0));
   }
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   
   document.write ("'></scr"+"ipt>");
//]]>-->
  }
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
</body>
</html>
