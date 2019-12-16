<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	// Login
	public function login($username, $password) {
		$row = $this->CI->db->query('SELECT * FROM user WHERE username = "'.$username.'" and is_delete = 0 and is_active = 1');
		if($row != null) {
			$admin 	= $row->row();
			if($admin != null) {
				if(password_verify($password, $admin->password) == 1) {
					$this->CI->session->set_userdata('id', $admin->id);
					$this->CI->session->set_userdata('nama', $admin->nama); 
					$this->CI->session->set_userdata('username', $admin->username); 
					$this->CI->session->set_userdata('role', $admin->role); 
					redirect(base_url().'admin/dashboard/index');				
				}
			}
		}
		return false;
	}
	
	// Cek login
	public function cek_login() {
		if($this->CI->session->userdata('id') == '' && $this->CI->session->userdata('role')=='') {
			$this->CI->session->set_flashdata('sukses','Oops...silakan login dulu');
			redirect(base_url('/login/index'));
		}
		return true;
	}
	
	// Logout
	public function logout() {
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('role');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('id');
		session_destroy();
		$this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect(base_url().'login/index');
	}
	
}