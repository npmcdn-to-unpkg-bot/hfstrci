<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Houseprice extends CI_Controller {

		
	function __construct() {
		parent::__construct();
		$this->lang->load("titles","english");
		$this->load->model('Housesm');
		$this->load->library('../controllers/houses');
	}
	
	public function uk(){
		$plus = array('css'=>'stylelist2','title'=>$this->lang->line("uk-title"),'js'=>'');
		$this->load->view('header',$plus);
		$this->load->view('shortform');
		$this->load->view('uk');
		$this->load->view('footer');	
	}
	public function price(){	
		$viewtogetname = "";
		$queryseachlist=null;
		$searchfirst=true;
		$meta = "";
		$differentview= false;
		if($this->uri->segment(6) != null){//code level

			$data['code'] = $this->uri->segment(6);
			$data['area'] = $this->uri->segment(5);
			$data['town'] = $this->uri->segment(4);
			$data['district'] = $this->uri->segment(3);
			$data['country'] = $this->uri->segment(2);
			$data['codespace'] = str_replace("-", " ",$data['code']);
			$data['areaspace'] = $this->undoiturl($data['area']);
			$data['townspace'] = $this->undoiturl($data['town']);
			$data['districtname'] = $this->undoiturl($data['district']);
			$data['countryspace'] = $this->undoiturl($data['country']);
			$this->load->model('Housesm');
			$data['districtiso'] = $this->Housesm->getisobydist($data['districtname'])[0]->iso;
			//$data['districtname'] = $this->Housesm->getdistbyiso($data['district'])[0]->district;
			$data['results'] = $this->Housesm->getcodeinfo($data['codespace']);
			$viewtogetname='code';
			$queryseachlist = $data['codespace']." ".$data['areaspace'];
			$title = $data['codespace'].", ".$data['areaspace'];
			$placename = $data['codespace'].', '.$data['areaspace'].', '.$data['townspace'].', '.$data['districtname'].', '.$data['countryspace'];
			
			$region = $data['districtiso'];
			$data['verb'] = "Postcodes";
			$data['areaname'] = $title;

		}elseif($this->uri->segment(5) != null){//area level

			//$data['controller']=$this;
			$data['area'] = $this->uri->segment(5);
			$data['town'] = $this->uri->segment(4);
			$data['district'] = $this->uri->segment(3);
			$data['country'] = $this->uri->segment(2);
			
			$data['areaspace'] = $this->undoiturl($data['area']);
			$data['townspace'] = $this->undoiturl($data['town']);
			$data['districtname'] = $this->undoiturl($data['district']);
			$data['countryspace'] = $this->undoiturl($data['country']);
			
			$this->load->model('Housesm');
			$data['districtiso'] = $this->Housesm->getisobydist($data['districtname'])[0]->iso;
			//$data['districtname'] = $this->Housesm->getdistbyiso($data['district'])[0]->district;
			
			$data['results'] = $this->Housesm->getareacode($data['townspace'],$data['areaspace']);
			$viewtogetname='area';
			$queryseachlist = $data['areaspace']." ".$data['townspace'];
			$title = $data['areaspace'].", ".$data['townspace'];
			$placename = $data['areaspace'].', '.$data['townspace'].', '.$data['districtname'].', '.$data['countryspace'];
			$region = $data['districtiso'];
			
			$data['resultslinks'] =	$this->preparelinksarea($this->Housesm->getareacode($data['townspace'],$data['areaspace']),$data['area'],$data['town'], $data['district'], $data['country']);
			$data['verb'] = "Postcodes";
			$data['areaname'] = $title;

		}elseif($this->uri->segment(4) != null){//town level
	
			
			//$data['controller']=$this;
			$data['town'] = $this->uri->segment(4);
			$data['district'] = $this->uri->segment(3);
			$data['country'] = $this->uri->segment(2);
			$data['townspace'] = $this->undoiturl($data['town']);
			$data['districtname'] = $this->undoiturl($data['district']);
			$data['countryspace'] = $this->undoiturl($data['country']);
			$this->load->model('Housesm');
			$data['districtiso'] = $this->Housesm->getisobydist($data['districtname'])[0]->iso;
			//$data['districtname'] = $this->Housesm->getdistbyiso($data['district'])[0]->district;
			//$data['results'] = $this->Housesm->gettownareas($data['townspace'],$data['districtname']);			
			$viewtogetname='town';
			$queryseachlist = $data['townspace']." ".$data['districtname'];
			$title = $data['townspace'].", ".$data['districtname'];
			$placename = $data['townspace'].', '.$data['districtname'].', '.$data['countryspace'];
			$region = $data['districtiso'];
			$data['verb'] = "Areas";
			$data['areaname'] = $title;
			$data['resultslinks'] =	$this->preparelinkstowns($this->Housesm->gettownareas($data['townspace'],$data['districtname']),$data['town'], $data['district'], $data['country']);
			$searchfirst=false;

		}elseif($this->uri->segment(3) != null){//district level
			
			//$data['controller']=$this;
			$data['country'] = $this->uri->segment(2);
			$data['district'] = $this->uri->segment(3);
			$data['districtname'] = $this->undoiturl($data['district']);
			$data['countryspace'] = $this->undoiturl($data['country']);
			$this->load->model('Housesm');
			$data['districtiso'] = $this->Housesm->getisobydist($data['districtname'])[0]->iso;
			//$data['districtname'] = $this->Housesm->getdistbyiso($data['district'])[0]->district;			
			//$data['results'] = $this->Housesm->getdisttown($data['districtname']);
			$data['resultslinks'] =	$this->preparelinksdistrict($this->Housesm->getdisttown($data['districtname']), $data['district'], $data['country']);
			$viewtogetname ='district';
			$title = $data['districtname'].", ".$data['countryspace'];
			$placename = $data['districtname'].', '.$data['countryspace'];
			$region = $data['districtiso'];
			$queryseachlist = $title;
			$data['verb'] = "Towns";
			$data['areaname'] = $title;

		}elseif($this->uri->segment(2) != null){//country level
			
			//$data['controller']=$this;
			$data['country'] = $this->uri->segment(2);
			
			$data['countryspace'] = $this->undoiturl($data['country']);
			
			$data['verb'] = "Districts";
			$data['areaname'] = $data['countryspace'];
			
			$queryseachlist = $data['countryspace'];
			
			$this->load->model('Housesm');
			$data['resultslinks'] = $this->preparelinkscountry($this->Housesm->getcountrydist($data['country']), $data["country"]);
			$viewtogetname='country';
			$title = $data['countryspace'];		
			$placename = $data['countryspace'];
			$region = 'GB';			
		}
		$plus = array(
			
			'title'=>strtr($this->lang->line("price-title"), array('{$searchvalue}' => $title)),
			'js'=>'',
			'meta'=>strtr($this->lang->line("price-meta"), array('{$location}' => $title, '{$placename}' => $placename, '{$region}' => $region))
		);


		
		
		list($data["lat"], $data["lng"], $data["formatted_address"], $data["loctype"], $data["locality"], $data["area"], $data["canonical"], $data["bread"], $data["cnum"], $data["resultsproperties"], $data["prices"], $data["avgproptype"], $data["related"], $data["relatedproptype"], $data["proptypeinfo"], $data["saletype"], $data["filters"] ) = $this->searchproperty($queryseachlist);
		
		
		$data["breadbase"] = $this->config->base_url()."houses/for-sale/index.html";
		$data["searchvalue"] = $queryseachlist;
		$plus["canonical"] = $data["canonical"];
		
		/*if($queryseachlist != null){
			$datalists['results'] = $this->Housesm->searchDB("sale",$queryseachlist,$this->propertiesperpage);
		       	$datalists['searchvalue'] = ucwords(str_replace("-", " ", $queryseachlist));
		       	$datalists['saletype'] ="For Sale";
			
			$cnum = $this->Housesm->searchDBrows("sale",$queryseachlist);
			$datalists['pagination'] = $this->getpaginator($cnum,$this->propertiesperpage,"sale",$this->doiturl($queryseachlist),1);
		}*/
		
		$this->load->view('citylight/head',$plus);
		$this->load->view('citylight/header');				
	      	$this->load->view('citylight/country' ,$data);		
		$this->getFooter();
		
	}
	
	function searchproperty($searchvalue){
		$filters = array();
		$lat = false;
		$lng = false;
		$type = "sale";
		$data = array();
		
		$res = $this->houses->returngooglelatlong(str_replace("-", " ", $searchvalue));
			list($latlngarray,$latlngdetails) = $res;	
			$lat = $latlngarray["lat"];
			$lng = $latlngarray["lng"];		
			$data['formatted_address'] = $latlngarray["formatted_address"];
			$data['loctype'] = $latlngarray["type"];
			$lldet = $this->houses->getlocalities($latlngdetails);
			echo "<pre>";
			echo $data["loctype"];
			print_r($lldet);
			
			if(isset($lldet["administrative_area_level_2"])){
				if(($data['loctype'] == "neighborhood" || $data['loctype'] == "postal_town" || $data['loctype'] == "locality" || $data['loctype'] == "postal_code_prefix")($data['loctype'] == "neighborhood" || $data['loctype'] == "postal_town" || $data['loctype'] == "locality" || $data['loctype'] == "postal_code_prefix")){
					$data["locality"] = $lldet[$data["loctype"]];	
					$data['area'] = $lldet["administrative_area_level_2"];
				}else{
					$data['area'] = $lldet["administrative_area_level_2"];
					if(isset($lldet["point_of_interest"])){
						$data["locality"] = $lldet["point_of_interest"];
					}
				}
			}else{
				if(isset($lldet[$data["loctype"]]))
				$data["locality"] = $lldet[$data["loctype"]];
				elseif(isset())
				
				else
				$data["locality"] = $data["loctype"];
				$data['area'] = false;				
			}
			if(isset($lldet["postal_code_prefix"]))
				$data['postcode'] = $lldet["postal_code_prefix"];
			else
				$data['postcode'] = false;
			$canonical = $this->houses->getcanonical($type, $data["locality"], $data['area']);
			$data["bread"] = $this->houses->getBread($lldet,$type,$data['loctype']);
			
			if($type == 'sale'){
	        		$type2 = 'for-sale';        		
	            	}elseif($type == 'rental'){
	        		$type2 = 'to-rent';
	            	}
			
			
			if($data['loctype'] == "neighborhood")
				$filters["range"] = 1;
			elseif($data['loctype'] == "postal_town" or $data['loctype'] == "locality")
				$filters["range"] = 10;
			elseif($data['loctype'] == "administrative_area_level_2" or $data['loctype'] == "administrative_area_level_1")
				$filters["range"] = 15;
			else
				$filters["range"] = 1;	
				
			
				
			list($cnum, $data['results'], $data['prices'], $avgproptype  ) = $this->Housesm->makelatlongsearch($type,$lat,$lng,4,1,$filters);
			
			$data["related"] = $this->houses->prepareRelatedSearch($searchvalue,$filters);
	  		list($data["relatedproptype"],$data["proptypeinfo"]) = $this->houses->prepareRelatedPropTypeSearch($searchvalue,$filters,$avgproptype,$type);
			
			
		// lat, lng, formatted_address, loctype, $locality, $area, $canonical, $breadcrumb, $cnum, $results, $prices, $avgproptype
		return array($lat,$lng,$data['formatted_address'], $data['loctype'], $data["locality"], $data['area'], $canonical, $data["bread"], $cnum, $data['results'], $data['prices'], $avgproptype, $data["related"], $data["relatedproptype"], $data["proptypeinfo"] ,$type2,$filters    );
	}
	
		
	function preparelinkscountry($arrays, $country){
		$results = array();
		
		foreach($arrays as $array){
			$result = array();
			$result["title"] = $array->district;
			$result["link"] = $this->config->base_url()."houses/$country/".$this->doiturl($array->district).".html";			
			$result["iso"] = $array->iso;
			$results[] = $result;		
		}
	
		return $results;
	}
	function preparelinksdistrict($arrays, $district ,$country){
		$results = array();
		
		foreach($arrays as $array){
			$result = array();
			$result["title"] = $array->town;
			$result["link"] = $this->config->base_url()."houses/$country/$district/".$this->doiturl($array->town).".html";			
		//	$result["iso"] = $array->iso;
			$results[] = $result;		
		}
	
		return $results;
	}
	function preparelinkstowns($arrays, $town, $district ,$country){
		$results = array();
		
		foreach($arrays as $array){
			$result = array();
			$result["title"] = $array->ward;
			$result["link"] = $this->config->base_url()."houses/$country/$district/$town/".$this->doiturl($array->ward).".html";			
		//	$result["iso"] = $array->iso;
			$results[] = $result;		
		}
	
		return $results;
	}
	function preparelinksarea($arrays, $area ,$town, $district ,$country){
		$results = array();
		
		foreach($arrays as $array){
			$result = array();
			$result["title"] = $array->STREET . " " . $array->POSTCODE;
			$result["link"] = $this->config->base_url()."houses/$country/$district/$town/$area/".$this->doiturl($array->POSTCODE).".html";			
		//	$result["iso"] = $array->iso;
			$results[] = $result;		
		}
	
		return $results;
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
        function getFooter(){
		$data = array();
		$data["links"] = $this->Housesm->footerlinks();
		$this->load->view('citylight/footer',$data);
	}
	
	
}
