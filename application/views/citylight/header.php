<body class="page-right-sidebar">
  <!-- START SITE -->
  <div class="site">
    <!-- START HEADER -->
    <header class="noo-header">
      <!-- START TOP HEADER -->
      <div class="top-header">
        <div class="container">
          <div class="top-header-inner">
            <ul class="social-top">
              <li><a href="https://www.facebook.com/housesforsaletorent" title="Facebook Houses for Sale & to Rent" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <!--<li><a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>-->
            </ul>

            <div class="top-header-content">
              <div class="emailto content-item">
                <?php /*<a href="mailto:info@housesforsaletorent.co.uk"><i class="fa fa-envelope-o"></i>&nbsp;Email:info@housesforsaletorent.co.uk</a>*/ ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END TOP HEADER -->

      <!-- START MAIN NAVIGATION WRAP -->
      <div class="main-nav-wrap container">
        <!-- START NAVBAR TOGGLE & LOGO -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="logo">
            <div class="logo-image">
              <a href="<?php echo $this->config->base_url(); ?>" title="Houses for Sale & to Rent"></a>
            </div>
          </div>
        </div>
        <!-- END NAVBAR TOGGLE & LOGO -->

        <!-- START MAIN NAVIGATION -->
        <div class="main-navigation">
          <nav class="collapse navbar-collapse" id="main-collapse" role="navigation">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="index.html">Home&nbsp;<span class="caret"></span></a>               
              </li>
              <li class="dropdown active">
                <a href="#">Properties&nbsp;<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
                    <a href="<?php echo $this->config->base_url(); ?>/houses/for-sale/index.html">For Sale</a>                            
                  </li>
                  <li class="dropdown-submenu">
                    <a href="<?php echo $this->config->base_url(); ?>/houses/to-rent/index.html">To Rent</a>                  
                                
                  </li>                 
                </ul>
              </li>
             
              <li class="dropdown">
                <a href="#">Submit&nbsp;<span class="caret"></span></a>               
              </li>
            </ul>
          </nav>
        </div>
        <!-- END MAIN NAVIGATION -->
      </div>
      <!-- END MAIN NAVIGATION WRAP -->
    </header>
    <!-- END HEADER -->