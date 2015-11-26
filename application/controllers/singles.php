<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Singles extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->lang->load("titles","english");
		$this->load->model('Housesm');
	}
	
	public function index(){
		
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
		
	}
	public function privacy(){
	
		$plus = array(
			'meta'=>'<meta name="robots" content="noindex, nofollow">',
			'title'=> $this->lang->line("index-title"),
			'js'=>'',
		);
		$this->load->view('citylight/head',$plus);
		$this->load->view('citylight/header');				
	      	$this->load->view('citylight/policy');		
		$this->getFooter();
		
	}
	
	function getFooter(){
		$data = array();
		$data["links"] = $this->Housesm->footerlinks();
		$this->load->view('citylight/footer',$data);
	}
	
	function hollandpark(){
		
		$this->load->view('citylight/hp');	
	}
	
}
