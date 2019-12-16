<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->CI =& get_instance();
		// $this->load->model('profil_model');
	}

	public function index()
	{
		$data = array(
			'view' => 'profil/bawaslu'
		);
		$this->load->view($this->config->item('front_layout'), $data); 
	}
}
