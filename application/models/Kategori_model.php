<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing() {
		$this->db->select('id, kategori');
		$this->db->from('kategori');
		// where
		$this->db->where(
			array(
				'is_active =' => 1,
				'is_delete =' => 0
			)
		);
		//order
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// detail perberita
	public function detail($kategori){
		$query = $this->db->get_where('kategori',array('kategori'  => $kategori));
		return $query->row();
	}

	
}