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

	public function cari()
	{
		$post = $this->input;
		if($post->post()) {
			// var_dump($post->post('search_block_form'));exit;
			if(!empty($post->post('search_block_form'))){
				$valid['judul'] = 'Judul tidak boleh kosong';
				redirect(base_url().'berita/pencarian/'.$post->post('search_block_form'));
			}
		}
	}

	public function pencarian($key = "")
	{
		if($key != "") {
			$konten = $this->konten_model->search_like($key);
			$data_kategori['nama'] = $key;
			$data = array(
				'data_kategori' => $key,
				'kategori' => $key,
				'konten' => $konten,
				'view' => 'berita/index'
			);
			$this->load->view($this->config->item('front_layout'), $data); 
		} else {
			redirect(base_url());
		}
	}


	public function kategori($kategori)
	{
		$is_valid = $this->kategori_model->detail($kategori);
		if($is_valid != null) {
			$konten = $this->konten_model->listing($kategori, 1);
			$data = array(
				'data_kategori' => $is_valid->nama,
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
