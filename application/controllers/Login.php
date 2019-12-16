<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	protected $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->CI =& get_instance();
	}

	public function index()
	{
		if($this->CI->session->userdata('id')) {
			redirect(base_url('/admin/dashboard/index'));
		}
		$error = '';
		$post = $this->input;
		if($post->post()) {
			if(!empty($post->post('username')) && !empty($post->post('password'))) {
				$checking = $this->simple_login->login($post->post('username'), $post->post('password'));
				if (!$checking) {
					$error = 'Username dan Password yang anda masukan salah.';
				}
			} else {
				$error = 'Username dan Password tidak boleh kosong';
			}
		}
		$data = array(
			'view' => 'login/index',
			'error' => $error,
		);
		$this->load->view($this->config->item('login_layout'), $data); 
	}

	public function logout() 
	{
		$this->simple_login->logout();
	}
}
