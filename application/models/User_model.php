<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('user');
		// where
		$this->db->where(
			array(
				'is_delete =' => 0
			)
		);
		//order
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Tambah
	public function simpan ($data) {
		$data['created_date'] = date('Y-m-d H:i:s');
		$data['created_by'] = '1';
		$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

		$this->db->insert('konten',$data);
	}

	// detail perberita
	public function detail($id_berita){
		$query = $this->db->get_where('berita',array('id_berita'  => $id_berita));
		return $query->row();
	}
	
	
	// Edit 
	public function edit ($data) {
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = '1';

		$this->db->where('id', $data['id']);
		$this->db->update('konten', $data);
	}
	
	// Delete
	public function delete ($id){
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = '1';
		$data['is_delete'] = '1';

		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}



}