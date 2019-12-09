<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->CI =& get_instance();
		$this->load->model('user_model');
	}

	public function index()
	{
		$user_list = $this->user_model->listing();
		$data = array(
			'user_list' => $user_list,
			'view' => 'admin/user/index'
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}

	public function add()
	{
		// Validasi
		$valid = array(
			'username' => '',
			'password' => '',
			'password_confirm' => '',
			'nama' => '',
			'email' => '',
			'no_hp' => '',
			'alamat' => '',
			'is_active' => '',
			'role' => '',
		);
		//Data
		$data_user = array(
			'username' => '',
			'password' => '',
			'password_confirm' => '',
			'nama' => '',
			'email' => '',
			'no_hp' => '',
			'alamat' => '',
			'is_active' => '',
			'role' => '',
		);
		$post = $this->input;
		if($post->post()) {
			if(empty($post->post('username'))){
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
		$data = array(
			'valid' => $valid,
			'data' => $data_user,
			'view' => 'admin/user/form'
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}
}
