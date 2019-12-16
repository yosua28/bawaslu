<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->CI =& get_instance();
	}

	public function index()
	{
		$data = array(
			'view' => 'admin/profil/index'
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}

}
