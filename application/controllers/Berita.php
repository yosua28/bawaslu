<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->CI =& get_instance();
		$this->load->model('kategori_model');
		$this->load->model('konten_model');
	}

	public function kategori($kategori)
	{
		$is_valid = $this->kategori_model->detail($kategori);
		if($is_valid != null) {
			$konten = $this->konten_model->listing($kategori, 1);
			// var_dump($konten);exit;
			$data = array(
				'data_kategori' => $is_valid,
				'kategori' => $kategori,
				'konten' => $konten,
				'view' => 'berita/index'
			);
			$this->load->view($this->config->item('front_layout'), $data); 
		}
	}

	public function view($link)
	{
		$detail = $this->konten_model->detail_link($link);

		if($detail) {
			// var_dump($detail);exit;
			$update = array(
				'id' => $detail->id,
				'dibaca' => $detail->dibaca+1,
			);
			$update_view = $this->konten_model->update_view($update);
			$data = array(
				'detail' => $detail,
				'view' => 'berita/detail'
			);
			$this->load->view($this->config->item('front_layout'), $data); 
		} else {
			redirect(base_url());
		}
	}
}
