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
			$url = 'http://maps.googleapis.com/maps/api/geocode/json?address=' . $search_code . '&sensor=false';
			$json = json_decode(file_get_contents($url));
			
			$lat = $json->results[0]->geometry->location->lat;
			$lng = $json->results[0]->geometry->location->lng;
			if($lat && $lng){
				$this->Housesm->insertlatlong($search_code, $lat, $lng);
				return array($lat, $lng);
			}else
				return false;
		}

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
	
		$filters = false;		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('price1', 'price1', 'required');
		//@get from filter
		$range = 1;
		
		if ($this->form_validation->run()){
			$filters = array();
			if((int)$this->input->post('price1') > 0)
				$filters['price1'] = $this->input->post('price1');
			if((int)$this->input->post('price2') > 0)
				$filters['price2'] = $this->input->post('price2');
			if((int)$this->input->post('bedroom1') > 0)
				$filters['price2'] = $this->input->post('bedroom1');
			if((int)$this->input->post('bedroom2') >= 0)
				$filters['price2'] = $this->input->post('bedroom2');
		}
		
		$searchvalue = $this->uri->segment(3);
		if($this->uri->segment(4) == null){$page = 1;}else{$page = $this->uri->segment(4);}

		if($res = $this->returngooglelatlong(str_replace("-", " ", $searchvalue))){
			list($lat,$lng) = $res;
			$data['results'] = $this->Housesm->searchpropertylatlong("sale",$lat,$lng,$this->propertiesperpage,$range,$page,$filters);
			$cnum = $this->Housesm->searchpropertylatlongrows("sale",$lat,$lng, 1 ,$filters);
			$data['pagination'] = $this->getpaginator($cnum,$this->propertiesperpage,"sale",$searchvalue,$page);
			//$data['pagination'] = $this->getnewpaginator($cnum,$this->propertiesperpage,"sale",$searchvalue,$page);
						
		}else{
	   		$data['results'] = $this->Housesm->searchDB("sale",$searchvalue,$this->propertiesperpage,$page,$filters);
	   		//pagination        
			$cnum = $this->Housesm->searchDBrows("sale",$searchvalue,$filters);
			$data['pagination'] = $this->getpaginator($cnum,$this->propertiesperpage,"sale",$searchvalue,$page);
   		}

  		//@note: not used in new layout
  		$data['prices'] = $this->Housesm->gettopandminprice("sale",$searchvalue);
 		$data['searchvalue'] = ucwords(str_replace("-", " ", $searchvalue));
   		$data['saletype'] = ucwords(str_replace("-", " ", $this->uri->segment(2)));

		$plus = array(
			'css'=>$this->getcssname('stylelist2'),
			'title'=> strtr($this->lang->line("forsale-title"), array('{$searchvalue}' => $data['searchvalue'])),			
			'js'=>'',
			);
		
			/*$this->load->view('header',$plus);
		$this->load->view('shortform');				
       		$this->load->view('houseslist', $data);
		$this->load->view('footer');*/
		
		$this->load->view('citylight/head',$plus);
		$this->load->view('citylight/header');				
       	$this->load->view('citylight/list', $data);
		$this->load->view('citylight/footer');
		
		$this->Housesm->savesearch($data['searchvalue'], "sale");

	}

	public function to_rent(){
		$filters = false;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('price1', 'price1', 'required');
		if ($this->form_validation->run()){
			$filters = array();
			if((int)$this->input->post('price1') > 0)
				$filters['price1'] = $this->input->post('price1');
			if((int)$this->input->post('price2') > 0)
				$filters['price2'] = $this->input->post('price2');
			if((int)$this->input->post('bedroom1') > 0)
				$filters['price2'] = $this->input->post('bedroom1');
			if((int)$this->input->post('bedroom2') >= 0)
				$filters['price2'] = $this->input->post('bedroom2');
		}
		$this->load->model('Housesm');
		$searchvalue = $this->uri->segment(3);
		if($this->uri->segment(4) == null){$page = 1;}else{$page = $this->uri->segment(4);}
		
		if($res = $this->returngooglelatlong(str_replace("-", " ", $searchvalue))){
			list($lat,$lng) = $res;
			$data['results'] = $this->Housesm->searchpropertylatlong("rental",$lat,$lng,$this->propertiesperpage,"distance",$page,$filters);
			$cnum = $this->Housesm->searchpropertylatlongrows("rental",$lat,$lng, 1 ,$filters);
			//$data['pagination'] = $this->getpaginator($cnum,$this->propertiesperpage,"rental",$searchvalue,$page);
			$data['pagination'] = $this->getnewpaginator($cnum,$this->propertiesperpage,"rental",$searchvalue,$page);
						
		}else{
	   		$data['results'] = $this->Housesm->searchDB("rental",$searchvalue,$this->propertiesperpage,$page,$filters);
	   		//pagination
	   		$cnum = $this->Housesm->searchDBrows("rental",$searchvalue,$filters);    
			//$data['pagination'] = $this->getpaginator($cnum,$this->propertiesperpage,"rental",$searchvalue,$page);
			$data['pagination'] = $this->getnewpaginator($cnum,$this->propertiesperpage,"rental",$searchvalue,$page);
   		}		
       		
        	$data['searchvalue'] = ucwords(str_replace("-", " ", $searchvalue));
        	$data['saletype'] = ucwords(str_replace("-", " ", $this->uri->segment(2)));
          	$data['prices'] = $this->Housesm->gettopandminprice("rental",$searchvalue);
		
		// header info
		$plus = array(
			'css'=>$this->getcssname('stylelist2'),
			'title'=>strtr($this->lang->line("torent-title"), array('{$searchvalue}' => $data['searchvalue'])),
			'js'=>''
		);

		
		/*$this->load->view('header',$plus);
		$this->load->view('shortform');				
       		$this->load->view('houseslist', $data);
		$this->load->view('footer');*/
		
		$this->load->view('citylight/head',$plus);
		$this->load->view('citylight/header');				
       	$this->load->view('citylight/list', $data);
		$this->load->view('citylight/footer');
		
		$this->Housesm->savesearch($data['searchvalue'], "rent");
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
        	// $i = str_replace(" ","-",$i);    
        	$i = str_replace("-"," ",$i);
        	$i = str_replace("_","-",$i);            
        	//$i = str_replace(",","/",$i);
        	$i = ucwords($i);
        	return $i;
        }
        
        //@note OLD function might be ended soon
        function getpaginator($num,$perpage,$typesale,$query,$page=1){
          $x = ceil($num/$perpage);
         
          if($typesale == 'sale'){
            $type = 'for-sale';
          }elseif($typesale == 'rental'){
            $type = 'to-rent';
          }
    
          $ret = '<div class="box"><h4>'.$num.' Houses in '.$x.' pages</h4> <ul id="paginator">';
          for($i = 1; $i < $x; $i++){
            if($i == 1)
              $trick = '';
            $name = 'First Page';
             
            if($i>1){
                
              $trick = "/$i";
              $name = $i;
            }
            if($i == $page){
                 $ret .= "<li>$name</li>";
            }else{
              $ret .= '<li><a href="'.$this->config->base_url().'houses/'.$type.'/'. $query . $trick .'.html" title="'."Houses $type in $query page $name".'">'.$name.'</a></li>';
            }
    
            
          }
          $ret .= "</ul>";
            $ret .= "</div><div class='clear'></div>";
            return $ret;
       }
        
        function getnewpaginator($num,$perpage,$typesale,$query,$page=1){
        
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
	            	$trick = '';
	            	$name = $this->lang->line("paginator-firstpage");    
	            }elseif($i>1){           
	            	$trick = "/$i";
	            	$name = $i;
	            } 
	            if($i == $page){
	            	$links["links"][] = array("link"=>false,"title"=>false,"name"=>$name);
	            }else{
	            	$links["links"][] = array("link"=>$this->config->base_url().'houses/'.$type.'/'. $query . $trick .'.html',"title"=>strtr($this->lang->line("paginator-pagetitle"), array('{$type}' => $type, '{$query}' => $query, '{$name}' => $name)), "name"=>$name);
	            }     
            }        
            return $links;
        }
	
}