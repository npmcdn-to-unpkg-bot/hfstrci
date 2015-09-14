<!-- START NOO WRAPPER -->
    <div class="noo-wrapper">
      <!-- START NOO MAINBODY -->
      <div class="container noo-mainbody">
        <div class="noo-mainbody-inner">
          <div class="row clearfix">
          
          
           <!-- START SIDEBAR -->
            <div class="noo-sidebar noo-sidebar-right col-xs-12 col-md-3">
              <div class="noo-sidebar-inner">
              
              	<div class="mobile-show"><a href="#" id="showfilter" style="text-align:center;"><h3 class="title-block-sidebar"><strong>+</strong> Show Search</h3></a></div>
              
                <div class="block-sidebar find-property" id="find-property">
                  <h3 class="title-block-sidebar">Find a Property</h3>
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
                      " id="search-form">
                        <div class="gsearch-content">
                          <div class="gsearch-field">
                       
                            <div class="form-group gtype">                           
                              <input type="text" class="form-control" name="search" value="<?php echo $formatted_address; ?>" placeholder="Search for address, town or area"/>
                            </div>              

                            <div class="form-group glocation" style="width:49%;float:left;">
                                 <input type="text" class="form-control" name="price1" value="<?php if(isset($filters["price1"])) echo $filters["price1"]; ?>"  placeholder="Min. Price" />
                            </div>

                             <div class="form-group glocation"  style="width:49%;float:right;">
                               <input type="text" class="form-control" name="price2" value="<?php if(isset($filters["price2"])) echo $filters["price2"]; ?>" placeholder="Max. Price" />
                            </div>

                             <div class="form-group glocation"  style="width:49%;float:left;">
                              <div class="label-select">
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
                            <div class="clear"></div>
                            
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

                             <div class="form-group glocation">
                               <ul>
                      					<li>
                      						<input type="checkbox" name="property-type[]" value="Flat" id="flat" <?php if(isset($filters['propertytype']) && in_array("Flat",$filters['propertytype'])) echo "checked"; ?>/>Flat <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Flat"]))echo $proptypeinfo["Flat"]["popularity"]; else echo "0"; ?> Flats]</span>
                      						<ul>
                      							<li><input type="checkbox" name="property-type[]" value="Penthouse" class="flat" <?php if(isset($filters['propertytype']) && in_array("Penthouse",$filters['propertytype'])) echo "checked"; ?>/>Penthouse <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Penthouse"]))echo $proptypeinfo["Penthouse"]["popularity"]; else echo "0"; ?> Penthouses]</span></li>
                      							<li><input type="checkbox" name="property-type[]" value="Studio" class="flat" <?php if(isset($filters['propertytype']) && in_array("Studio",$filters['propertytype'])) echo "checked"; ?>/>Studio <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Studio"]))echo $proptypeinfo["Studio"]["popularity"]; else echo "0"; ?> Studios]</span></li>
                      						</ul>
                      					</li>
                      					<li>
                      						<input type="checkbox" name="property-type[]" value="House" id="house" <?php if(isset($filters['propertytype']) && in_array("House",$filters['propertytype'])) echo "checked"; ?>/>House <span style="font-size:10px;">[<?php if(isset($proptypeinfo["House"]))echo $proptypeinfo["House"]["popularity"]; else echo "0"; ?> Houses]</span>
                      						<ul>
                      							<li><input type="checkbox" name="property-type[]" value="Detached house" class="house" <?php if(isset($filters['propertytype']) && in_array("Detached house",$filters['propertytype'])) echo "checked"; ?>/>Detached house <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Detached house"]))echo $proptypeinfo["Detached house"]["popularity"]; else echo "0"; ?> Detached houses]</span></li>
                      							<li><input type="checkbox" name="property-type[]" value="Semi Detached" class="house" <?php if(isset($filters['propertytype']) && in_array("Semi Detached",$filters['propertytype'])) echo "checked"; ?>/>Semi Detached <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Semi Detached"]))echo $proptypeinfo["Semi Detached"]["popularity"]; else echo "0"; ?> Semi Detached]</span></li>
                      							<li><input type="checkbox" name="property-type[]" value="Maisonette" class="house" <?php if(isset($filters['propertytype']) && in_array("Maisonette",$filters['propertytype'])) echo "checked"; ?>/>Maisonette <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Maisonette"]))echo $proptypeinfo["Maisonette"]["popularity"]; else echo "0"; ?> Maisonettes]</span></li>
                      							<li><input type="checkbox" name="property-type[]" value="Terraced house" class="house" <?php if(isset($filters['propertytype']) && in_array("Terraced house",$filters['propertytype'])) echo "checked"; ?>/>Terraced house <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Terraced house"]))echo $proptypeinfo["Terraced house"]["popularity"]; else echo "0"; ?> Terraced houses]</span></li>
                      							<li><input type="checkbox" name="property-type[]" value="Town house" class="house" <?php if(isset($filters['propertytype']) && in_array("Town house",$filters['propertytype'])) echo "checked"; ?>/>Town house <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Town house"]))echo $proptypeinfo["Town house"]["popularity"]; else echo "0"; ?> Town house]</span></li>
                      							<li><input type="checkbox" name="property-type[]" value="Cottage" class="house" <?php if(isset($filters['propertytype']) && in_array("Cottage",$filters['propertytype'])) echo "checked"; ?>/>Cottage <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Cottage"]))echo $proptypeinfo["Cottage"]["popularity"]; else echo "0"; ?> Cottages]</span></li>
                      						</ul>
                      					</li>
                      					<li><input type="checkbox" name="property-type[]" value="House share" <?php if(isset($filters['propertytype']) && in_array("House share",$filters['propertytype'])) echo "checked"; ?>/>House/Flat share</li>
                      					
                      					<li><input type="checkbox" name="property-type[]" value="Commercial" <?php if(isset($filters['propertytype']) && in_array("Commercial",$filters['propertytype'])) echo "checked"; ?>/>Commercial <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Commercial"]))echo $proptypeinfo["Commercial"]["popularity"]; else echo "0"; ?> Commercial]</span></li>
                      					<li><input type="checkbox" name="property-type[]" value="Barn conversion" <?php if(isset($filters['propertytype']) && in_array("Barn conversion",$filters['propertytype'])) echo "checked"; ?>/>Barn conversion <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Barn conversion"]))echo $proptypeinfo["Barn conversion"]["popularity"]; else echo "0"; ?> Barn conversion]</span></li>
                      					<li><input type="checkbox" name="property-type[]" value="Bungalow" <?php if(isset($filters['propertytype']) && in_array("Bungalow",$filters['propertytype'])) echo "checked"; ?>/>Bungalow <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Bungalow"]))echo $proptypeinfo["Bungalow"]["popularity"]; else echo "0"; ?> Bungalow]</span></li>
                      					<li><input type="checkbox" name="property-type[]" value="Mill" <?php if(isset($filters['propertytype']) && in_array("Mill",$filters['propertytype'])) echo "checked"; ?>/>Mill <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Mill"]))echo $proptypeinfo["Mill"]["popularity"]; else echo "0"; ?> Mill]</span></li>
                      					<li><input type="checkbox" name="property-type[]" value="Plot of Land" <?php if(isset($filters['propertytype']) && in_array("Plot of Land",$filters['propertytype'])) echo "checked"; ?>/>Land <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Plot of Land"]))echo $proptypeinfo["Plot of Land"]["popularity"]; else echo "0"; ?> Plots of Land]</span></li>
                      					<li><input type="checkbox" name="property-type[]" value="New build" <?php if(isset($filters['propertytype']) && in_array("New build",$filters['propertytype'])) echo "checked"; ?>/>New build <span style="font-size:10px;">[<?php if(isset($proptypeinfo["New build"]))echo $proptypeinfo["New build"]["popularity"]; else echo "0"; ?> New build]</span></li>
                      					<li><input type="checkbox" name="property-type[]" value="Retirement property" <?php if(isset($filters['propertytype']) && in_array("Retirement property",$filters['propertytype'])) echo "checked"; ?>/>Retirement property <span style="font-size:10px;">[<?php if(isset($proptypeinfo["Retirement properties"]))echo $proptypeinfo["Retirement property"]["popularity"]; else echo "0"; ?> Retirement property]</span></li>
                      				</ul>                               
                            </div>
                          </div>      
                            
                            <div class="gsearch-action">
                              <div class="gsubmit">
                               	<button class="btn btn-deault" type="submit" value="Search Property" name="action">Search my Property</button>
                                </div>
                            </div>

                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
              
                <!-- END FIND PROPERTY -->
                
                 <?php if($lat && $lng){ 
	                echo '<div class="block-sidebar">
	                  <h3 class="title-block-sidebar">Map</h3>
	                  <div id="map" style="width:100%;height:250px;background:gray;"></div>
	                  <span>'.$formatted_address.'</span>
	                  <script type="text/javascript">var lat = '.$lat.'; var lng = '.$lng.';var srange = '.$filters["range"].';var loctitle = "'.$formatted_address.'";</script>
	                </div>';
	               }              
                ?>
              </div>
            </div>
            <!-- END SIDEBAR -->
            <!-- START MAIN CONTENT -->
            <div class="noo-content col-xs-12 col-md-9">
            
            <?php if(isset($bread)){
				  				
				  				echo '<div class="bread">';
				  				$first = true;
				  				
				  				echo '<a href="'.$breadbase.'" title="Houses '.$bread[0]["type"].'"> Houses '.$bread[0]["type"].'</a>';
				  					foreach($bread as $brea){
				  						if($brea["active"] === true){
				  						
				  						echo ' > <a href="'.$brea["link"].'" title="Houses '.$brea["type"].' in '.$brea["name"].'"> '.$brea["name"].'</a>';
				  						}else{
				  						echo ' > '.$brea["name"];
				  						}
				  					
				  					}
				  						
				  				echo '</div><div style="clear:both"></div>';
				  				}
				  				?>
              <!-- START TAB SHORTCODE -->
              <div class="row noo-row tab-shortcode clearfix">
                <div class="col-xs-12 noo-col">
                  <div class="horizontal-tab-shortcode">
                    <div class="noo-text-block">
                      <h3 class="text-primary">House price <?php echo $formatted_address; ?></h3>
                    </div>
                    <div class="noo-tabs">
                      <ul class="nav nav-tabs" role="tablist" id="noo-tabs-1">
                        <li class="active"><a role="tab" data-toggle="tab" href="#tab-1412644835-1-13">House price in <?php echo $formatted_address; ?></a>
                        </li>
                        <li><a role="tab" data-toggle="tab" href="#tab-1412644835-2-69">Related Search</a>
                        </li>
                        <li><a role="tab" data-toggle="tab" href="#tab-1412645519594-2-5">Relevant Information</a>
                        </li>
                        <li><a role="tab" data-toggle="tab" href="#tab-1412645623737-3-1">Property distribution</a>
                        </li>
                      </ul>

                      <div class="tab-content">
           
                        <div class="tab-pane active" id="tab-1412644835-1-13">
                          <div class="noo-text-block">
		                            <!-- START COUNTER SHORTCODE -->
		              <div class="row noo-row counter-shortcode clearfix">
		                <div class="col-xs-12 noo-col">
		                  <div class="noo-text-block">
		                    <h3 class="text-primary"></h3>
		                    <p></p>
		                  </div>
		                  <hr class="noo-gap" style=" margin: 5px 0 0 0;">
		                  <div class="noo-vc-row row">
		                    <div class="noo-col col-xs-12 col-sm-6 col-md-3">
		                      <div class="noo-counter-holder">
		                        <span class="noo-counter"><?php echo $cnum ?>+</span>
		                        <div class="counter-text">
		                          <h3>PROPERTIES</h3>
		                          <p>We offer you more than <?php echo $cnum ?> <strong>houses for sale in <?php echo $formatted_address; ?></strong>.</p>
		                        </div>
		                      </div>
		                    </div>
		                    <div class="noo-col col-xs-12 col-sm-6 col-md-3">
		                      <div class="noo-counter-holder">
		                        <span class="noo-counter">£<?php echo number_format($prices["0"]->avgp,2) ; ?></span>
		                        <div class="counter-text">
		                          <h3>AVERAGE</h3>
		                          <p>The Average price for a <strong>house in <?php echo $formatted_address; ?>></strong> is <strong>£<?php echo number_format($prices["0"]->avgp,2); ?></strong>.</p>
		                        </div>
		                      </div>
		                    </div>
		                    <div class="noo-col col-xs-12 col-sm-6 col-md-3">
		                      <div class="noo-counter-holder">
		                        <span class="noo-counter">£<?php echo number_format($prices["0"]->minp,2); ?></span>
		                        <div class="counter-text">
		                          <h3>MINIMUM</h3>
		                          <p>The minimum price for a <strong>house for sale in <?php echo $formatted_address; ?></strong> is <strong>£<?php echo number_format($prices["0"]->minp,2); ?></strong>.</p>
		                        </div>
		                      </div>
		                    </div>
		                    <div class="noo-col col-xs-12 col-sm-6 col-md-3">
		                      <div class="noo-counter-holder">
		                        <span class="noo-counter">£<?php echo number_format($prices["0"]->maxp,2); ?></span>
		                        <div class="counter-text">
		                          <h3>MAXIMUM</h3>
		                          <p>The maximum price for a <strong>house for sale in <?php echo $formatted_address; ?></strong> is <strong>£<?php echo number_format($prices["0"]->maxp,2); ?></strong>.</p>
		                        </div>
		                      </div>
		                    </div>
		                  </div>
		                </div>
		              </div>            
		              <hr class="noo-gap" style="margin: 0 0 5px 0;">
		              <!-- END COUNTER SHORTCODE -->
                          </div>
                        </div>
                        
                        <div class="tab-pane" id="tab-1412644835-2-69">
                          <div class="noo-text-block">
                           <ul class="noo-content col-xs-12 col-md-4">
	                  	<li><a href="<?php echo $related["housesale"]; ?>" title="Houses for sale in <?php echo $searchvalue; ?>">Houses for Sale in <?php echo $searchvalue; ?></a></li>	                  	
	                  	<li><a href="<?php echo $related["flatsale"]; ?>" title="Flat for sale in <?php echo $searchvalue; ?>">Flat for Sale in <?php echo $searchvalue; ?></a></li>                  	
	                  	<li><a href="<?php echo $related["flatsale"]; ?>" title="Houses to rent in <?php echo $searchvalue; ?>">Houses to rent in <?php echo $searchvalue; ?></a></li>	                  	
	                  	<li><a href="<?php echo $related["flatrent"]; ?>" title="Flat to rent in <?php echo $searchvalue; ?>">Flat to rent in <?php echo $searchvalue; ?></a></li>
	                  </ul>
	                  <ul class="noo-content col-xs-12 col-md-4">
	                  	<li><a href="<?php echo $related["0bedsale"]; ?>" title="Studio for sale in <?php echo $searchvalue; ?>">Studio for Sale in <?php echo $searchvalue; ?></a></li>	                  	
	                  	<li><a href="<?php echo $related["1bedsale"]; ?>" title="1 bedroom for sale in <?php echo $searchvalue; ?>">1 bedroom for Sale in <?php echo $searchvalue; ?></a></li>	                  	
	                  	<li><a href="<?php echo $related["2bedsale"]; ?>" title="2 bedroom for sale in <?php echo $searchvalue; ?>">2 bedroom for Sale in <?php echo $searchvalue; ?></a></li>	                  	
	                  	<li><a href="<?php echo $related["3bedsale"]; ?>" title="3 bedroom for sale in <?php echo $searchvalue; ?>">3 bedroom for Sale in <?php echo $searchvalue; ?></a></li>	                  	
	                  	<li><a href="<?php echo $related["4bedsale"]; ?>" title="4 bedroom for sale in <?php echo $searchvalue; ?>">4 bedroom for Sale in <?php echo $searchvalue; ?></a></li>	                  	
	                  	<li><a href="<?php echo $related["5bedsale"]; ?>" title="5+ bedroom for sale in <?php echo $searchvalue; ?>">5+ bedroom for Sale in <?php echo $searchvalue; ?></a></li>
	                  </ul>
	                  <ul class="noo-content col-xs-12 col-md-4">
	                  	<li><a href="<?php echo $related["0bedrent"]; ?>" title="Studio to rent in <?php echo $searchvalue; ?>">Studio to rent in <?php echo $searchvalue; ?></a></li>	 
	                  	<li><a href="<?php echo $related["1bedrent"]; ?>" title="1 bedroom to rent in <?php echo $searchvalue; ?>">1 bedroom to rent in <?php echo $searchvalue; ?></a></li>	                  	
	                  	<li><a href="<?php echo $related["2bedrent"]; ?>" title="2 bedroom to rent in <?php echo $searchvalue; ?>">2 bedroom to rent in <?php echo $searchvalue; ?></a></li>	                  	
	                  	<li><a href="<?php echo $related["3bedrent"]; ?>" title="3 bedroom to rent in <?php echo $searchvalue; ?>">3 bedroom to rent in <?php echo $searchvalue; ?></a></li>	                  	
	                  	<li><a href="<?php echo $related["4bedrent"]; ?>" title="4 bedroom to rent in <?php echo $searchvalue; ?>">4 bedroom to rent in <?php echo $searchvalue; ?></a></li>	                  	
	                  	<li><a href="<?php echo $related["5bedrent"]; ?>" title="5+ bedroom to rent in <?php echo $searchvalue; ?>">5+ bedroom to rent in <?php echo $searchvalue; ?></a></li>
	                  </ul>
	                  
	                  <div style="clear:both"></div>
                          </div>
                        </div>

                        <div class="tab-pane" id="tab-1412645519594-2-5">
                          <hr class="noo-gap" style=" margin: 5px 0 0 0;">
                          <div class="noo-text-block">
                            <p style="text-align: justify;">
	                  We have <?php if($cnum == 500) echo "500+"; else echo $cnum; ?> properties <?php echo strtolower($saletype); ?> in <?php echo $searchvalue; ?>.
	                  The average price for a <?php echo round($relatedproptype[0]["avgbed"])." bedroom ".$relatedproptype[0]["proptype"]; ?> in <?php echo $searchvalue; ?> is £<?php echo number_format($relatedproptype[0]["avgprice"],2); ?>.</p>
			
			<?php if(isset($relatedproptype[0])){ ?>
			<p style="text-align: justify;">The most usual property type available <?php echo strtolower ($saletype); ?> in <?php echo $searchvalue; ?> are <?php echo round($relatedproptype[0]["avgbed"])." bedroom ".$relatedproptype[0]["proptype"]; ?><?php if(isset($relatedproptype[1])){ ?> and <?php echo round($relatedproptype[1]["avgbed"])." bedroom "; echo $relatedproptype[1]["proptype"]; ?><?php } ?><br />
To help you find your next house in <?php echo $searchvalue; ?> please feel free to try the following popular links:</p>

			<?php } ?>
			<ul>
			<?php
			
			for($i = 0;$i < count($relatedproptype);$i++){
			$tit = "";
			if($relatedproptype[$i]["avgbed"] != 0)
				$tit .= $relatedproptype[$i]["avgbed"].' bedroom ';
			$tit .= $relatedproptype[$i]["proptype"].' '.strtolower($saletype).' in '.$searchvalue.'';
			echo '<li><a href="'.$relatedproptype[$i]["link"].'" title="'.$tit.'">'.$tit.'</a></li>';
			
			} ?>
	
			</ul>
                          </div>
                        </div>
                   
                        <div class="tab-pane" id="tab-1412645623737-3-1">
                          <div class="noo-text-block">
                         <!-- START PROGRESS BAR SHORTCODE -->
        			              <div class="row noo-row progress-bar-shortcode clearfix">
        			                <div class="col-xs-12 noo-col">
        			                  <div class="noo-text-block">
        			                    <h3 class="text-primary">Property distribution</h3>
        			                    <p>Houses for Sale & to Rent offers you different types of properties in different areas. Follow the list of property types in <?php echo $formatted_address; ?>.</p>
        			                  </div>
        			                  <hr class="noo-gap" style=" margin: 50px 0 0 0;">
        			                  <div class="row noo-row clearfix">
        			                    <div class="noo-col col-xs-12 col-md-12">
        			                      <div class="noo-progress-bar lean-bars rounded-bars">
        			                       
        			                   <?php foreach ($proptypeinfo as $propkey => $proptype) { 
        			                   	if($propkey == ""){
								continue;		
        			                   	}
        			                   			$pctcalc = round(100 * $proptype["popularity"] / $cnum);
        			                   			if($pctcalc == 0)
        			                   				$pctcalc = 1;
        			                   			
        			                   	?>
        			                       
        			                       	<div class="progress animatedParent">
        			                          <div class="progress-bar-wrap" style="width: <?php echo $pctcalc; ?>%;">
        			                            <div class="progress-bar progress-bar-primary animated" role="progressbar" data-valuenow="<?php echo $pctcalc; ?>" aria-valuenow="<?php echo $pctcalc; ?>" aria-valuemin="0" aria-valuemax="100" >
        			                            </div>
        			                          </div>
        			                          <div class="progress_title"><?php echo $propkey; ?></div>
        			                          <div class="progress_label"><span class="noo-counter">(<?php echo $proptype["popularity"]; ?> <?php echo $propkey; ?>) <?php echo $pctcalc; ?></span>&#37;</div>
        			                        </div>

        			                   <?php } ?>                                     
        			                      </div>
        			                    </div>            
        			                  </div>
        			                </div>
        			              </div>
			              <!-- END PROGRESS BAR SHORTCODE -->
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <hr class="noo-gap" style="margin: 0 0 0 0;">
              <!-- END TAB SHORTCODE -->
              <!-- START RECENT PROPERTIES SLIDER - SHORTCODE -->
              
							<div class="row noo-row clearfix">
								<div class="col-xs-12 noo-col">
									<div class="recent-properties recent-properties-slider">
								  	<div class="recent-properties-inner">
								  		<div class="section-title">
								        <h3>Houses for Sale in <?php echo $formatted_address; ?></h3>
								      </div>
								      <div class="recent-properties-content">
								        <div class="caroufredsel-wrap">
								          <ul>
								            <li>
								              <div class="property-row">
								               
								               
								               
								               <?php   
								               
								        
