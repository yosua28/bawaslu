<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Profil_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	// detail perberita
	public function detail($kategori){
		$query = $this->db->get_where('profil',array('kategori'  => $kategori));
		return $query->row();
	}

}