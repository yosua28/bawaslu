<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->CI =& get_instance();
		$this->load->model('konten_model');
		$this->load->model('kategori_model');
	}

	public function index($kategori)
	{
		$is_valid = $this->kategori_model->detail($kategori);
		if($is_valid != null) {
			$konten = $this->konten_model->listing($kategori);
			$data = array(
				'kategori' => $kategori,
				'konten' => $konten,
				'view' => 'admin/konten/index'
			);
			$this->load->view($this->config->item('admin_layout'), $data); 
		}

	}

	public function add($kategori)
	{
		$is_valid = $this->kategori_model->detail($kategori);
		if($is_valid != null) {
			// Validasi
			$valid = array(
				'judul' => '',
				'file_pendukung' => '',
				'thumnail' => ''
			);
			//Data
			$data_konten = array(
				'id_kategori' => $is_valid->id,
				'judul' => '',
				'isi_konten' => '',
				'is_active' => ''
			);

			$post = $this->input;
			if($post->post()) {
				if(empty($post->post('judul'))){
					$valid['judul'] = 'Judul tidak boleh kosong';
				}

				$data_konten = array(
					'id_kategori' => $is_valid->id,
					'judul' => $post->post('judul'),
					'isi_konten' => $post->post('isi_konten'),
					'is_active' => $post->post('is_active'),
				);

				if(empty($valid['judul']) && empty($valid['kategori'])) {
					$save = $this->konten_model->simpan($data_konten);
					if($save) {
						redirect(base_url().'dashboard');
					}
				}

			}

			$konten = $this->konten_model->listing($kategori);
			$data = array(
				'kategori' => $kategori,
				'list_kategori' => $this->kategori_model->listing(),
				'konten' => $konten,
				'valid' => $valid,
				'data' => $data_konten,
				'view' => 'admin/konten/form'
			);
			$this->load->view($this->config->item('admin_layout'), $data); 
		}
	}

	public function delete($id) {
		var_dump("ddd");exit;
		$delete = $this->konten_model->delete($id);
	}
}
