<?php /* -BANNER- <center>
<script type='text/javascript'>
 <!--//<![CDATA[
   if (!window.AdButler){(function(){var s = document.createElement("script"); s.async = true; s.type = "text/javascript";s.src = 'http://ab168091.adbutler-tachyon.com/app.js';var n = document.getElementsByTagName("script")[0]; n.parentNode.insertBefore(s, n);}());}
      var AdButler = AdButler || {}; AdButler.ads = AdButler.ads || [];
      var abkw = window.abkw || '';
      var plc208807 = window.plc208807 || 0;
      document.write('<'+'div id="placement_208807_'+plc208807+'"></'+'div>');
      AdButler.ads.push({handler: function(opt){ AdButler.register(168091, 208807, [320,100], 'placement_208807_'+opt.place, opt); }, opt: { place: plc208807++, keywords: abkw, domain: 'ab168091.adbutler-tachyon.com', click:'CLICK_MACRO_PLACEHOLDER' }});
//]]>-->
</script>
</center>*/ ?>

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
                <div class="mobile-show"><a href="#" id="showfilter" style="text-align:center;"><h3 class="title-block-sidebar"><strong>+</strong> Show Filters</h3></a></div>

                <div class="block-sidebar find-property" id="find-property">
                  <h3 class="title-block-sidebar" style="padding-left: 12px;font-size: 17px;margin-top: -5px;padding-bottom: 0px;">Find a Property</h3>
                  <div class="gsearch">
                    <div class="gsearch-wrap">
                      <form class="gsearchform" method="get" role="search" action="
                      <?php

                      	echo $this->config->base_url()."houses/";
                      	if($saletype == "For Sale") {
                          echo "for-sale";
                          $type_search = "sale";
                        }
                      	elseif($saletype == "To Rent") {
                          echo "to-rent";
                          $type_search = "rent";
                        }
                      	echo "/index.html";

                       ?>
                      " id="search-form">
                        <div class="gsearch-content">
                          <div class="gsearch-field">

                            <div class="form-group gtype">
                              <input type="text" class="form-control" name="search" id="search" value="<?php echo $searchvalue; ?>" placeholder="Search for address, town or area"/>
                            </div>

                            <div class="form-group glocation" style="width:49%;float:left;">
                                 <input type="text" class="form-control" name="price1" value="<?php if(isset($filters["price1"])) echo $filters["price1"]; ?>"  placeholder="Min. Price" />
                            </div>

                             <div class="form-group glocation"  style="width:49%;float:right;">
                               <input type="text" class="form-control" id="max_price" name="price2" value="<?php if(isset($filters["price2"])) echo $filters["price2"]; ?>" placeholder="Max. Price" />
                            </div>

                             <div class="form-group glocation"  style="width:49%;float:left;">
                              <div class="label-select1">
                                <select class="form-control1 bedroom1 " name="bedroom1" >
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
                                <div class="label-select1">
                                <select class="form-control1 bedroom2 " name="bedroom2">
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
                              <div class="label-select1">

                                <select class="form-control1 range " name="range">
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
                               	<button class="btn btn-deault" id="search_my_pro" type="submit" value="Search Property" name="action">Search my Property</button>
                                </div>


                              <!-- hendar -->
                                &nbsp;
                                <div class="gsubmit">
                                  <button type="button" class="btn btn-save" id="savesearch"
                                          data-toggle="modal" data-target="#formSubcribe"
                                          data-type="<?php echo isset($bread[0]['type'])?$bread[0]['type']:''; ?>"
                                          data-geo1="<?php echo isset($bread[0]['name'])?$bread[0]['name']:''; ?>"
                                          data-geo2="<?php echo isset($bread[1]['name'])?$bread[1]['name']:''; ?>"
                                  >Save Search</button>
                                </div>
                              <div class="banner_get_free">
                                <a href="http://www.internet-mortgage-services.co.uk/houses-for-sale-or-to-rent" target="_blank">
                                  <img src="<?php echo $this->config->base_url(); ?>/images/get_free.png" />
                                </a>
                              </div>
                                <!-- Modal Form Subscribe -->
                                <div class="modal" id="formSubcribe" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="registerModalLabel">Sign in or register to save home</h4>
                                      </div>
                                      <div class="modal-body">
                                        <div id="email_error" class="alert alert-danger">
                                          Invalid Email
                                        </div>

                                        <form class="contact">
                                          <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                          </div>
                                        </form>

                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" id="submit" class="btn btn-success">Submit</button>
                                        I accept the <a target="_blank" href='<?php echo $this->config->base_url(); ?>/termsandconditions'>terms of use</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>

                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                <!-- END FIND PROPERTY -->

                  <?php /* -BANNER-   <div class="banner_ads_left">
                            <script type='text/javascript'>
                             <!--//<![CDATA[
                               if (!window.AdButler){(function(){var s = document.createElement("script"); s.async = true; s.type = "text/javascript";s.src = 'http://ab168091.adbutler-tachyon.com/app.js';var n = document.getElementsByTagName("script")[0]; n.parentNode.insertBefore(s, n);}());}
                                  var AdButler = AdButler || {}; AdButler.ads = AdButler.ads || [];
                                  var abkw = window.abkw || '';
                                  var plc208807 = window.plc208807 || 0;
                                  document.write('<'+'div id="placement_208807_'+plc208807+'"></'+'div>');
                                  AdButler.ads.push({handler: function(opt){ AdButler.register(168091, 208807, [320,100], 'placement_208807_'+opt.place, opt); }, opt: { place: plc208807++, keywords: abkw, domain: 'ab168091.adbutler-tachyon.com', click:'CLICK_MACRO_PLACEHOLDER' }});
                            //]]>-->
                            </script>
                      </div> */ ?>




                <?php if($lat && $lng){
	                echo '<div class="block-sidebar">

	                ';  //<div id="map" style="margin-top:15px;width:100%;height:250px;background:gray;"></div>
	                  echo '<span>'.$formatted_address.'</span>
										<div itemprop="geo" itemscope="" itemtype="http://schema.org/GeoCoordinates">
								        <meta itemprop="latitude" content="'.$lat.'">
								        <meta itemprop="longitude" content="'.$lng.'">
								    </div>
	                  <script type="text/javascript">
                    localStorage.setItem("search","'.$searchvalue.'");
                    localStorage.setItem("salerent","'.$type_search.'");
                    var lat = '.$lat.'; var lng = '.$lng.';var srange = '.$filters["range"].';var loctitle = "'.$searchvalue.'";</script>
	                </div>';
	               }
                ?>

                <div class="block-sidebar">
	                  <h3 class="title-block-sidebar">Related Search</h3>
	                  <ul>
	                  	<li><a href="<?php echo $related["housesale"]; ?>" title="Houses for sale in <?php echo $searchvalue; ?>">Houses for Sale in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["flatsale"]; ?>" title="Flat for sale in <?php echo $searchvalue; ?>">Flat for Sale in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["flatsale"]; ?>" title="Houses to rent in <?php echo $searchvalue; ?>">Houses to rent in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["flatrent"]; ?>" title="Flat to rent in <?php echo $searchvalue; ?>">Flat to rent in <?php echo $searchvalue; ?></a></li>
	                  	<li><hr /></li>
	                  	<li><a href="<?php echo $related["0bedsale"]; ?>" title="Studio for sale in <?php echo $searchvalue; ?>">Studio for Sale in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["1bedsale"]; ?>" title="1 bedroom for sale in <?php echo $searchvalue; ?>">1 bedroom for Sale in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["2bedsale"]; ?>" title="2 bedrooms for sale in <?php echo $searchvalue; ?>">2 bedrooms for Sale in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["3bedsale"]; ?>" title="3 bedrooms for sale in <?php echo $searchvalue; ?>">3 bedrooms for Sale in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["4bedsale"]; ?>" title="4 bedrooms for sale in <?php echo $searchvalue; ?>">4 bedrooms for Sale in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["5bedsale"]; ?>" title="5+ bedrooms for sale in <?php echo $searchvalue; ?>">5+ bedrooms for Sale in <?php echo $searchvalue; ?></a></li>
	                  	<li><hr/></li>
	                  	<li><a href="<?php echo $related["0bedrent"]; ?>" title="Studio to rent in <?php echo $searchvalue; ?>">Studio to rent in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["1bedrent"]; ?>" title="1 bedroom to rent in <?php echo $searchvalue; ?>">1 bedroom to rent in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["2bedrent"]; ?>" title="2 bedrooms to rent in <?php echo $searchvalue; ?>">2 bedrooms to rent in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["3bedrent"]; ?>" title="3 bedrooms to rent in <?php echo $searchvalue; ?>">3 bedrooms to rent in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["4bedrent"]; ?>" title="4 bedrooms to rent in <?php echo $searchvalue; ?>">4 bedrooms to rent in <?php echo $searchvalue; ?></a></li>
	                  	<li><a href="<?php echo $related["5bedrent"]; ?>" title="5+ bedrooms to rent in <?php echo $searchvalue; ?>">5+ bedrooms to rent in <?php echo $searchvalue; ?></a></li>
	                  </ul>
	        </div>

	        <div class="block-sidebar">
	                  <h3 class="title-block-sidebar">Useful property information about <?php echo $searchvalue; ?></h3>


	                  <p style="text-align: justify;">
	                  Your search returned <?php if($rows == 500) echo "500+"; else echo $rows; ?> homes <?php echo strtolower($saletype); ?> in <?php echo $searchvalue; ?>.
                    <?php
                        $bed_text = (round($relatedproptype[0]["avgbed"]) > 1 ? "bedrooms": "bedroom");
                        $bed_text1 = (round($relatedproptype[1]["avgbed"]) > 1 ? "bedrooms": "bedroom");
                     ?>
	                  The average asking price for a <?php echo round($relatedproptype[0]["avgbed"])." ".$bed_text." ".$relatedproptype[0]["proptype"]; ?> in <?php echo $searchvalue; ?> is £<?php echo number_format($relatedproptype[0]["avgprice"],2); ?>.</p>

			<?php if(isset($relatedproptype[0])){ ?>
			<p style="text-align: justify;">The most common property type available <?php echo strtolower ($saletype); ?> in <?php echo $searchvalue; ?> are <?php echo round($relatedproptype[0]["avgbed"])." ".$bed_text." ".$relatedproptype[0]["proptype"]; ?>
      <?php if(isset($relatedproptype[1])){ ?> and <?php echo round($relatedproptype[1]["avgbed"])." ".$bed_text1." "; echo $relatedproptype[1]["proptype"]; ?><?php } ?><br />
To help you refine your search in <?php echo $searchvalue; ?> please feel free to try the following popular links:</p>

			<?php } ?>
			<ul>
			<?php

			for($i = 0;$i < count($relatedproptype);$i++){
        $bed_text_i = (round($relatedproptype[$i]["avgbed"]) > 1 ? "bedrooms": "bedroom");
			$tit = "";
			if($relatedproptype[$i]["avgbed"] != 0)
				$tit .= $relatedproptype[$i]["avgbed"].' '.$bed_text_i.' ';
			$tit .= $relatedproptype[$i]["proptype"].' '.strtolower($saletype).' in '.$searchvalue.'';
			echo '<li><a href="'.$relatedproptype[$i]["link"].'" title="'.$tit.'">'.$tit.'</a></li>';

			} ?>


			</ul>
	        </div>



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

							<div class="recent-properties">
								<div class="properties grid">

	                <!-- START PROPERTIES HEADER -->
				  				<div class="properties-header">



										<h1 class="page-title">Properties <?php echo $saletype; ?> in <?php echo $searchvalue; if(isset($postcode)) echo " $postcode";?></h1>


										<div class="properties-toolbar">
                      <form class="properties-ordering">
                        <div class="properties-ordering-label">Sorted by</div>
                        <div class="form-group properties-ordering-select">
                          <div class="label-select">
                            <select class="form-control" form="search-form" name="orderby" id="orderby">
                              <option value="distance" <?php if(isset($filters["sortby"]) && $filters["sortby"] === "distance") echo " selected"; ?>>Distance</option>
                              <option value="recent" <?php if(isset($filters["sortby"]) && $filters["sortby"] === "recent") echo " selected"; ?>>Most Recent</option>
                              <option value="pricelow" <?php if(isset($filters["sortby"]) && $filters["sortby"] === "pricelow") echo " selected"; ?>>Lowest Price</option>
                              <option value="pricehigh" <?php if(isset($filters["sortby"]) && $filters["sortby"] === "pricehigh") echo " selected"; ?>>Highest Price</option>
                            </select>

                          </div>
                        </div>
                      </form>
										</div>


									</div>
	                <!-- END PROPERTIES HEADER -->
			<div><p><span style="display:inline-block"><span style="padding-right:5px"><?php echo $formatted_address; ?></span><?php if($rows == 500) echo "500+"; else echo $rows; ?> properties found in <?php echo $searchvalue; ?><?php if(isset($prices)) echo " from <strong>£". number_format($prices["0"]->minp,2)."</strong> to <strong>£".number_format($prices["0"]->maxp,2) ."</strong> with an average price of <strong>£".number_format($prices["0"]->avgp,2)."</strong>";  ?></span></p></div>
                  <!-- START PROPERTIES CONTENT -->
                  <div class="properties-content">




