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
			'role' => ''
		);
		$post = $this->input;
		if($post->post()) {
			if(empty($post->post('role'))){
				$valid['role'] = 'Role tidak boleh kosong';
			}
			if(empty($post->post('username'))){
				$valid['username'] = 'Username tidak boleh kosong';
			}
			if(empty($post->post('nama'))){
				$valid['nama'] = 'Nama tidak boleh kosong';
			}
			if(empty($post->post('email'))){
				$valid['email'] = 'Email tidak boleh kosong';
			}
			if(empty($post->post('no_hp'))){
				$valid['no_hp'] = 'No HP tidak boleh kosong';
			}
			if(empty($post->post('password_confirm'))){
				$valid['password_confirm'] = 'Konfirmasi Passowrd tidak boleh kosong dan harus sama dengan password';
			}
			if(empty($post->post('password'))) {
				$valid['password'] = 'Username tidak boleh kosong';
			} else {
					// var_dump(strcmp($post->post('password'), $post->post('password_confirm')));exit;
				if(strcmp($post->post('password'), $post->post('password_confirm')) != 0) {
					$valid['password_confirm'] = 'Konfirmasi password harus sama dengan password';
				}
			}

			$data_user = array(
				'username' => $post->post('username'),
				'password' => $post->post('password'),
				'password_confirm' => $post->post('password_confirm'),
				'nama' => $post->post('nama'),
				'email' => $post->post('email'),
				'no_hp' => $post->post('no_hp'),
				'alamat' => $post->post('alamat'),
				'is_active' => $post->post('is_active'),
				'role' => $post->post('role')
			);

			if(empty($valid['username']) && empty($valid['password']) && empty($valid['password_confirm']) && empty($valid['nama']) && empty($valid['email']) && empty($valid['no_hp']) && empty($valid['alamat']) && empty($valid['is_active']) && empty($valid['role'])) {
				unset($data_user['password_confirm']);
				$save = $this->user_model->simpan($data_user);
				if($save) {
					redirect(base_url().'admin/user/index');
				}
			}

		}
		$data = array(
			'valid' => $valid,
			'data' => $data_user,
			'submit' => base_url().'admin/user/add',
			'button_save' => 'Simpan',
			'view' => 'admin/user/form'
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}

	public function delete($id) {
		$delete = $this->user_model->delete($id);
		if($delete) {
			redirect(base_url().'admin/user/index');
		}
	}

	public function update($id)
	{
		$data_detail = $this->user_model->detail($id);
		if($data_detail) {
			// var_dump($data_user->username);exit;
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
			// Data
			$data_user = array(
				'id' => $data_detail->id,
				'username' => $data_detail->username,
				// 'password' => '',
				// 'password_confirm' => '',
				'nama' => $data_detail->nama,
				'email' => $data_detail->email,
				'no_hp' => $data_detail->no_hp,
				'alamat' => $data_detail->alamat,
				'is_active' => $data_detail->is_active,
				'role' => $data_detail->role
			);
			$post = $this->input;
			if($post->post()) {
				if(empty($post->post('role'))){
					$valid['role'] = 'Role tidak boleh kosong';
				}
				if(empty($post->post('username'))){
					$valid['username'] = 'Username tidak boleh kosong';
				}
				if(empty($post->post('nama'))){
					$valid['nama'] = 'Nama tidak boleh kosong';
				}
				if(empty($post->post('email'))){
					$valid['email'] = 'Email tidak boleh kosong';
				}
				if(empty($post->post('no_hp'))){
					$valid['no_hp'] = 'No HP tidak boleh kosong';
				}
				if(!empty($post->post('password'))) {
					if(strcmp($post->post('password'), $post->post('password_confirm')) != 0) {
						$valid['password_confirm'] = 'Konfirmasi password harus sama dengan password';
					}
				}

				$data_user = array(
					'id' => $data_detail->id,
					'username' => $post->post('username'),
					// 'password' => $post->post('password'),
					// 'password_confirm' => $post->post('password_confirm'),
					'nama' => $post->post('nama'),
					'email' => $post->post('email'),
					'no_hp' => $post->post('no_hp'),
					'alamat' => $post->post('alamat'),
					'is_active' => $post->post('is_active'),
					'role' => $post->post('role'),
					'alamat' => $post->post('alamat'),
				);

				if(empty($valid['username']) && empty($valid['password']) && empty($valid['password_confirm']) && empty($valid['nama']) && empty($valid['email']) && empty($valid['no_hp']) && empty($valid['alamat']) && empty($valid['is_active']) && empty($valid['role'])) {
					// unset($data_user['password_confirm']);
					if(!empty($post->post('password'))) {
						$data_user['password'] = password_hash($post->post('password'), PASSWORD_BCRYPT);
						// var_dump($post->post('password'), $data_user['password']);exit; 
					}
					$update = $this->user_model->edit($data_user);
					if($update) {
						redirect(base_url().'admin/user/index');
					}
				}

			}
			$data = array(
				'valid' => $valid,
				'data' => $data_user,
				'submit' => base_url().'admin/user/update/'.$id,
				'button_save' => 'Update',
				'view' => 'admin/user/form'
			);
			$this->load->view($this->config->item('admin_layout'), $data); 
		}
	}
}
