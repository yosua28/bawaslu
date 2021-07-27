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
		$profil = $this->profil_model->listingWeb("profil");
		$anggota = $this->profil_model->listingWeb("anggota");
		$data = array(
			'profil' => $profil,
			'anggota' => $anggota,
			'view' => 'profil/bawaslu'
		);

		$this->load->view($this->config->item('front_layout'), $data); 
	}

	public function view($link)
	{
		$detail = $this->profil_model->detailLink($link);
		if($detail) {
			$update = array(
				'id' => $detail->id,
				'dibaca' => $detail->dibaca+1,
			);
			$update_view = $this->profil_model->update_view($update);
			$data = array(
				'profil' => $detail,
				'view' => 'profil/detail_profile'
			);
			$this->load->view($this->config->item('front_layout'), $data); 
		} else {
			redirect(base_url());
		}
	}
}