<?php
$counti = 0;
foreach($results as $k){
   $counti++;
            $key = $k->id_feed;
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
            $charscount = substr($your_string_without_tags, 0, 250);
            $img = $k->photo_feed;


            $add = "";
            /*$rangeimg = array(1,1440);

            if($proptype == "Flat" or $proptype == "Appartament" or $proptype == "studio"){
            	$add = "f";
            	$rangeimg = array(1,28);
            }
            for($i=10;$i > 0;$i--){
	            $rand = rand($rangeimg[0],$rangeimg[1]);
	            $img = "http://hfstrcibkt.s3-website-eu-west-1.amazonaws.com/images/{$add}{$rand}.jpg";
	            if(@getimagesize($img))
	            break;
	   }*/


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
                   <!-- Hendar -->
                  <article class="hentry">
                      <div class="property-featured" itemscope="" itemtype="http://schema.org/Residence">
                        <span class="featured" data-toggle="modal" data-target="#formListing"
                                data-type="<?php echo $proptype; ?>"
                                data-postcode="<?php echo (isset($postcode)?$postcode:""); ?>"
                                data-listingid="<?php echo $key; ?>"
                                data-lat="<?php echo $lat; ?>"
                                data-lng="<?php echo $lng; ?>"
                                data-price="<?php echo $price; ?>" >
                          <i class="fa fa-heart"></i>
                        </span>
												<div itemprop="geo" itemscope="" itemtype="http://schema.org/GeoCoordinates">
										        <meta itemprop="latitude" content="<?php echo $k->latitude_feed; ?>">
										        <meta itemprop="longitude" content="<?php echo $k->longitude_feed; ?>">
										    </div>
                        <a class="content-thumb" rel="nofollow" target="_blank"  href="<?php echo $href; ?>">
                        	<?php if($counti > 8){ ?>
                          <img src="<?php echo $this->config->base_url(); ?>images/loading.gif" data-src="<?php echo $img; ?>" alt="<?php echo $desc; ?>">
                       		<?php }else{ ?>
                       	  <img src="<?php echo $img; ?>" alt="<?php echo $desc; ?>">
                       		<?php } ?>
                        </a>
                        <?php //<span class="property-label">Hot</span>
                        ?>
                        <span class="property-category"><a href="<?php echo $href; ?>" rel="nofollow" target="_blank"><?php echo $proptype; ?></a></span>
                      </div>
                      <div class="property-wrap">
                        <h2 class="property-title" itemprop="name">
                          <a href="<?php echo $href; ?>" title="<?php echo $title; ?>" rel="nofollow" target="_blank"><?php echo $title; ?></a>
                        </h2>
                        <div class="property-excerpt" >

                          <p><span><strong itemprop="address"><?php echo $desc; ?></strong></span><br><span itemprop="description"><?php echo $charscount; ?></span></p>

                        </div>
                        <div class="property-summary">
                          <div class="property-detail">
                            <p>
                            	<span><Strong>
	                            	<?php
	                            	if($bed > 1)
                      						 echo $bed.' Bedrooms';
                      					elseif($bed == 1)
                      						  echo $bed.' Bedroom';
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
                            <div class="property-price" itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer">
                              <span>
                                <span class="amount" itemprop="price" content="<?php echo str_replace(',', '', $price); ?>">£ <?php echo $price; ?></span>
                              </span>
                            </div>
                            <div class="property-action">
                              <a href="<?php echo $href; ?>" rel="nofollow" target="_blank">More Details</a>
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
                        <a href="<?php echo $href; ?>" rel="nofollow" target="_blank">More Details</a>
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

    <!-- Modal Form Listing -->
    <div class="modal" id="formListing" tabindex="-1" role="dialog" aria-labelledby="ModalLabel2">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="listingModalLabel">Sign in or register to save home</h4>
          </div>
          <div class="modal-body">
            <div id="email_error_listing" class="alert alert-danger">
              Invalid Email
            </div>

            <form class="contact">
              <div class="form-group">
                <input type="text" class="form-control" id="emailListing" name="emailListing" placeholder="Email">
              </div>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" id="submitListing" class="btn btn-success">Submit</button>
            I accept the <a target="_blank" href='<?php echo $this->config->base_url(); ?>/termsandconditions'>terms of use</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Form -->
  <!-- hendar -->
