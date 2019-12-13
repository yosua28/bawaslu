<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array(
			'view' => 'home/home'
		);
		$this->load->view($this->config->item('front_layout'), $data); 
	}

	public function konten($kategori)
	{
		$data = array(
			'view' => 'home/konten'
		);
		$this->load->view($this->config->item('front_layout'), $data); 
	}
}
