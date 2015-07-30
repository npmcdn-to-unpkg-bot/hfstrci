    <!-- START NOO WRAPPER -->
		<div class="noo-wrapper">
		  <!-- START MAINBODY -->
		  <div class="container noo-mainbody">
		  	<div class="noo-mainbody-inner">
		  		<div class="row clearfix">

              <!-- START SIDEBAR -->
            <div class="noo-sidebar noo-sidebar-right col-xs-12 col-md-3">
              <div class="noo-sidebar-inner">
                <!-- START FIND PROPERTY -->
                <div class="block-sidebar find-property">
                  <h3 class="title-block-sidebar">Find Property</h3>
                  <div class="gsearch">
                    <div class="gsearch-wrap">
                      <form class="gsearchform" method="get" role="search">
                        <div class="gsearch-content">                        
                                                          
                               <input type="text" class="form-control" />
                               <br>                

                              <div class="form-group glocation" style="width:49%;float:left;">
                                 <div class="label-select">

                                <select class="form-control">
                                  <option>Min Price</option>
                                  <option>House</option>
                                  <option>Flat</option>
                                </select>
                              </div>
                            </div>

                             <div class="form-group glocation"  style="width:49%;float:right;">
                               <div class="label-select">

                                <select class="form-control">
                                  <option>Max price</option>
                                  <option>House</option>
                                  <option>Flat</option>
                                </select>
                              </div>
                            </div>

                             <div class="form-group glocation"  style="width:49%;float:left;">
                                <select class="form-control">
                                  <option>Min Bedroom</option>
                                  <option>House</option>
                                  <option>Flat</option>
                                </select>
                             </div>
                           

                             <div class="form-group glocation"  style="width:49%;float:right;">
                               <div class="label-select">

                                <select class="form-control">
                                  <option>Max Bedroom</option>
                                  <option>House</option>
                                  <option>Flat</option>
                                </select>
                              </div>
                            </div>

                             <div class="form-group glocation">
                              <div class="label-select">

                                <select class="form-control">
                                  <option>Property types</option>
                                  <option>House</option>
                                  <option>Flat</option>
                                </select>
                              </div>
                            </div>

                                                                   
                            
                          <div class="gsearch-action">
                            <div class="gsubmit">
                              <a class="btn btn-deault" href="#">Search Property</a>
                               </div>  
                            </div>

                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
              
                <!-- END FIND PROPERTY -->

                <!-- START RECENT PROPERTY -->
                <div class="block-sidebar recent-property">
                  <h3 class="title-block-sidebar">Recent Property</h3>
                  <div class="featured-property">
                    <ul>
                      <li>
                        <div class="featured-image">
                          <a href="property-details.html"><img src="images/property/property1.jpg" alt=""></a>
                        </div>
                        <div class="featured-decs">
                          <span class="featured-status"><a href="#">For Sale</a></span>
                          <h4 class="featured-title"><a href="property-details.html" title="Visalia, NJ 93277">Visalia, NJ 93277</a></h4>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- END RECENT PROPERTY -->
              </div>
            </div>
            <!-- END SIDEBAR -->


				  	<!-- START MAIN CONTENT -->
				  	<div class="noo-content col-xs-12 col-md-9">
							<div class="recent-properties">
								<div class="properties grid">
	                <!-- START PROPERTIES HEADER -->
				  				<div class="properties-header">
										<h1 class="page-title">Properties</h1>

										<div class="properties-toolbar">
                      <form class="properties-ordering" method="get">
                        <div class="properties-ordering-label">Sorted by</div>
                        <div class="form-group properties-ordering-select">
                          <div class="label-select">
                            <select class="form-control">
                              <option>Distance</option>
                              <option>Most Recent</option>
                              <option>Lowest Price</option>
                              <option>Highest Price</option>
                            </select>
                          </div>
                        </div>
                      </form>
										</div>
									</div>
	                <!-- END PROPERTIES HEADER -->

                  <!-- START PROPERTIES CONTENT -->
                  <div class="properties-content">




<?php 
                   