$ic = 0;            

foreach($resultsproperties as $k){
   $ic++;
   if($ic == 3){
   
   echo '</div> <div class="property-row">';
   
   }

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
                $addss[$i] = preg_replace('/9/', '', $addss[$i] ); // remove numbers
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
            $charscount = substr($your_string_without_tags, 0, 150);
            $img = $k->photo_feed;
            $add = "";
            $rand = rand(1,1440);
            if($proptype == "Flat" or $proptype == "Appartament" or $proptype == "studio"){
            	$add = "f";
            	$rand = rand(1,28);
            }
            $img = "http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/images/{$add}{$rand}.jpg";
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
                   
								                <article class="hentry has-featured">
								                  <div class="property-featured">
								                    <a class="content-thumb" href="<?php echo $href; ?>">
								                      <img src="<?php echo $img; ?>" class="attachment-property-thumb" alt="<?php echo $desc; ?>" />
								                    </a>
								                    <span class="property-category">
						                        	<a href="#" ><?php echo $proptype; ?></a>
						                        </span>
								                   
								                  </div>
								                  <div class="property-wrap">
								                    <h2 class="property-title">
                                     <a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
                                    </h2>
								                    <div class="property-excerpt">
								                      <p><?php echo $charscount; ?></p>
								                    </div>
								                  </div>
								                  <div class="property-summary">
								                    <div class="property-info">
								                      <div class="property-price">
								                        <span><span class="amount">£ <?php echo $price; ?></span></span>
								                      </div>
								                      <div class="property-action">
								                        <a href="<?php echo $href; ?>">More Details</a>
								                      </div>
								                    </div>
								                  </div>
								                </article>
			                
			         <?php } // end for each
