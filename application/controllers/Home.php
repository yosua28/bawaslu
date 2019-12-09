<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array( 'view' => 'welcome_message');
		$this->load->view($this->config->item('admin_layout'), $data); 
	}
}