foreach($results as $k){
   
            $key = $k->key_feed;
            $proptype = $k->property_type_feed;
            if(! $proptype){$proptype = "";}
            $address = $k->display_address_feed;
            if(substr($address, 0, 4) == "chpk"){
                $address = strstr($address, ",", false);
            }
            $addss = array_unique(explode(",",$address));
            //print_r($addss);
            $count = count($addss); 
            $strings = '';
            for ($i=0; $i<$count ; $i++) { 
             
              if($i == $count-1){
                if(isset($addss[$i])){
                $addss[$i] = substr($addss[$i], 0, -3);
               
                $strings .= ' '.$addss[$i] ;
                 }

              }elseif($i == 0 or $i == 1){
                if(isset($addss[$i])){
                $addss[$i] = preg_replace('/0/', '', $addss[$i] ); // remove numbers
                $addss[$i] = preg_replace('/1/', '', $addss[$i] ); // remove numbers
                $addss[$i] = preg_replace('/2/', '', $addss[$i] ); // remove numbers
                $addss[$i] = preg_replace('/3/', '', $addss[$i] ); // remove numbers
                $addss[$i] = preg_replace('/4/', '', $addss[$i] ); // remove numbers
                $addss[$i] = preg_replace('/5/', '', $addss[$i] ); // remove numbers
                $addss[$i] = preg_replace('/6/', '', $addss[$i] ); // remove numbers
                $addss[$i] = preg_replace('/7/', '', $addss[$i] ); // remove numbers
                $addss[$i] = preg_replace('/8/', '', $addss[$i] ); // remove numbers
                $addss[$i]  = preg_replace('/9/', '', $addss[$i] ); // remove numbers
                $strings .= ' '.$addss[$i];
               }
              }else{
                if(isset($addss[$i])){
                $strings .= ' '.$addss[$i];
               }
              }
            }

            $description = $k->full_description_feed;
            $your_string_without_tags = strip_tags($description);
            $charscount = substr($your_string_without_tags, 0, 250);
            $img = $k->photo_feed;
            $bed = $k->num_bedrooms_feed;
            $price = number_format($k->price_feed);
            $href = $this->config->base_url()."houses/redirect/$key.html";
            $desc = $proptype.', property in '.$strings.' '.$searchvalue;
            $title = $bed.' Bedroom '.$proptype.' '.$saletype.' in '.$strings;
                   ?>

                  <article class="hentry">
                      <div class="property-featured">
                        <span class="featured"><i class="fa fa-star"></i></span>
                        <a class="content-thumb" href="<?php echo $href; ?>">
                          <img src="<?php echo $img; ?>" alt="<?php echo $desc; ?>">
                        </a>
                        <span class="property-label">Hot</span>
                        <span class="property-category"><a href="#"><?php echo $proptype; ?></a></span>
                      </div>
                      <div class="property-wrap">
                        <h2 class="property-title">
                          <a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
                        </h2>
                        <div class="property-excerpt">
                          <p><?php echo $charscount; ?></p>
                          <p class="property-fullwidth-excerpt"> <?php echo $charscount; ?></p>
                        </div>
                        <div class="property-summary">
                          <div class="property-detail">
                            <div class="size">
                              <span>0 sqft</span>
                            </div>
                            <div class="bathrooms">
                              <span>0</span>
                            </div>
                            <div class="bedrooms">
                              <span><?php echo $bed; ?></span>
                            </div>
                          </div>
                          <div class="property-info">
                            <div class="property-price">
                              <span>
                                <span class="amount">£ <?php echo $price; ?></span>
                              </span>
                            </div>
                            <div class="property-action">
                              <a href="<?php echo $href; ?>">More Details</a>
                            </div>
                          </div>
                          <div class="property-info property-fullwidth-info">
                            <div class="property-price">
                              <span><span class="amount">£ <?php echo $price; ?></span> </span>
                            </div>
                            <div class="size"><span>0 sqft</span></div>
                            <div class="bathrooms"><span>0</span></div>
                            <div class="bedrooms"><span><?php echo $bed; ?></span></div>
                          </div>
                        </div>
                      </div>
                      <div class="property-action property-fullwidth-action">
                        <a href="<?php echo $href; ?>">More Details</a>
                      </div>
                    </article>
<?php } // end for each
?>


    <div class="clearfix"></div>

                    <!-- START PAGINATION NAVIGATION -->
                    <nav class="pagination-nav">
                      <ul class="pagination list-center">
                        <?php foreach($pagination["links"] as $pag){
                        
                          if($pag["link"] == false)                    
                            echo '<li><span class="page-numbers current">'.$pag["name"].'</span></li>';
                          else  
                            echo '<li><a class="page-numbers" href="'.$pag["link"].'" title="'.$pag["title"].'">'.$pag["name"].'</a></li>';
                        
                        } ?>
                      </ul>
                    </nav>
                    <!-- END PAGINATION NAVIGATION -->
                  </div>
                  <!-- END PROPERTIES CONTENT -->
                </div>              
              </div>                              
            </div>        
            <!-- END MAIN CONTENT -->

          
          </div>
        </div>
      </div>
      <!-- END MAINBODY -->
    </div>
    <!-- END NOO WRAPPER -->