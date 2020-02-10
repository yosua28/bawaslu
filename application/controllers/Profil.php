<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->CI =& get_instance();
		$this->load->model('profil_model');
	}

	public function index()
	{
		$data = array(
			'view' => 'profil/bawaslu'
		);
		$this->load->view($this->config->item('front_layout'), $data); 
	}

	public function kategori($kategori)
	{
		$profil = $this->profil_model->detail($kategori);
		$konten = str_replace("#BASE_URL#", base_url(), $profil->isi);
		$data = array(
			'konten' => $konten,
			'profil' => $profil,
			'view' => 'profil/detail_profile'
		);
		$this->load->view($this->config->item('front_layout'), $data); 
	}
}
