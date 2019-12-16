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
		$data['created_by'] = $this->CI->session->userdata('id');
		$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

		return $this->db->insert('user',$data);
	}
	
	// Edit 
	public function edit ($data) {
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->CI->session->userdata('id');

		$this->db->where('id', $data['id']);
		$this->db->update('user', $data);
		return true;
	}
	
	// Delete
	public function delete ($id){
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->CI->session->userdata('id');
		$data['is_delete'] = '1';

		$this->db->where('id', $id);
		$this->db->update('user', $data);
		return true;
	}

	// detail user
	public function detail($id){
		$query = $this->db->get_where('user',array('id'  => $id, 'is_delete' => '0'));
		return $query->row();
	}



}