<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Houses extends CI_Controller {

	public function index(){
		$plus = array(
			'css'=>$this->getcssname('style2'),
			'title'=>'page title',
			'js'=>'<script type="text/javascript">jQuery(document).ready(function() {$(".search").delegate("input", "focus", function() {if (this.value === "Search for address, town or area.") {this.value = "";}});});</script>');
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

        $this->load->view('houseslist', $data);
		$this->load->view('footer');		

	}
	public function to_rent(){

		$plus = array('css'=>$this->getcssname('stylelist2'),'title'=>'page title','js'=>'');
		$this->load->view('header',$plus);
		$this->load->view('shortform');
		$this->load->model('Housesm');
		$searchvalue = $this->uri->segment(3);
		if($this->uri->segment(4) == null){$page = 1;}else{$page = $this->uri->segment(4);}
        $data['results'] = $this->Housesm->searchDB("rental",$searchvalue,50,$page);
        $data['searchvalue'] = ucwords(str_replace("-", " ", $searchvalue));
        $data['saletype'] = ucwords(str_replace("-", " ", $this->uri->segment(2)));
        $this->load->view('houseslist', $data);
		$this->load->view('footer');		
	}
	public function uk(){

		$plus = array('css'=>$this->getcssname('stylelist2'),'title'=>'page title','js'=>'');
		$this->load->view('header',$plus);
		$this->load->view('shortform');
		$this->load->view('uk');
		$this->load->view('footer');	

	}

	function price(){

		$plus = array('css'=>$this->getcssname('stylelist2'),'title'=>'page title','js'=>'');
		
		$viewtogetname = "";
		$queryseachlist=null;
		$searchfirst=true;
		if($this->uri->segment(6) != null){//code level


			$data['code'] = $this->uri->segment(6);
			$data['area'] = $this->uri->segment(5);
			$data['town'] = $this->uri->segment(4);
			$data['district'] = $this->uri->segment(3);
			$data['country'] = $this->uri->segment(2);

			$data['codespace'] = str_replace("-", " ",$data['code']);
			$data['areaspace'] = ucwords(str_replace("-", " ",$data['area']));
			$data['townspace'] = ucwords(str_replace("-", " ",$data['town']));
			//$data['districtspace'] = ucwords(str_replace("-", " ",$data['district']));
			$data['countryspace'] = ucwords(str_replace("-", " ",$data['country']));

			



			$this->load->model('Housesm');
			$data['districtname'] = $this->Housesm->getdistbyiso($data['district'])[0]->district;
			$data['results'] = $this->Housesm->getcodeinfo($data['codespace']);

			$viewtogetname='code';
			$queryseachlist = $data['codespace']." ".$data['areaspace'];



		}elseif($this->uri->segment(5) != null){//area level

			
			$data['area'] = $this->uri->segment(5);
			$data['town'] = $this->uri->segment(4);
			$data['district'] = $this->uri->segment(3);
			$data['country'] = $this->uri->segment(2);


			$data['areaspace'] = ucwords(str_replace("-", " ",$data['area']));
			$data['townspace'] = ucwords(str_replace("-", " ",$data['town']));
			//$data['districtspace'] = ucwords(str_replace("-", " ",$data['district']));
			$data['countryspace'] = ucwords(str_replace("-", " ",$data['country']));



			$this->load->model('Housesm');
			$data['districtname'] = $this->Housesm->getdistbyiso($data['district'])[0]->district;
			$data['results'] = $this->Housesm->getareacode($data['townspace'],$data['areaspace']);

			$viewtogetname='area';
			$queryseachlist = $data['areaspace']." ".$data['townspace'];

		}elseif($this->uri->segment(4) != null){//town level

		

			$data['town'] = $this->uri->segment(4);
			$data['district'] = $this->uri->segment(3);
			$data['country'] = $this->uri->segment(2);

			$data['townspace'] = ucwords(str_replace("-", " ",$data['town']));
			//$data['districtspace'] = ucwords(str_replace("-", " ",$data['district']));
			$data['countryspace'] = ucwords(str_replace("-", " ",$data['country']));

			$this->load->model('Housesm');
			$data['districtname'] = $this->Housesm->getdistbyiso($data['district'])[0]->district;
			$data['results'] = $this->Housesm->gettownareas($data['townspace'],$data['districtname']);
			
			$viewtogetname='town';
			$queryseachlist = $data['townspace']." ".$data['districtname'];
			$searchfirst=false;

		}elseif($this->uri->segment(3) != null){//district level

			$data['country'] = $this->uri->segment(2);
			$data['district'] = $this->uri->segment(3);

			//$data['districtspace'] = ucwords(str_replace("-", " ",$data['district']));
			$data['countryspace'] = ucwords(str_replace("-", " ",$data['country']));

			$this->load->model('Housesm');
			$data['districtname'] = $this->Housesm->getdistbyiso($data['district'])[0]->district;
			

			$data['results'] = $this->Housesm->getdisttown($data['districtname']);
			
			$viewtogetname='district';

		}elseif($this->uri->segment(2) != null){//country level

			$data['country'] = $this->uri->segment(2);
			$data['countryspace'] = ucwords(str_replace("-", " ",$data['country']));
			$this->load->model('Housesm');
			$data['results'] = $this->Housesm->getcountrydist($data['country']);
			$viewtogetname='country';
		}
		$this->load->view('header',$plus);
		$this->load->view('shortform');
			if($queryseachlist != null){
					$datalists['results'] = $this->Housesm->searchDB("sale",$queryseachlist,50);
		        	$datalists['searchvalue'] = ucwords(str_replace("-", " ", $queryseachlist));
		        	$datalists['saletype'] ="For Sale";
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

        		$this->load->library('user_agent');
			 if($this->agent->is_mobile()){
			 		$name = "mobile-$basename";
			 }else{
			 	$name = $basename;
			 }
			 return $name;
	}
	


}
