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
                      <form class="gsearchform" method="get" role="search" action="
                      <?php
                      
                      	echo $this->config->base_url()."houses/";
                      	if($saletype == "For Sale")
                      		echo "for-sale";
                      	elseif($saletype == "To Rent")
                      		echo "to-rent";
                      	echo "/index.html";
                      
                       ?>
                      ">
                        <div class="gsearch-content">                        
                                                          
                              <input type="text" class="form-control" name="search" value="<?php echo $searchvalue; ?>" placeholder="Search for address, town or area"/>
                               <br>                

                              <div class="form-group glocation" style="width:49%;float:left;">
                                 <input type="text" class="form-control" name="price1" value="<?php if(isset($filters["price1"])) echo $filters["price1"]; ?>"  placeholder="Min. Price" />
                            </div>

                             <div class="form-group glocation"  style="width:49%;float:right;">
                               <input type="text" class="form-control" name="price2" value="<?php if(isset($filters["price2"])) echo $filters["price2"]; ?>" placeholder="Max. Price" />
                            </div>

                             <div class="form-group glocation"  style="width:49%;float:left;">
                                <select class="form-control" name="bedroom1">
                                  <option value="">Min Bedroom</option>
                                  <option value="0"<?php if(isset($filters["bedroom1"]) && $filters["bedroom1"] === 0) echo " selected"; ?>>Studio</option>
                                  <option value="1"<?php if(isset($filters["bedroom1"]) && $filters["bedroom1"] === 1) echo " selected"; ?>>1</option>
                                  <option value="2"<?php if(isset($filters["bedroom1"]) && $filters["bedroom1"] === 2) echo " selected"; ?>>2</option>
                                  <option value="3"<?php if(isset($filters["bedroom1"]) && $filters["bedroom1"] === 3) echo " selected"; ?>>3</option>
                                  <option value="4"<?php if(isset($filters["bedroom1"]) && $filters["bedroom1"] === 4) echo " selected"; ?>>4</option>
                                  <option value="5"<?php if(isset($filters["bedroom1"]) && $filters["bedroom1"] === 5) echo " selected"; ?>>5</option>
                                </select>
                             </div>
                           

                             <div class="form-group glocation"  style="width:49%;float:right;">
                               <div class="label-select">
                                <select class="form-control" name="bedroom2">
                                  <option value="">Max Bedroom</option>
                                  <option value="0"<?php if(isset($filters["bedroom2"]) && $filters["bedroom2"] === 0) echo " selected"; ?>>Studio</option>
                                  <option value="1"<?php if(isset($filters["bedroom2"]) && $filters["bedroom2"] === 1) echo " selected"; ?>>1</option>
                                  <option value="2"<?php if(isset($filters["bedroom2"]) && $filters["bedroom2"] === 2) echo " selected"; ?>>2</option>
                                  <option value="3"<?php if(isset($filters["bedroom2"]) && $filters["bedroom2"] === 3) echo " selected"; ?>>3</option>
                                  <option value="4"<?php if(isset($filters["bedroom2"]) && $filters["bedroom2"] === 4) echo " selected"; ?>>4</option>
                                  <option value="5"<?php if(isset($filters["bedroom2"]) && $filters["bedroom2"] === 5) echo " selected"; ?>>5</option>
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
                            
                            <div class="form-group glocation">
                              <div class="label-select">

                                <select class="form-control" name="range">
                                  <option value="">Range</option>
                                  <option value="1/4"<?php if(isset($filters["range"]) && $filters["range"] === 0.25) echo " selected"; ?>>Within 1/4 mile</option>
                                  <option value="3/4"<?php if(isset($filters["range"]) && $filters["range"] === 0.75) echo " selected"; ?>>Within 3/4 mile</option>
                                  <option value="1"<?php if(isset($filters["range"]) && $filters["range"] === 1) echo " selected"; ?>>Within 1 mile</option>
                                  <option value="2"<?php if(isset($filters["range"]) && $filters["range"] === 2) echo " selected"; ?>>Within 2 miles</option>
                                  <option value="3"<?php if(isset($filters["range"]) && $filters["range"] === 3) echo " selected"; ?>>Within 3 miles</option>
                                  <option value="5"<?php if(isset($filters["range"]) && $filters["range"] === 5) echo " selected"; ?>>Within 5 miles</option>
                                  <option value="10"<?php if(isset($filters["range"]) && $filters["range"] === 10) echo " selected"; ?>>Within 10 miles</option>
                                  <option value="15"<?php if(isset($filters["range"]) && $filters["range"] === 15) echo " selected"; ?>>Within 15 miles</option>
                                  <option value="20"<?php if(isset($filters["range"]) && $filters["range"] === 20) echo " selected"; ?>>Within 20 miles</option>
                                  <option value="25"<?php if(isset($filters["range"]) && $filters["range"] === 25) echo " selected"; ?>>Within 25 miles</option>
                                  <option value="30"<?php if(isset($filters["range"]) && $filters["range"] === 30) echo " selected"; ?>>Within 30 miles</option>
                                  <option value="40"<?php if(isset($filters["range"]) && $filters["range"] === 40) echo " selected"; ?>>Within 40 miles</option>
                                </select>
                                
                              </div>
                            </div>

                                                                   
                            
                          <div class="gsearch-action">
                            <div class="gsubmit">
                             	<button class="btn btn-deault" type="submit" value="Search Property" name="action">Search Property</button>
                              </div>
                            </div>

                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
              
                <!-- END FIND PROPERTY -->

                <!-- START RECENT PROPERTY 
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
                END RECENT PROPERTY -->
                
                
              </div>
            </div>
            <!-- END SIDEBAR -->


				  	<!-- START MAIN CONTENT -->
				  	<div class="noo-content col-xs-12 col-md-9">
							<div class="recent-properties">
								<div class="properties grid">
	                <!-- START PROPERTIES HEADER -->
				  				<div class="properties-header">
										<h1 class="page-title">Properties <?php echo $saletype; ?> in <?php echo $searchvalue; ?></h1>

										<div class="properties-toolbar">
                      <form class="properties-ordering" method="get">
                        <div class="properties-ordering-label">Sorted by</div>
                        <div class="form-group properties-ordering-select">
                          <div class="label-select">
                            <select class="form-control" name="orderby">
                              <option value="distance">Distance</option>
                              <option value="recent">Most Recent</option>
                              <option value="pricelow">Lowest Price</option>
                              <option value="pricehigh">Highest Price</option>
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
            $desc = $proptype.' in '.$strings.' '.$searchvalue;
            
            
            if($bed > 1)
            	$title = $bed.' Bedroom ';
            elseif($bed == 1)
            	$title = $bed.' Bedrooms ';
            else
            	$title = "Studio ";
            	
            $title .= $proptype.' '.$saletype.' in '.$strings;
            
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
                          <p><strong><?php echo $desc; ?></strong><br><?php echo $charscount; ?></p>                          
                        </div>
                        <div class="property-summary">
                          <div class="property-detail">
                            <p>
                            	<span><Strong>
	                            	<?php 
	                            	if($bed > 1)
						 echo $bed.' Bedroom ';
					elseif($bed == 1)
						  echo $bed.' Bedrooms';
					 else
						  echo "Studio "; ?>
				</strong></span>
                            	
                            </p>
                            
                            <!--<div class="size">
                              <span>0 sqft</span>
                            </div>
                            <div class="bathrooms">
                              <span>0</span>
                            </div>
                            <div class="bedrooms">
                              <span><?php echo $bed; ?></span>
                            </div> -->
                            
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
                         
                          <!-- <div class="property-info property-fullwidth-info">
	                            <div class="property-price">
	                              <span><span class="amount">£ <?php echo $price; ?></span> </span>
	                            </div>
                            
                            
	                            
	                            <div class="size"><span>0 sqft</span></div>
	                            <div class="bathrooms"><span>0</span></div>
	                            <div class="bedrooms"><span><?php echo $bed; ?></span></div> 
                          </div>-->
                          
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