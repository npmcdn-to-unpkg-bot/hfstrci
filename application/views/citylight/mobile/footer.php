  <!-- START FOOTER -->
    <footer class="footer">
      <!-- START FOOTER NAVIGATION -->
      <div class="footer-nav">
        <div class="container">
          <div class="row">
            <!-- START FOOTER ABOUT US -->
            <div class="col-xs-12 col-sm-6 col-md-3 footer-nav-col">
              <div class="ft-about-us">
                <h4 class="ft-col-title">Houses for Sale to Rent</h4>
                <div class="text-block">
                  <p>Houses for Sale & to Rent brings wide range of choice, steadily updated property list and market trend for you to figure out your right decision.</p>
                  <p>You are now at right place for your property research.</p>
                </div>
              </div>
            </div>
            <!-- END ABOUT US -->
            <div class="col-xs-12 col-sm-12 col-md-9 footer-nav-col">
<?php
      $cl = ceil(count($links)/6);
      $i = 0;

      echo ' <div class="col-xs-12 col-sm-6 col-md-2 footer-nav-col">';
  echo '    <div class="ft-useful-links">';
  echo '      <h4 class="ft-col-title">Useful links</h4>';
  echo '      <nav class="useful-links-menu" role="navigation">';
  echo '        <ul>';

      foreach($links as $link){

        if($i % $cl == 0 && $i > 0  ){

            echo '        </ul>';
        echo '      </nav>';
        echo '    </div>';
        echo '  </div>';
              echo ' <div class="col-xs-12 col-sm-6 col-md-2 footer-nav-col">';
              echo '    <div class="ft-useful-links">';
              //echo '      <h4 class="ft-col-title">Useful links</h4>';
              echo '      <nav class="useful-links-menu" role="navigation">';
              echo '        <ul>';

            }
          echo ' <li class="menu-item"><a href="'.$link->link.'">'.$link->title.'</a></li>';

    $i++;
           }

        echo '        </ul>';
  echo '      </nav>';
  echo '    </div>';
  echo '  </div>';

?>

          </div>

          </div>
        </div>
      </div>
      <!-- END FOOTER NAVIGATION -->

      <!-- START COPYRIGHT -->
      <div class="copyright">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 text-block">
              &copy; 2015 Houses for Sale to Rent. All Rights Reserved.
              <br />
              <span>Created by <a title="Visit HousesforSaletoRent.co.uk!" href="<?php echo $this->config->base_url(); ?>" target="_blank">Houses for sale & to Rent team</a>. - <a href="<?php echo $this->config->base_url(); ?>/termsandconditions" style="color:darkgreen;">Terms of Use & Privacy Policy</a></span>
              <br>
            </div>
            <div class="col-xs-12 col-sm-6 logo-block">
              <div class="logo-image">
                <a href="<?php echo $this->config->base_url(); ?>"><img src="<?php echo $this->config->base_url(); ?>/images/houses-for-sale-to-rent.png" alt="Houses for Sale & to Rent"></a>
              </div>
            </div>
          </div>
        </div>

        <!-- START BACK TO TOP -->
        <div id="back-to-top" class="back-to-top">
          <i class="fa fa-angle-up"></i>
        </div>
        <!-- END BACK TO TOP -->
      </div>
      <!-- END COPYRIGHT -->
    </footer>
    <!-- END FOOTER -->
  </div>
  <!-- END SITE -->

 <!-- <script src="//my.hellobar.com/6049964f0fdcb99f5f1918dc0ebaecdebb0dae92.js" type="text/javascript" charset="utf-8" async="async"></script>
  -->

<div class="mobile_bar">
    <div class="content_bar">Learn about properties as soon  as they  come to market</div>
    <img src="<?php echo $this->config->base_url(); ?>images/bar_mobile_ic.jpg" class="unbounce_redirect">
    <div class="close_btn"></div>
