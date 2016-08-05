<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Singles extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->lang->load("titles","english");
		$this->load->model('Housesm');
		$this->load->library('user_agent');
	}

	public function index(){

		$plus = array(
			'css'=>'style2',
			'title'=> $this->lang->line("index-title"),
			'js'=>'',
		);
		if (!$this->agent->is_mobile()) {
			$this->load->view('header',$plus);
			$this->load->view('longform');
		} else {
			$this->load->view('mobile/header',$plus);
			$this->load->view('mobile/longform');
		}

		$data = array();
		$data["links"] = $this->Housesm->footerlinks();

		if (!$this->agent->is_mobile()) {
			$this->load->view('footer',$data);
		} else {
			$this->load->view('mobile/footer',$data);
		}


	}
	public function privacy(){

		$plus = array(
			'meta'=>'<meta name="robots" content="noindex, nofollow">',
			'title'=> $this->lang->line("index-title"),
			'js'=>'',
		);

					if (!$this->agent->is_mobile()) {
						$this->load->view('citylight/head',$plus);
						$this->load->view('citylight/header');
						$this->load->view('citylight/policy');
					} else {
						$this->load->view('citylight/mobile/head',$plus);
						$this->load->view('citylight/mobile/header');
						$this->load->view('citylight/policy');
					}
		$this->getFooter();

	}

	function getFooter(){
		$data = array();
		$data["links"] = $this->Housesm->footerlinks();
		if (!$this->agent->is_mobile()) {
				$this->load->view('citylight/footer',$data);
		} else {
				$this->load->view('citylight/mobile/footer',$data);
		}

	}

	function hollandpark(){

		$this->load->view('citylight/hp');

	}

}
