<div class="box-list">


<h2>Houses <?php echo $saletype; ?> in <?php echo $searchvalue; ?></h2>
<style>

.filters{padding:1%;}

.filters input {display:inline;}

.slider {margin:8px 0px 5px 18px;}
.price-filter {background:#efefef;padding:20px;width:340px;}
#price2 {text-align:right;}
</style>
<div class="filters">
<script>
			 
			$(function(){

				$('.slider').noUiSlider({
					start: [ <?php echo $prices[0]->min;?>, <?php  echo $prices[0]->max; ?> ],
					step: 10,
					
					connect: true,
					
					range: {
						'min': <?php  echo $prices[0]->min;?>,
						'max': <?php  echo $prices[0]->max;?>
					},
					format: wNumb({
						mark: ',',
						decimals: 0
					}),
					
				});

				$('.slider').Link('lower').to($('#price1'));		
				$('.slider').Link('upper').to($('#price2'));
			});
</script>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
<div class="price-filter">
<h4>Price range:</h4>
  
  <input type="text" id="price1" name="price1">
  
  <input type="text" id="price2" name="price2">
  <div class="slider" style="width:300px;"></div>
  <br>
  <center><input id="filter" name="filter" type="submit" value="Filter" class="button" style="width:100px;height:35px;" />
  </center>
</div>

</div>
</form>
<?php 
foreach($results as $k){
   // print_r($k);
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
            

            echo '<a href="'.$href.'" title="'.$proptype.', property in '.$strings.' '.$searchvalue.'" rel="nofollow">
            <div class="houseslist">
             <div class="houselist-top">
                <h3>'.$bed.' Bedroom '.$proptype.' '.$saletype.' in '.$strings.'</h3>

             </div>
             <div class="houselist-left">
                 
                 <div class="imgfloat">
                    <span class="moreimg" style="opacity: 0.9;">More Pictures</span>
                 </div>
                 <img src="'.$img.'" alt="'.$proptype.', property in '.$strings.' '.$searchvalue.'" />

            
             </div>
             <div class="houseslist-info">
             <p>
                    <span>Property in '.$strings.' '.$searchvalue.'</span>
                    <span>'.$charscount.'</span>

                    </p>
                
             </div>
             <div class="houseslist-right">
                <span class="price">£'.$price.'</span>
                <!-- <span class="right-info">3 bathrooms</span> -->
                <span class="right-info">'.$bed.' bedrooms</span>
               
            </div>
         </div>
         </a>
';
        }

?>

</div><div class="clear"></div>
<?php echo $pagination; ?>