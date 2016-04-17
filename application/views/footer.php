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

    <div class="box">
        <span class="socialmedia">find us on:</span>
        <a href="#" title="Houses for sale to rent on Facebook.">
            <img src="<?php echo $this->config->base_url(); ?>images/fb.png" alt="Houses for sale to rent on Facebook." title="Houses for sale to rent on Facebook.">
        </a>
    </div>
    <div><a href="<?php echo $this->config->base_url(); ?>termsandconditions" style="color:#333;text-decoration:none;padding:5px;">Terms of Use & Privacy Policy </a></div>
</footer>

<!-- Modal Unbounce -->
<div class="modal fade" id="unbounce" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog dialog_wrapper" role="document">
    <div class="modal-content iframe_wrapper">
      <iframe name='unbounce_frame' id='unbounce_frame'  onload="filldata()" src="http://unbouncepages.com/property-alerts/"></iframe>
    </div>
  </div>
</div>

<script>

        /*
        * Author : HocN
        * fill data to iframe
        */
        function filldata(){
            var search = localStorage.getItem("search");
            var max_price = localStorage.getItem("max_price");
            var salerent = localStorage.getItem("salerent");
            console.log("search : "+search+", max price:"+ max_price+", salerent : "+salerent);
            window.frames["unbounce_frame"].document.getElementById("keyword").value = search;
            window.frames["unbounce_frame"].document.getElementById("pricerange").value = search;
            window.frames["unbounce_frame"].document.getElementById("salerent").value = salerent;
        }

</script>
</body>
</html>
