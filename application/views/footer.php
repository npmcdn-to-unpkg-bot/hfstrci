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
      <!-- <iframe name='unbounce_frame' id='unbounce_frame'  onload="filldata()" src="http://unbouncepages.com/property-alerts/"></iframe> -->
      <div class="wrapper_unbounce">
        <div class="form_receive">
            <form id="unbounce_form" action="/fsg?pageId=a818b4a7-3a3f-49e9-a24f-bfc6cb5d8451&variant=a" method="POST">
                <h2 class="title_receive">Learn about new properties as soon as they are listed</h2>
                <h6 class="des_receive">Receive information about new properties that match your budget and location.</h6>
                <div class="form_input">
                    <label class="error_msg"></label>
                    <div class="row_receive">
                        <label class=" label_title for_your_name">Your Name *</label>
                        <input id="your_name" name="your_name" class="input text form_elem_your_name input_text" type="text">
                    </div>
                    <div class="row_receive">
                        <label class="label_title for_your_email">Your Email *</label>
                        <input id="your_email" name="your_email" class="input text form_elem_your_email input_text" type="text">
                    </div>

                    <div class="row_receive">
                        <label class="label_title for_your_email">Phone Number *</label>
                        <input id="phone_number" name="phone_number" class="input text form_elem_phone_number input_text" type="text">
                    </div>
                    <div class="row_receive">
                       <button type="submit" class="btn_receive">RECEIVE PROPERTIES</buton>
                    </div>
                    <h6 class="agree_term">By clicking this button you agree to our terms of use.</h6>
                </div>
                    <input id="salerent" class="hidden" type="hidden" value="" name="salerent">
                    <input id="pricerange" class="hidden" type="hidden" value="" name="pricerange">
                    <input id="keyword" class="hidden" type="hidden" value="" name="keyword">
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

        /*
        * Author : HocN
        * fill data to iframe
        */
        filldata();
        function filldata(){
            var search = localStorage.getItem("search");
            var max_price = localStorage.getItem("max_price");
            var salerent = localStorage.getItem("salerent");
            $("#salerent").val(salerent);
            $("#pricerange").val(max_price);
            $("#keyword").val(search);
        }

        $("#unbounce_form").submit(function(){
            var your_name = $("#your_name").val();
            var your_email = $("#your_email").val();
            var phone_number = $("#phone_number").val();
            if ( !your_name || !your_email || !phone_number) {
                $(".error_msg").html("Please input to required field ");
                return false;
            } else if (!validateEmail(your_email)) {
                 $(".error_msg").html("Email is not correct format");
                return false;
            } if (!validatePhone(phone_number)) {
                 $(".error_msg").html("Phone is not correct format");
                return false;
            } else {
                return true;
            }
        });

        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

        function validatePhone(phone){
            var number = phone.replace(/[^0-9]/g, '');
            if(number.length <= 10) { 
                return false;
            } else {
                return true;
            } 
        }
</script>
</body>
</html>
