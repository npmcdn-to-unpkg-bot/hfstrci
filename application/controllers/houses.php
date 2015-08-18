<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Houses extends CI_Controller {

	public $propertiesperpage = 50;
	
	function __construct() {
		parent::__construct();
		$this->lang->load("titles","english");
		$this->load->model('Housesm');
	}

	public function index(){
		
		$plus = array(
			'css'=>$this->getcssname('style2'),
			'title'=> $this->lang->line("index-title"),
			'js'=>'<script type="text/javascript">jQuery(document).ready(function() {$(".search").delegate("input", "focus", function() {if (this.value === "Search for address, town or area.") {this.value = "";}});});</script>',
		);
		$this->load->view('header',$plus);
		$this->load->view('longform');
		$this->load->view('footer');
		
	}
	public function returngooglelatlong($query){

		$search_code = urlencode($query);
		if($res = $this->Housesm->verifysearch($search_code))
			return $res;
		else{
			$url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$search_code.'+GB&sensor=false';
			$json = json_decode(file_get_contents($url));
			
			//foreach($json->results as $location)
			
			$lat = $json->results[0]->geometry->location->lat;
			$lng = $json->results[0]->geometry->location->lng;
			
			if($lat && $lng){
				$this->Housesm->insertlatlong($search_code, $lat, $lng);
				return array($lat, $lng);
			}else
				return false;
		}

	}

	public function general_search($type = "sale"){

		$filters = false;	
		//$this->load->library('form_validation');
		//$this->form_validation->set_rules('action', 'action', 'required');					
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
			
		if((int)$this->input->get('orderby') >= 0 && $this->input->get('orderby') != "")
			$filters["sortby"] = $this->input->get('orderby');
			
		if($this->input->get('search') && (int)$this->input->get('search') >= 0 && $this->input->get('search') != "")
			$searchvalue = $this->input->get('search');
		else
			$searchvalue = $this->uri->segment(3);	
				
		if(empty($filters))
			$filters = false;				
		if($this->input->get('page') && (int)$this->input->get('page') != 0){$page = (int)$this->input->get('page');}else{$page = 1;}
		
		
		if($res = $this->returngooglelatlong(str_replace("-", " ", $searchvalue))){
			list($lat,$lng) = $res;
			$data['results'] = $this->Housesm->searchpropertylatlong($type,$lat,$lng,$this->propertiesperpage,$page,$filters);
			$cnum = $this->Housesm->searchpropertylatlongrows($type,$lat,$lng,$filters);
			//$data['pagination'] = $this->getpaginator($cnum,$this->propertiesperpage,"sale",$searchvalue,$page);
			$data['pagination'] = $this->getnewpaginator($cnum,$this->propertiesperpage,$type,$searchvalue,$page,$filters);		
						
		}else{
			$data['results'] = $this->Housesm->searchDB($type,$searchvalue,$this->propertiesperpage,$page,$filters);
			//pagination        
			$cnum = $this->Housesm->searchDBrows($type,$searchvalue,$filters);
			$data['pagination'] = $this->getnewpaginator($cnum,$this->propertiesperpage,$type,$searchvalue,$page,$filters);
	   	}
	  	//@note: not used in new layout
	  	//$data['prices'] = $this->Housesm->gettopandminprice($type,$searchvalue);
	 	$data['searchvalue'] = ucwords(str_replace("-", " ", $searchvalue));
	   	$data['saletype'] = ucwords(str_replace("-", " ", $this->uri->segment(2)));
	   	$data["filters"] = $filters;
		$plus = array(
			'css'=>$this->getcssname('stylelist2'),
			'title'=> strtr($this->lang->line($type."-title"), array('{$searchvalue}' => $data['searchvalue'])),			
			'js'=>'',
			);
		$this->load->view('citylight/head',$plus);
		$this->load->view('citylight/header');				
	      	$this->load->view('citylight/lists', $data);		
		$this->getFooter();
		$this->Housesm->savesearch($data['searchvalue'], $type);

	}	
	public function for_error(){
	
		$searchvalue = $this->uri->segment(3);
		if($this->uri->segment(4) == null){$page = 1;}else{$page = $this->uri->segment(4);}
		$this->load->model('Housesm');
        	$data['results'] = $this->Housesm->searchDB("sale",$searchvalue,$this->propertiesperpage,$page);
        	$data['searchvalue'] = ucwords(str_replace("-", " ", $searchvalue));
        	$data['saletype'] = ucwords(str_replace("-", " ", $this->uri->segment(2)));
		//pagination        
		$cnum = $this->Housesm->searchDBrows("sale",$searchvalue);
		$data['pagination'] = $this->getpaginator($cnum,$this->propertiesperpage,"sale",$searchvalue,$page);  
   		$plus = array(
    			'meta'=>'<meta name="robots" content="noindex, nofollow">',
    			'css'=>$this->getcssname('stylelist2'),
    			'title'=>strtr($this->lang->line("forerror-title"), array('{$searchvalue}' => $data['searchvalue'])),
    			'js'=>''
    		);
		$this->load->view('header',$plus);
		$this->load->view('shortform');
        	$this->load->view('houseslist', $data);
        	
		$this->load->view('footer');	

	}
	public function for_sale(){
	
		$this->general_search("sale");

	}
	public function to_rent(){
		
		$this->general_search("rental");

	}
	public function uk(){
		$plus = array('css'=>$this->getcssname('stylelist2'),'title'=>$this->lang->line("uk-title"),'js'=>'');
		$this->load->view('header',$plus);
		$this->load->view('shortform');
		$this->load->view('uk');
		$this->load->view('footer');	
	}
	function price(){	
		$viewtogetname = "";
		$queryseachlist=null;
		$searchfirst=true;
		$meta = "";
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

		}elseif($this->uri->segment(5) != null){//area level

			$data['controller']=$this;
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

		}elseif($this->uri->segment(4) != null){//town level
	
			$data['controller']=$this;
			$data['town'] = $this->uri->segment(4);
			$data['district'] = $this->uri->segment(3);
			$data['country'] = $this->uri->segment(2);
			$data['townspace'] = $this->undoiturl($data['town']);
			$data['districtname'] = $this->undoiturl($data['district']);
			$data['countryspace'] = $this->undoiturl($data['country']);
			$this->load->model('Housesm');
			$data['districtiso'] = $this->Housesm->getisobydist($data['districtname'])[0]->iso;
			//$data['districtname'] = $this->Housesm->getdistbyiso($data['district'])[0]->district;
			$data['results'] = $this->Housesm->gettownareas($data['townspace'],$data['districtname']);			
			$viewtogetname='town';
			$queryseachlist = $data['townspace']." ".$data['districtname'];
			$title = $data['townspace'].", ".$data['districtname'];
			$placename = $data['townspace'].', '.$data['districtname'].', '.$data['countryspace'];
			$region = $data['districtiso'];			
			$searchfirst=false;

		}elseif($this->uri->segment(3) != null){//district level
			
			$data['controller']=$this;
			$data['country'] = $this->uri->segment(2);
			$data['district'] = $this->uri->segment(3);
			$data['districtname'] = $this->undoiturl($data['district']);
			$data['countryspace'] = $this->undoiturl($data['country']);
			$this->load->model('Housesm');
			$data['districtiso'] = $this->Housesm->getisobydist($data['districtname'])[0]->iso;
			//$data['districtname'] = $this->Housesm->getdistbyiso($data['district'])[0]->district;			
			$data['results'] = $this->Housesm->getdisttown($data['districtname']);	
			$viewtogetname ='district';
			$title = $data['districtname'].", ".$data['countryspace'];
			$placename = $data['districtname'].', '.$data['countryspace'];
			$region = $data['districtiso'];

		}elseif($this->uri->segment(2) != null){//country level
			
			$data['controller']=$this;
			$data['country'] = $this->uri->segment(2);
			$data['countryspace'] = $this->undoiturl($data['country']);
			$this->load->model('Housesm');
			$data['results'] = $this->Housesm->getcountrydist($data['country']);
			$viewtogetname='country';
			$title = $data['countryspace'];		
			$placename = $data['countryspace'];
			$region = 'GB';			
		}
		$plus = array(
			'css'=>$this->getcssname('stylelist2'),
			'title'=>strtr($this->lang->line("price-title"), array('{$searchvalue}' => $title)),
			'js'=>'',
			'meta'=>strtr($this->lang->line("price-meta"), array('{$location}' => $title, '{$placename}' => $placename, '{$region}' => $region))
		);
		$this->load->view('header',$plus);
		$this->load->view('shortform');
		if($queryseachlist != null){
			$datalists['results'] = $this->Housesm->searchDB("sale",$queryseachlist,$this->propertiesperpage);
		       	$datalists['searchvalue'] = ucwords(str_replace("-", " ", $queryseachlist));
		       	$datalists['saletype'] ="For Sale";
			//pagination
		       	//$cbase = $this->config->base_url().'for-sale/'.str_replace(" ", "-", $queryseachlist).'/';
			$cnum = $this->Housesm->searchDBrows("sale",$queryseachlist);
			$datalists['pagination'] = $this->getpaginator($cnum,$this->propertiesperpage,"sale",$this->doiturl($queryseachlist),1);
			if($searchfirst==true){
				$this->load->view('houseslist', $datalists);
				$this->load->view($viewtogetname,$data);
			}else{
				$this->load->view($viewtogetname,$data);
				$this->load->view('houseslist', $datalists);				   		
			}
		}else{
			$this->load->view($viewtogetname,$data);
		}
		$this->load->view('footer');	
	}

	function redirect(){

		$key = $this->uri->segment(3);
		$this->load->model('Housesm');
		$urlts = $this->Housesm->getredirectUrl($key)[0]->url_feed;
		header("Location: $urlts ");
		die();

	}
	function getcssname($basename){

       		//$this->load->library('user_agent');
		// if($this->agent->is_mobile()){
		//	$name = "mobile-$basename";
		// }else{
		$name = $basename;
		// }
		return $name;
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
        
               
        function getnewpaginator($num,$perpage,$typesale,$query,$page=1,$filters = false){
        	
       	     	
       	    $urlparam = $this->createurlparameters($query, $filters);
            $x = ceil($num/$perpage);
            if($typesale == 'sale'){
        	$type = 'for-sale';
            }elseif($typesale == 'rental'){
        	$type = 'to-rent';
            }    
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
	            	$links["links"][] = array("link"=>$this->config->base_url()."houses/$type/index.html{$urlparam}&page=$i","title"=>strtr($this->lang->line("paginator-pagetitle"), array('{$type}' => $type, '{$query}' => $query, '{$name}' => $name)), "name"=>$name);
	            }     
            }        
            return $links;
	}
	
	function createurlparameters($searchvalue, $filters){
		$url = "?";
		
		$url .= "search=".$this->getUrlEncode($searchvalue);
				
			if(isset($filters['price1']))
				$url .= "&price1=".(int)$filters["price1"];
			if(isset($filters['price2']))
				$url .= "&price2=".(int)$filters["price2"];
			if(isset($filters['bedroom1']))
				$url .= "&bedroom1=".(int)$filters["bedroom1"];
			if(isset($filters['bedroom2']))
				$url .= "&bedroom2=".(int)$filters["bedroom2"];
			if(isset($filters["range"]))
				$url .= "&range=".$filters["range"];
			if(isset($filters["sortby"]))
				$url .= "&sortby=".$this->getUrlEncode($filters["sortby"]);			
			
	
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
	
}