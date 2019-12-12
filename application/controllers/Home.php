<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// $data = array( 'view' => 'welcome_message');
		// $this->load->view('welcome_message'); 
		$data = array(
			'view' => 'home/home'
		);
		$this->load->view($this->config->item('front_layout'), $data); 
	}
}
