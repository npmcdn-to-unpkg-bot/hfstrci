<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Houses extends CI_Controller {

	public $propertiesperpage = 52;
	
	function __construct() {
		parent::__construct();
		header( 'Cache-Control: max-age=604800' );
		//$this->output->enable_profiler(TRUE);
		$this->lang->load("titles","english");
		$this->load->model('Housesm');
	}
	
	public function for_error(){
		$searchvalue = $this->uri->segment(3);
	        $searchvalue = ucwords(str_replace("-", " ", $searchvalue));
	        if($searchvalue)
        		$this->makesearch(false, $searchvalue, "Sale");
         	else{
         		$plus = array(
				'css'=>'style2',
				'title'=> $this->lang->line("index-title"),
				'js'=>'',
				'index'=>'noindex,nofollow',
			);
			$this->load->view('header',$plus);
			$this->load->view('longform',array("message"=>"We could not find the locality you are looking for, please use the search to find a property for sale or to rent."));
			$data = array();
			$data["links"] = $this->Housesm->footerlinks();
			$this->load->view('footer',$data);	
         		
         	}
	}
	public function for_sale(){
		$this->general_search("sale");
	}
	public function to_rent(){
		$this->general_search("rental");
	}
	function redirect(){

		$key = $this->uri->segment(3);
		$this->load->model('Housesm');
		$urlts = $this->Housesm->getredirectUrl($key)[0]->url_feed;
		header("Location: $urlts ");
		die();

	}
	
	public function returngooglelatlong($query){

		$search_code = urlencode($query);
		if($res = $this->Housesm->verifysearch($search_code)){
			
			return $res;
			
		}else{
			$url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$search_code.'+United+Kingdom&sensor=false&key=AIzaSyAhqHhs7yOY46r2H-71JhTA8dGorPqIu30';
			$json = json_decode(file_get_contents($url));
			
			if(isset($json->results[0])){
			
				$components = array();
				foreach($json->results[0]->address_components as $loc)
					$components[] = array("lname" => $loc->long_name, "sname" =>$loc->short_name ,"loctype" =>$loc->types[0]);
					
				
				$lat = $json->results[0]->geometry->location->lat;
				$lng = $json->results[0]->geometry->location->lng;
				$type = $json->results[0]->types[0];
				$formatted_address = $json->results[0]->formatted_address;
	
				if($lat && $lng){
					$this->Housesm->insertlatlong($search_code, $lat, $lng, $formatted_address, $type, $components);
					
					$res2 = $this->Housesm->verifysearch($search_code);
	
					return $res2;
					
				}else
					return false;
			}else{
				return false;	
			}
			
		}
			
	}

	public function general_search($type = "sale"){
		
		//$this->output->enable_profiler(TRUE);
		
		if($this->input->get('search') && (int)$this->input->get('search') >= 0 && $this->input->get('search') != ""){
			$searchvalue = $this->input->get('search');
			$cleanurl = false;
		}else{
			$searchvalue = $this->uri->segment(3);
			if($this->uri->segment(4) != null)
				$searchvalue = $this->uri->segment(4).", ".$searchvalue;
			$cleanurl = true;
		}
		if($searchvalue == "index" or $searchvalue == ""){
			$plus = array(
				'css'=>'style2',
				'title'=> $this->lang->line("index-title"),
				'js'=>'',
			);
			$this->load->view('header',$plus);
			$this->load->view('longform');
			$data = array();
			$data["links"] = $this->Housesm->footerlinks();
			$this->load->view('footer',$data);
		}else{
			$searchvalue = str_replace(".html","",$searchvalue);
			$this->makesearch($cleanurl, $searchvalue, $type);
		}

				
	}
	
	/**
	* Hendar
	*/
	public function saveSub(){
		$field['email'] 		= $_POST['email'];
		$field['minprice'] 		= $_POST['minprice'];
		$field['maxprice'] 		= $_POST['maxprice'];
		$field['proptype'] 		= $_POST['proptype'];
		$field['geo1'] 			= $_POST['geo1'];
		$field['geo2'] 			= $_POST['geo2'];
		$field['geo3'] 			= $_POST['geo3'];
		$field['minbed'] 		= $_POST['minbed'];
		$field['maxbed'] 		= $_POST['maxbed'];
		$field['enquirytype'] 	= $_POST['enquirytype'];
		$email = $_POST["email"];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  echo "Invalid email Format"; 
		}else{
			$this->Housesm->saveAlert($field);
			echo "<h4>Thank you! Your search was saved.</h4>";
		}
	}
	
		public function saveListing(){
		$field['email'] 		= $_POST["email"];
		$field['listingPrice']	= $_POST["listingPrice"];
		$field['listingType']	= $_POST["listingType"];
		$field['postCode'] 		= $_POST["postCode"];
		$field['listingId']		= $_POST["listingId"];
		$field['lat'] 			= $_POST["lat"];
		$field['lng'] 			= $_POST["lng"];	

		if (!filter_var($field['email'], FILTER_VALIDATE_EMAIL)) {
		  echo "Invalid email Format"; 
		}else{
		/*	$checkListing = $this->Housesm->checkListing($field);	
			if(empty($checkListing)){*/
			$this->Housesm->saveListing($field);

		/*	}*/

			echo "<h4>Thank you! Your search was saved.</h4>";
		}	
	}

	public function makesearch($cleanurl = false, $searchvalue,$type){

		$filters = $this->getfilters();
		if($this->input->get('page') && (int)$this->input->get('page') != 0){$page = (int)$this->input->get('page');}else{$page = 1;}
		
		$lat = false;
		$lng = false;
		if($res = $this->returngooglelatlong(str_replace("-", " ", $searchvalue))){
			list($latlngarray,$latlngdetails) = $res;	
			$lat = $latlngarray["lat"];
			$lng = $latlngarray["lng"];		
			$data['formatted_address'] = $latlngarray["formatted_address"];
			$data['loctype'] = $latlngarray["type"];
			$lldet = $this->getlocalities($latlngdetails);
			
			if(isset($lldet["administrative_area_level_2"])){
				if($data['loctype'] == "neighborhood" || $data['loctype'] == "postal_town" || $data['loctype'] == "locality" || $data['loctype'] == "postal_code_prefix"){
					$data["locality"] = $lldet[$data["loctype"]];	
					$data['area'] = $lldet["administrative_area_level_2"];
				}else{
					$data['area'] = $lldet["administrative_area_level_2"];
					if(isset($lldet["point_of_interest"])){
						$data["locality"] = $lldet["point_of_interest"];
					}elseif(isset($lldet["locality"])){
						$data["locality"] = $lldet["locality"];
						
					}elseif(isset($lldet["route"])){
						$data["locality"] = $lldet["route"];
						
					}else{
						$data['locality'] = $data['area'];
						$data['area'] = false;
					
					}
					
					
				}
			}else{
				if(isset($lldet[$data["loctype"]]))
					$data["locality"] = $lldet[$data["loctype"]];
				else
					$data["locality"] = $data["loctype"];
				$data['area'] = false;				
			}
			if(isset($lldet["postal_code_prefix"])){
				$data['postcode'] = $lldet["postal_code_prefix"];
				$printpostcode = " ".$lldet["postal_code_prefix"];
			}else{
				$printpostcode = "";	
			}
			$canonical = $this->getcanonical($type, $data["locality"], $data['area']);
			$data["bread"] = $this->getBread($lldet,$type,$data['loctype']);
			
			if($type == 'sale'){
	        		$type2 = 'for-sale';
	        		$metatype = "sale-meta";
	            	}elseif($type == 'rental'){
	        		$type2 = 'to-rent';
	        		$metatype = "rent-meta";
	            	}
			$data["breadbase"] = $this->config->base_url()."houses/{$type2}/index.html";
			if(!$this->input->get('range')){
				if($data['loctype'] == "neighborhood")
					$filters["range"] = 1;
				elseif($data['loctype'] == "postal_town" or $data['loctype'] == "locality")
					$filters["range"] = 10;
				elseif($data['loctype'] == "administrative_area_level_2" or $data['loctype'] == "administrative_area_level_1")
					$filters["range"] = 15;
				else
					$filters["range"] = 1;	
			}
			

			$svar = $this->Housesm->makelatlongsearch($type,$lat,$lng,$this->propertiesperpage,$page,$filters);
			if($svar){
				list($cnum, $data['results'], $data['prices'], $avgproptype  ) = $svar;
				$data["resultsfound"] = true;				
			}else{
				$data["resultsfound"] = false;
				for($ict = 1;$ict < 3;$ict++){
					$filters["range"] = $filters["range"] + $ict;
					$svar = $this->Housesm->makelatlongsearch($type,$lat,$lng,$this->propertiesperpage,$page,$filters);
					if($svar){
						list($cnum, $data['results'], $data['prices'], $avgproptype  ) = $svar;
						$data["resultsfound"] = true;	
						break;
					}
				}	
			}
			
			$data['pagination'] = $this->getnewpaginator($cnum,$this->propertiesperpage,$type,$searchvalue,$page,$filters);	
			$data['rows'] = $cnum;
		  	$data["related"] = $this->prepareRelatedSearch($searchvalue,$filters);
		  	list($data["relatedproptype"],$data["proptypeinfo"]) = $this->prepareRelatedPropTypeSearch($searchvalue,$filters,$avgproptype,$type);
		  	$data["lat"] = $lat;
		  	$data["lng"] = $lng;
		 	$data['searchvalue'] = ucwords(str_replace("-", " ", $searchvalue));
		   	$data['saletype'] = ucwords(str_replace("-", " ", $this->uri->segment(2)));
		   	$data["filters"] = $filters;
		   	
			$plus = array(
				'title'=> strtr($this->lang->line($type."-title"), array('{$searchvalue}' => $data['searchvalue'])),			
				'canonical' => $canonical,
				'meta'=>strtr($this->lang->line($metatype), array('{$cnum}'=>$cnum, '{$postcode}'=>$printpostcode, '{$lat}'=>$data["lat"], '{$lng}'=>$data["lng"], '{$location}' => $data["formatted_address"], '{$placename}' => $data["formatted_address"]))
				);
				
			if($cleanurl === true){
				if($page == 1){
					$plus["next"] = $canonical."?page=2";
				}elseif($page == 2){
					$plus["next"] = $canonical."?page=3";
					$plus["prev"] = $canonical;
				
				}elseif($page > 2 && $page < ceil($cnum / $this->propertiesperpage)){
					$plus["next"] = $canonical."?page=".$page+1;
					$plus["prev"] = $canonical."?prev=".$page-1;
				}elseif($page == ceil($cnum / $this->propertiesperpage)){
					$plus["prev"] = $canonical."?prev=".$page-1;
				}
			}
		
			$this->load->view('citylight/head',$plus);
			$this->load->view('citylight/header');				
		    $this->load->view('citylight/lists', $data);		
			$this->getFooter();
			$this->Housesm->savesearch($data['searchvalue'], $type);



					
		}else{
			//show home saying location not found
			$plus = array(
				'css'=>'style2',
				'title'=> $this->lang->line("index-title"),
				'js'=>'',
				'index'=>'noindex,nofollow',
			);
			$this->load->view('header',$plus);
			$this->load->view('longform',array("message"=>"We could not find the location: ".$searchvalue.". Please try a different search."));
			$data = array();
			$data["links"] = $this->Housesm->footerlinks();
			$this->load->view('footer',$data);
		}	 	
	}
	public function getBread($details,$typesale,$actual){
		if($typesale == 'sale'){
        		$type = 'for-sale';
        		$type2 = 'for sale';

            	}elseif($typesale == 'rental'){
        		$type = 'to-rent';
        		$type2 = 'to rent';
            	}
		$bread = array();
			$ac = true;
		$bread[] = array("active"=>$ac,"name"=>"United Kingdom","link" => $this->config->base_url()."houses/{$type}/".$this->doiturl("United Kingdom").".html","type"=>$type2);
		
		if(isset($details["administrative_area_level_1"])){
			if($actual == "administrative_area_level_1") $ac = false; else $ac = true;
			$bread[] = array("active"=>$ac,"name"=>$details["administrative_area_level_1"],"link" => $this->config->base_url()."houses/{$type}/".$this->doiturl($details["administrative_area_level_1"]).".html","type"=>$type2);
		
		}
		if(isset($details["administrative_area_level_2"])){
			if($actual == "administrative_area_level_2") $ac = false; else $ac = true;
			$bread[] = array("active"=>$ac,"name"=>$details["administrative_area_level_2"],"link" => $this->config->base_url()."houses/{$type}/".$this->doiturl($details["administrative_area_level_2"]).".html","type"=>$type2);
		}
		if(isset($details["postal_town"])){
			if($actual == "postal_town") $ac = false; else $ac = true;
			$bread[] = array("active"=>$ac,"name"=>$details["postal_town"],"link" => $this->config->base_url()."houses/{$type}/".$this->doiturl($details["administrative_area_level_2"])."/".$this->doiturl($details["postal_town"]).".html","type"=>$type2);
		}
		if(isset($details["neighborhood"])){
			if($actual == "neighborhood") $ac = false; else $ac = true;
			$bread[] = array("active"=>$ac,"name"=>$details["neighborhood"],"link" => $this->config->base_url()."houses/{$type}/".$this->doiturl($details["administrative_area_level_2"])."/".$this->doiturl($details["neighborhood"]).".html","type"=>$type2);
		
		}
		return $bread;
	}
	
	public function getlocalities($latlongdetails){

		$result = array();
		foreach($latlongdetails as $det)
			$result[$det->loctype] = $det->lname;
	
		return $result;
	}
	public function getfilters(){
		$filters = false;		
		$filters = array();
		if($this->input->get('price1') &&(int)$this->input->get('price1') > 0 && $this->input->get('price1') != "")
			$filters['price1'] = $this->input->get('price1');
		if($this->input->get('price2') &&(int)$this->input->get('price2') > 0 && $this->input->get('price2') != "")
			$filters['price2'] = $this->input->get('price2');
		if($this->input->get('bedroom1') &&(int)$this->input->get('bedroom1') > 0 && $this->input->get('bedroom1') != "")
			$filters['bedroom1'] = (int)$this->input->get('bedroom1');
		if($this->input->get('bedroom2') && (int)$this->input->get('bedroom2') >= 0 && $this->input->get('bedroom2') != "" )
			$filters['bedroom2'] = (int)$this->input->get('bedroom2');
		if($this->input->get('range') && (int)$this->input->get('range') >= 0 && $this->input->get('range') != ""){
			if($this->input->get('range') == "1/4")
				$filters["range"] = (float)0.25;
			elseif($this->input->get('range') == "3/4")
				$filters["range"] = (float)0.75;
			elseif($this->input->get('range') == "1")
				$filters["range"] = (int)1;
			elseif($this->input->get('range') == "2")
				$filters["range"] = (int)2;
			elseif($this->input->get('range') == "3")
				$filters["range"] = (int)3;
			elseif($this->input->get('range') == "5")
				$filters["range"] = (int)5;
			elseif($this->input->get('range') == "10")
				$filters["range"] = (int)10;
			elseif($this->input->get('range') == "15")
				$filters["range"] = (int)15;
			elseif($this->input->get('range') == "20")
				$filters["range"] = (int)20;
			elseif($this->input->get('range') == "25")
				$filters["range"] = (int)25;
			elseif($this->input->get('range') == "30")
				$filters["range"] = (int)30;
			elseif($this->input->get('range') == "35")
				$filters["range"] = (int)35;
			elseif($this->input->get('range') == "40")
				$filters["range"] = (int)40;
			else
				$filters["range"] = (int)1;				
		}else
			$filters["range"] = (int)1;
			
		if($this->input->get('property-type'))
			$filters["propertytype"] = $this->verifyPropertyTypes($this->input->get('property-type'));		
			
		if((int)$this->input->get('orderby') >= 0 && $this->input->get('orderby') != "")
			$filters["sortby"] = $this->input->get('orderby');
	
		if(empty($filters))
			$filters = false;
			
		return $filters;
	}

        function getnewpaginator($num,$perpage,$typesale,$query,$page=1,$filters = false){
        	
       	     	
       	    $urlparam = $this->createurlparameters($query, $filters, $typesale);
       	    
       	    if($typesale == 'sale'){
        	$type = 'for-sale';
            }elseif($typesale == 'rental'){
        	$type = 'to-rent';
            }
            $x = ceil($num/$perpage);            
            $links = array();
            $links["info"] = array("totalresults" => $num, "pages"=> $x, "perpage" => $perpage);
            $links["links"] = array();
            
            for($i = 1; $i <= $x; $i++){
	            if($i == 1){	            	
	            	$name = $this->lang->line("paginator-firstpage");    
	            }elseif($i>1){
	            	
	            	$name = $i;
	            } 
	            if($i == $page){
	            	$links["links"][] = array("link"=>false,"title"=>false,"name"=>$name);
	            }else{
	            	$links["links"][] = array("link"=>"{$urlparam}&page=$i","title"=>strtr($this->lang->line("paginator-pagetitle"), array('{$type}' => $type, '{$query}' => $query, '{$name}' => $name)), "name"=>$name);
	            }     
            }        
            return $links;
	}
	function prepareRelatedSearch($searchvalue,$filters){
	
		$related["housesale"] = $this->createurlparameters($searchvalue,$filters,"sale",array("propertytype" => array("House","Detached house","Semi Detached","Maisonette", 'Terraced house', 'Town house', 'Cottage')));
		$related["houserent"] = $this->createurlparameters($searchvalue,$filters,"rental",array("propertytype" => array("House","Detached house","Semi Detached","Maisonette", 'Terraced house', 'Town house', 'Cottage')));
		$related["flatsale"] = $this->createurlparameters($searchvalue,$filters,"sale",array("propertytype" => array('Flat','Penthouse','Studio')));
		$related["flatrent"] = $this->createurlparameters($searchvalue,$filters,"rental",array("propertytype" => array('Flat','Penthouse','Studio')));
		
		$related["0bedrent"] = $this->createurlparameters($searchvalue,$filters,"rental",array("bedroom1" => 0, "bedroom2" => 0 ));
		$related["1bedrent"] = $this->createurlparameters($searchvalue,$filters,"rental",array("bedroom1" => 1, "bedroom2" => 1 ));
		$related["2bedrent"] = $this->createurlparameters($searchvalue,$filters,"rental",array("bedroom1" => 2, "bedroom2" => 2 ));
		$related["3bedrent"] = $this->createurlparameters($searchvalue,$filters,"rental",array("bedroom1" => 3, "bedroom2" => 3 ));
		$related["4bedrent"] = $this->createurlparameters($searchvalue,$filters,"rental",array("bedroom1" => 4, "bedroom2" => 4 ));
		$related["5bedrent"] = $this->createurlparameters($searchvalue,$filters,"rental",array("bedroom1" => 5));
		
		$related["0bedsale"] = $this->createurlparameters($searchvalue,$filters,"sale",array("bedroom1" => 0, "bedroom2" => 0 ));
		$related["1bedsale"] = $this->createurlparameters($searchvalue,$filters,"sale",array("bedroom1" => 1, "bedroom2" => 1 ));
		$related["2bedsale"] = $this->createurlparameters($searchvalue,$filters,"sale",array("bedroom1" => 2, "bedroom2" => 2 ));
		$related["3bedsale"] = $this->createurlparameters($searchvalue,$filters,"sale",array("bedroom1" => 3, "bedroom2" => 3 ));
		$related["4bedsale"] = $this->createurlparameters($searchvalue,$filters,"sale",array("bedroom1" => 4, "bedroom2" => 4 ));
		$related["5bedsale"] = $this->createurlparameters($searchvalue,$filters,"sale",array("bedroom1" => 5));
		
		return $related;
	
	}
	
	function prepareRelatedPropTypeSearch($searchvalue,$filters,$avgstypesm,$salestype){
		$return = array();
		$return2 = array();
		foreach($avgstypesm as $pta)
			if($pta->property_type_feed != "")
			$return[] = array("proptype"=>$pta->property_type_feed ,"avgprice"=> $pta->avgp, "avgbed"=> round($pta->avgb),"link"=> $this->createurlparameters($searchvalue,$filters,$salestype,array("propertytype" => array($pta->property_type_feed))),"popularity"=>$pta->popularity);
			
		foreach($avgstypesm as $pta)
			$return2[$pta->property_type_feed] = array("avgprice"=> $pta->avgp, "avgbed"=> round($pta->avgb),"link"=> $this->createurlparameters($searchvalue,$filters,$salestype,array("propertytype" => array($pta->property_type_feed))),"popularity"=>$pta->popularity);
			
		return array($return,$return2);
	}
	function getcanonical($typesale, $loc, $area){
		if($typesale == 'sale'){
        		$type = 'for-sale';
            	}elseif($typesale == 'rental'){
        		$type = 'to-rent';
            	}
		$url = $this->config->base_url()."houses/{$type}/";
		if($area)
			$url .= $this->doiturl($area)."/";
		$url .= $this->doiturl($loc).".html";
		return $url;
	}
	function createurlparameters($searchvalue, $filters, $typesale, $over = false){
		
		if($typesale == 'sale'){
        		$type = 'for-sale';
            	}elseif($typesale == 'rental'){
        		$type = 'to-rent';
            	}            	
		$url = $this->config->base_url()."houses/{$type}/index.html?";		
		$url .= "search=".$this->getUrlEncode($searchvalue);
				
		if(isset($filters['price1']) || isset($over['price1']))
			if($over && isset($over['price1']))
				$url .= "&price1=".(int)$over["price1"];
			else
				$url .= "&price1=".(int)$filters["price1"];
		if(isset($filters['price2']) || isset($over['price2']))
			if($over && isset($over['price2']))
				$url .= "&price2=".(int)$over["price2"];
			else
				$url .= "&price2=".(int)$filters["price2"];
		if(isset($filters['bedroom1']) || isset($over['bedroom1']))
			if($over && isset($over['bedroom1']))
				$url .= "&bedroom1=".(int)$over["bedroom1"];
			else
				$url .= "&bedroom1=".(int)$filters["bedroom1"];
				
		if(isset($filters['bedroom2']) || isset($over['bedroom2']))
			if($over && isset($over['bedroom2']))
				$url .= "&bedroom2=".(int)$over["bedroom2"];
			else
				$url .= "&bedroom2=".(int)$filters["bedroom2"];
		if(isset($filters["range"]) || isset($over['range']))
			if($over && isset($over['range']))
				$url .= "&range=".(int)$over["range"];
			else
				$url .= "&range=".$filters["range"];
		if(isset($filters["sortby"]) || isset($over['sortby']) )
			if($over && isset($over['sortby']))
				$url .= "&orderby=".(int)$over["sortby"];
			else
				$url .= "&orderby=".$this->getUrlEncode($filters["sortby"]);	
		if(isset($filters["propertytype"]) || isset($over['propertytype']))
			if($over && isset($over['propertytype']))
				foreach($over["propertytype"] as $type)
					$url .= "&property-type%5B%5D=".$this->getUrlEncode($type);
			else
				foreach($filters["propertytype"] as $type)
					$url .= "&property-type%5B%5D=".$this->getUrlEncode($type);
	
		return $url;
	}
	
	function getUrlEncode($string) {
    		$entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
    		$replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
  		return str_replace($entities, $replacements, urlencode($string));
	}
	
	function getFooter(){
		$data = array();
		$data["links"] = $this->Housesm->footerlinks();
		$this->load->view('citylight/footer',$data);
	}
	
	function verifyPropertyTypes($param){
		$final = array();			
		$types = Array('Flat','Penthouse','Studio', 'House','Detached house', 'Semi Detached', 'Maisonette', 'Terraced house', 'Town house', 'Cottage', 'House share', 'Flat Share', 'Commercial','Barn conversion', 'Bungalow', 'Mill', 'Plot of Land', 'New build', 'Retirement property' );
		
		foreach($param as $pa){
			if(in_array($pa, $types)){
				$final[] = $pa;
				if($pa == "Flat")
					$final[] = "Apartament";
				if($pa == "House share")
					$final[] = "Flat Share";
			}	
		}
		return $final;	
	}
	function doiturl($i) {
	
        	$i = strtolower($i);
        	$i = str_replace("-","_",$i);
      		$i = str_replace(" ","-",$i);
     	 	//$i = str_replace("/","_",$i);
        	return $i;
        	
    	}
	function undoiturl($i) {
        	//$i = str_replace(" ","-",$i);    
        	$i = str_replace("-"," ",$i);
        	$i = str_replace("_","-",$i);            
        	//$i = str_replace(",","/",$i);
        	$i = ucwords($i);
        	return $i;
        }
	
}
