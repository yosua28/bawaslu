<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->CI =& get_instance();
	}
	
	public function index($id = null, $oke = null)
	{
		$data = array( 'view' => 'admin/dashboard/index');
		$this->load->view('admin/layout/body', $data); 
	}
}
