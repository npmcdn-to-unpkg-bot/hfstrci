<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Houses extends CI_Controller {

	public function index(){
		$plus = array(
			'css'=>$this->getcssname('style2'),
			'title'=>'Houses for Sale & to Rent, Find houses and properties for sale or to rent in the United Kingdom.',
			'js'=>'<script type="text/javascript">jQuery(document).ready(function() {$(".search").delegate("input", "focus", function() {if (this.value === "Search for address, town or area.") {this.value = "";}});});</script>'
		);
		$this->load->view('header',$plus);
		$this->load->view('longform');
		$this->load->view('footer');
	}
	public function for_sale(){

		$plus = array('css'=>$this->getcssname('stylelist2'),'title'=>'page title','js'=>'');
		$this->load->view('header',$plus);
		$this->load->view('shortform');
		$this->load->model('Housesm');

		$searchvalue = $this->uri->segment(3);
		if($this->uri->segment(4) == null){$page = 1;}else{$page = $this->uri->segment(4);}
        $data['results'] = $this->Housesm->searchDB("sale",$searchvalue,50,$page);
        $data['searchvalue'] = ucwords(str_replace("-", " ", $searchvalue));
        $data['saletype'] = ucwords(str_replace("-", " ", $this->uri->segment(2)));

//pagination        


								$cnum = $this->Housesm->searchDBrows("sale",$searchvalue);

							$data['pagination'] = $this->getpaginator($cnum,50,"sale",$searchvalue,0);
		

        $this->load->view('houseslist', $data);


		$this->load->view('footer');
		
		$this->Housesm->savesearch($data['searchvalue'], "sale");

	}
	public function for_error(){

			$searchvalue = $this->uri->segment(3);
		if($this->uri->segment(4) == null){$page = 1;}else{$page = $this->uri->segment(4);}

		$this->load->model('Housesm');
        $data['results'] = $this->Housesm->searchDB("sale",$searchvalue,50,$page);
        $data['searchvalue'] = ucwords(str_replace("-", " ", $searchvalue));
        $data['saletype'] = ucwords(str_replace("-", " ", $this->uri->segment(2)));

//pagination        
	$cnum = $this->Housesm->searchDBrows("sale",$searchvalue);
	$data['pagination'] = $this->getpaginator($cnum,50,"sale",$searchvalue,0);  
    
    $plus = array('meta'=>'<meta name="robots" content="noindex, nofollow">','css'=>$this->getcssname('stylelist2'),'title'=>'Houses for sale & to rent in '.$data['searchvalue'],'js'=>'');
		
		$this->load->view('header',$plus);
		$this->load->view('shortform');
        $this->load->view('houseslist', $data);
		$this->load->view('footer');	

	}
	public function to_rent(){


		
		$this->load->model('Housesm');
		$searchvalue = $this->uri->segment(3);
		if($this->uri->segment(4) == null){$page = 1;}else{$page = $this->uri->segment(4);}
        $data['results'] = $this->Housesm->searchDB("rental",$searchvalue,50,$page);
        $data['searchvalue'] = ucwords(str_replace("-", " ", $searchvalue));
        $data['saletype'] = ucwords(str_replace("-", " ", $this->uri->segment(2)));
//pagination
        $cnum = $this->Housesm->searchDBrows("rental",$searchvalue);
		$data['pagination'] = $this->getpaginator($cnum,50,"rental",$searchvalue,0);
// header info
		$plus = array('css'=>$this->getcssname('stylelist2'),'title'=>'Houses for Sale & to Rent, Houses to rent in '.$data['searchvalue'],'js'=>'');

		$this->load->view('header',$plus);
		$this->load->view('shortform');				
        $this->load->view('houseslist', $data);
		$this->load->view('footer');	
		
		
		$this->Housesm->savesearch($data['searchvalue'], "rent");
	}
	public function uk(){

		$plus = array('css'=>$this->getcssname('stylelist2'),'title'=>'Houses for Sale & to Rent, Houses in the United Kingdom','js'=>'');
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
			$title = ' in '.$data['codespace'].", ".$data['areaspace'];
			$meta = '
				<meta name="description" content="Houses for sale in '.$data['codespace'].', '.$data['codespace'].', Houses to rent in '.$data['codespace'].', Flats in '.$data['codespace'].', Properties for sale in '.$data['codespace'].', Properties to rent in '.$data['codespace'].'" />
				<meta name="keywords" content="Houses for sale in '.$data['codespace'].', '.$data['codespace'].', Houses to rent in '.$data['codespace'].', Flats in '.$data['codespace'].', Properties for sale in '.$data['codespace'].', Properties to rent in '.$data['codespace'].'" />
				<meta name="geo.placename" content="'.$data['codespace'].', '.$data['areaspace'].', '.$data['townspace'].', '.$data['districtname'].', '.$data['countryspace'].'" />
				<meta name="robots" content="index, follow" />
				<meta name="geo.region" content="'.$data['districtiso'].'" />

			';



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
			$title = ' in '.$data['areaspace'].", ".$data['townspace'];
			$meta = '
				<meta name="description" content="Houses for sale in '.$data['areaspace'].', '.$data['areaspace'].', Houses to rent in '.$data['areaspace'].', Flats in '.$data['areaspace'].', Properties for sale in '.$data['areaspace'].', Properties to rent in '.$data['areaspace'].'" />
				<meta name="keywords" content="Houses for sale in '.$data['areaspace'].', '.$data['areaspace'].', Houses to rent in '.$data['areaspace'].', Flats in '.$data['areaspace'].', Houses for sale & to rent, Properties for sale in '.$data['areaspace'].', Properties to rent in '.$data['areaspace'].'" />
				<meta name="geo.placename" content="'.$data['areaspace'].', '.$data['townspace'].', '.$data['districtname'].', '.$data['countryspace'].'" />
				<meta name="robots" content="index, follow" />
				<meta name="geo.region" content="'.$data['districtiso'].'" />

			';

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
			$title = ' in '.$data['townspace'].", ".$data['districtname'];
			$meta = '
				<meta name="description" content="Houses for sale in '.$data['townspace'].', '.$data['townspace'].', Houses to rent in '.$data['townspace'].', Flats in '.$data['townspace'].', Properties for sale in '.$data['townspace'].', Properties to rent in '.$data['townspace'].'" />
				<meta name="keywords" content="Houses for sale in '.$data['townspace'].', '.$data['townspace'].', Houses to rent in '.$data['townspace'].', Flats in '.$data['townspace'].', Properties for sale in '.$data['townspace'].', Properties to rent in '.$data['townspace'].'" />
				<meta name="geo.placename" content="'.$data['townspace'].', '.$data['districtname'].', '.$data['countryspace'].'" />
				<meta name="robots" content="index, follow" />
				<meta name="geo.region" content="'.$data['districtiso'].'" />

			';

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
			
			$viewtogetname='district';
			$title = ' in '.$data['districtname'].", ".$data['countryspace'];
			$meta = '
				<meta name="description" content="Houses for sale in '.$data['districtname'].', '.$data['districtname'].', Houses to rent in '.$data['districtname'].', Flats in '.$data['districtname'].', Houses for sale & to rent, Properties for sale in '.$data['districtname'].', Properties to rent in '.$data['districtname'].'" />
				<meta name="keywords" content="Houses for sale in '.$data['districtname'].', '.$data['districtname'].', Houses to rent in '.$data['districtname'].', Flats in '.$data['districtname'].', Houses for sale & to rent, Properties for sale in '.$data['districtname'].', Properties to rent in '.$data['districtname'].'" />
				<meta name="geo.placename" content="'.$data['districtname'].', '.$data['countryspace'].'" />
				<meta name="robots" content="index, follow" />
				<meta name="geo.region" content="'.$data['districtiso'].'" />

			';

		}elseif($this->uri->segment(2) != null){//country level
			$data['controller']=$this;
			$data['country'] = $this->uri->segment(2);
			$data['countryspace'] = $this->undoiturl($data['country']);
			$this->load->model('Housesm');
			$data['results'] = $this->Housesm->getcountrydist($data['country']);
			$viewtogetname='country';
			$title = ' in '.$data['countryspace'];
			$meta = '
				<meta name="description" content="Houses for sale in '.$data['countryspace'].', '.$data['countryspace'].', Houses to rent in '.$data['countryspace'].', Flats in '.$data['countryspace'].', Properties for sale in '.$data['countryspace'].', Properties to rent in '.$data['countryspace'].'" />
				<meta name="keywords" content="Houses for sale in '.$data['countryspace'].', '.$data['countryspace'].', Houses to rent in '.$data['countryspace'].', Flats in '.$data['countryspace'].', Properties for sale in '.$data['countryspace'].', Properties to rent in '.$data['countryspace'].'" />
				<meta name="geo.placename" content="'.$data['countryspace'].'" />
				<meta name="robots" content="index, follow" />
				<meta name="geo.region" content="GB" />

			';
		}

		$plus = array('css'=>$this->getcssname('stylelist2'),'title'=>'House for Sale & to Rent'.$title,'js'=>'','meta'=>$meta);
		$this->load->view('header',$plus);
		$this->load->view('shortform');
			if($queryseachlist != null){
					$datalists['results'] = $this->Housesm->searchDB("sale",$queryseachlist,50);
		        	$datalists['searchvalue'] = ucwords(str_replace("-", " ", $queryseachlist));
		        	$datalists['saletype'] ="For Sale";
//pagination
		        	//$cbase = $this->config->base_url().'for-sale/'.str_replace(" ", "-", $queryseachlist).'/';
				$cnum = $this->Housesm->searchDBrows("sale",$queryseachlist);

				$datalists['pagination'] = $this->getpaginator($cnum,50,"sale",$this->doiturl($queryseachlist),0);

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
    function getpaginator($num,$perpage,$typesale,$query,$page=1){
    $x = ceil($num/$perpage);
     


      if($typesale == 'sale'){
        $type = 'for-sale';
      }elseif($typesale == 'rental'){
        $type = 'to-rent';
      }

      $ret = '<div class="box"><h4>'.$num.' Houses in '.$x.' pages</h4> <ul id="paginator">';
      for($i = 0; $i < $x; $i++){
        if($i == 0)
          $trick = '';
        $name = 'First Page';
         
        if($i>0){
        	$d = $i+1;
          $trick = "/$d";
           $name = $d;
        }
        if($i ==$page){
             $ret .= "<li>$name</li>";
        }else{
          $ret .= '<li><a href="'.$this->config->base_url().'houses/'.$type.'/'. $query . $trick .'.html" title="'."Houses $type in $query page $name".'">'.$name.'</a></li>';
        }

        
      }
      $ret .= "</ul>";
        $ret .= "</div><div class='clear'></div>";
        return $ret;
   }
	


}

	
