<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->CI =& get_instance();
	}

	public function foto()
	{
		$data = array(
			'view' => 'galeri/foto'
		);
		$this->load->view($this->config->item('front_layout'), $data); 
	}

	public function video()
	{
		$data = array(
			'view' => 'galeri/video'
		);
		$this->load->view($this->config->item('front_layout'), $data); 
	}

}