?>
	               
								              </div>
								            </li>								            
								          </ul>
								        </div>
								        
								      </div>
								  	</div>
								  </div>																
								</div>
							</div>
							<!-- END RECENT PROPERTIES SLIDER - SHORTCODE -->

              <hr class="noo-gap" style="margin: 0 0 5px 0;">
              
              
              <!-- START ICON LIST ITEM SHORTCODE -->
              <div class="row noo-row icon-list-item-shortcode clearfix">
                <div class="col-xs-12 noo-col">
                  <div class="noo-text-block">
                    <h3 class="text-primary"><?php echo $verb; ?> of <?php echo $areaname; ?></h3>
                    <p>Navigate through our locations to find the location of your next house in <?php echo $areaname; ?> for sale or to rent.</p>
                  </div>
                  <hr class="noo-gap" style=" margin: 50px 0 0 0;">
                  <div class="row noo-row clearfix">
                  
                  <div class="col-xs-6 col-md-4 noo-col">
                    
                    <ul class="noo-ul-icon fa-ul">
                    
                  <?php 
                  print_r($results);
                  if(isset($resultslinks)){
	                  $count = count($resultslinks);
	                  $cl = ceil($count / 3);
	                  $i = 0;
	                  
	                  foreach($resultslinks as $res){
	                  	if($i % $cl == 0 && $i > 0  ){
	                  		echo '</ul></div><div class="col-xs-6 col-md-4 noo-col">
	                    			<ul class="noo-ul-icon fa-ul">';
	                  	}
	                  	$i++;
	                  	echo '<li class="noo-li-icon" style=" font-size: 14px; color: #40d1af;">
	                        
	                        <p><a href="'.$res["link"].'" title="Properties in '.$res["title"].'" />Houses in '.$res["title"].'</a></p>
	                      </li>';
	                  
	                  
	                  
	                  }
                  }elseif(isset($results)){
                  	
	                  echo "<table>";
	                  $co = 1;
			foreach($results as $k){
			           //$tw = ucwords(strtolower($k["TOWN"]));
			            //$ward = ucwords(strtolower($k["WARD"]));
			            $p = $k->price;
			            $d = str_replace('"',"",$k->date);
			            //$type = $k->proptype"];
			            $paon = $k->PAON;
			            $s = ucwords(strtolower($k->street));
			            $l = ucwords(strtolower($k->locality));
			            $town = ucwords(strtolower($k->town));
			            $county = ucwords(strtolower($k->county));
			            if($co === 1){
			                echo 'Road: '.$s.', '.$areaspace.', '.$town.', '.$county.' - '.$codespace.'</h2></p><table>';$co++;
			            }
			            $datef = new DateTime($d);
			            $datef = $datef->format('d/m/Y');
			            echo '<tr><td>'.$paon.', '.$s.', '.$areaspace.', '.$town.', '.$districtname.'</td><td>'.$codespace;
			            echo '</td><td>sold in '.$datef.'</td><td>  £'.$p.'</td></tr>';
			 }
	                  
	                  
	                  echo "</table>";
                  }?>
                  
                  </ul>
                    </div>                  

                  </div>
                </div>
              </div>
              <hr class="noo-gap" style="margin: 0 0 50px 0;">
              <!-- END ICON LIST ITEM SHORTCODE -->
              <!-- START BUY THIS ITEM -->
              <div class="buy_this_item">
                <div class="cta_buy_theme">
                  <div class="row clearfix">
                    <div class="col-sm-12 col-md-8">
                    <hr class="hr_cta_buy_theme">
                      <div class="text-block">
                        <p>Is <?php echo $countryspace; ?> the area you are looking for, look some houses in <?php echo $formatted_address; ?>: </p>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <div class="text-block">
                        <a href="<?php echo $canonical; ?>" alt="Houses For Sale in <?php echo $countryspace; ?>" class="btn btn-lg rounded pressable btn-secondary">For Sale</a>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <div class="text-block">
                        <a href="<?php echo str_replace("for-sale","to-rent",$canonical); ?>" alt="Houses For Sale in <?php echo $countryspace; ?>" class="btn btn-lg rounded pressable btn-secondary">To Rent</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END BUY THIS ITEM -->
            </div>        
            <!-- END MAIN CONTENT -->
          </div>
        </div>
      </div>
      <!-- END NOO MAINBODY -->
    </div>
    <!-- END NOO WRAPPER -->
