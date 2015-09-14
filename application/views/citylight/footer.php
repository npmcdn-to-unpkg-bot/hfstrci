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

  <!-- JQUERY PLUGIN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script type="text/javascript" src="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/js/bootstrap.min.js.gz"></script>
<!--  <script type="text/javascript" src="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/js/jquery.parallax-1.1.3.js.gz"></script> -->
  <script type="text/javascript" src="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/js/SmoothScroll.js.gz"></script>
<!--  <script type="text/javascript" async  src="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/js/lock.min.js.gz"></script> -->
  <script async type="text/javascript" src="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/js/unveil.js.gz"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhqHhs7yOY46r2H-71JhTA8dGorPqIu30"></script>
  <script async type="text/javascript" src="http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/js/script.js.gz"></script>
 <!-- <script src="//my.hellobar.com/6049964f0fdcb99f5f1918dc0ebaecdebb0dae92.js" type="text/javascript" charset="utf-8" async="async"></script>
  -->
</body>
</html>
