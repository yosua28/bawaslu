<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->CI =& get_instance();
		$this->load->model('konten_model');
	}

	public function index()
	{
		$berita = $this->konten_model->listingBerita(0);
		$pengumuman = $this->konten_model->listingBerita(1);
		$data = array(
			'berita' => $berita,
			'pengumuman' => $pengumuman,
			'view' => 'home/home'
		);
		$this->load->view($this->config->item('front_layout'), $data); 
	}

	public function konten($kategori)
	{
		$berita = $this->konten_model->listingBerita(0);
		$pengumuman = $this->konten_model->listingBerita(1);
		$data = array(
			'berita' => $berita,
			'pengumuman' => $pengumuman,
			'view' => 'home/konten'
		);
		$this->load->view($this->config->item('front_layout'), $data); 
	}
}