</div>
<!-- Thanks -->
<div class="modal fade" id="thankyoupage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div id="infosubmit"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
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
                   <button class="btn_reject">Skip</buton>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /*
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="<?php echo $this->config->base_url()."js/bootstrap.min.js" ?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/1.7.2/jquery.smooth-scroll.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/unveil/1.3.0/jquery.unveil.js"></script>
<?php //<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhqHhs7yOY46r2H-71JhTA8dGorPqIu30"></script> ?>
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>/js/script-full.js"></script> */ ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script async defer src="<?php echo $this->config->base_url()."js/extras.js" ?>"></script>
<script>
        // Asynchronously load non-critical css
        function loadCSS(e, t, n) { "use strict"; var i = window.document.createElement("link"); var o = t || window.document.getElementsByTagName("script")[0]; i.rel = "stylesheet"; i.href = e; i.media = "only x"; o.parentNode.insertBefore(i, o); setTimeout(function () { i.media = n || "all" }) }
        // load css file async
        loadCSS('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css');

</script>

<script>
$(document).ready(function(){
    $ = jQuery.noConflict();

    $("#email_error").hide();
    $('button#submit').click(function(){

      var email       = $('#email').val();
      var enquirytype = $('button#savesearch').attr('data-type');
      var minprice    = $('input[name=price1]').val();
      var maxprice    = $('input[name=price2]').val();
      var geo1        = $('button#savesearch').attr('data-geo1');
      var geo2        = $('button#savesearch').attr('data-geo2');
      var geo3        = $('input[name=search]').val();
      var minbed      = $('select[name=bedroom1] option:selected').val();
      var maxbed      = $('select[name=bedroom2] option:selected').val();
      var proptype    = $("input[type='checkbox']:checked").map(function() {return this.value;}).get().join(',');

      var error = false;

      if(email.length == 0 || email.indexOf("@") == "-1" || email.indexOf(".") == "-1"){
        var error = true;
        $("#email_error").fadeIn(500);
      }else{
        $("#email_error").hide();
      }

      if(error ==false){
        $.ajax({
            type:"POST",
            url:window.location.origin+"/houses/saveSub",
            crossDomain: true,
            data: "email=" + email + "&enquirytype=" + enquirytype + "&minprice=" + minprice + "&maxprice=" + maxprice + "&geo1=" + geo1 + "&geo2=" + geo2 + "&geo3=" + geo3 + "&minbed=" + minbed + "&maxbed=" + maxbed + "&proptype=" + proptype,
            success: function(data) {
                $("#formSubcribe").modal('hide');
                $('#infosubmit').html(data);
                $("#thankyoupage").modal('show');

                setInterval(function(){
                    $("#thankyoupage").modal('hide');
                  }, 3000);
            }
        });
      }
    });

  /* Save Listing Ajax*/
  $(".featured").click(function(){
    $ = jQuery.noConflict();

    $("#email_error_listing").hide();
    // $('#formListing').modal('show');

    var listingPrice  = $(this).data('price');
    var listingType   = $(this).data('type');
    var postCode      = $(this).data('postcode');
    var listingId     = $(this).data('listingid');
    var lat           = $(this).data('lat');
    var lng           = $(this).data('lng');

    submitList(listingPrice, listingType, postCode, listingId, lat, lng);
  });

  function submitList(listingPrice, listingType, postCode, listingId, lat, lng){
    $('button#submitListing').click(function(){
        var emailListing  = $('#emailListing').val();

        var error = false;
        if(emailListing.length == 0 || emailListing.indexOf("@") == "-1" || emailListing.indexOf(".") == "-1"){
          var error = true;
          $("#email_error_listing").fadeIn(500);
        }else{
          $("#email_error_listing").hide();
        }

        if(error == false){
          $.ajax({
              type:"POST",
              url:window.location.origin+"/houses/saveListing",
              crossDomain: true,
              data: "email=" + emailListing + "&listingPrice=" + listingPrice + "&listingType=" + listingType + "&postCode=" + postCode + "&listingId=" + listingId + "&lat=" + lat + "&lng=" + lng,
              success: function(data) {
                  $("#formListing").modal('hide');
                  $('#infosubmit').html(data);
                  $("#thankyoupage").modal('show');
                  setInterval(function(){
                    $("#thankyoupage").modal('hide');
                  }, 3000);
              }
          });
        }
    });
  }



});
jQuery(document).ready(function() {

      var search = localStorage.getItem("search") != "undefined" ? localStorage.getItem("search") : "";
      var max_price = localStorage.getItem("max_price") != "undefined" ? localStorage.getItem("max_price") : "";
      var salerent = localStorage.getItem("salerent") != "undefined" ? localStorage.getItem("salerent") : "";
      $(".mobile_bar").show();

        $(".btn_receive").click(function(){
            redirectToUnbounce();
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
</script></body>
</html>
