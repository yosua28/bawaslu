<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->CI =& get_instance();
	}

	public function foto()
	{
		$data = array(
			'view' => 'admin/galeri/foto'
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}

	public function video()
	{
		$data = array(
			'view' => 'admin/pengumuman/index'
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}

	// public function delete($id, $kategori) {
	// 	$delete = $this->konten_model->delete($id);
	// 	if($delete) {
	// 		redirect(base_url().'admin/konten/kategori/'.$kategori);
	// 	}
	// }
}
