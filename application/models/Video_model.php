<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Video_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing($filter = "", $limit = "", $pagination = "") {
		$this->db->select('video.*');
		$this->db->from('video');
		// where
		$where = array(
				'video.is_delete =' => 0
			);
		if ($filter != "") {
			$this->db->like('video.judul', $filter);
			$this->db->or_like('video.keterangan_foto', $filter);
		}
		// where
		$this->db->where($where);

		if ($limit != 0) {
			$this->db->limit($limit, $limit*$pagination);
		}

		//order
		$this->db->order_by('video.id','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Count
	public function countDataAll() {
		$where = array(
				'video.is_delete =' => 0
			);
		$this->db->where($where);
		$this->db->from('video');
		return $this->db->count_all_results(); 
	}


	// Tambah
	public function simpan ($data) {
		$data['created_date'] = date('Y-m-d H:i:s');
		$data['created_by'] = $this->CI->session->userdata('id');
		$data['link'] = $this->formatLink($data['judul']);

		$this->db->insert('video', $data);
		return $this->db->insert_id();
	}

	// detail video
	public function detail($id){
		$query = $this->db->get_where('video',array('id'  => $id));
		return $query->row();
	}
	
	// Edit 
	public function edit ($data) {
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->CI->session->userdata('id');

		$this->db->where('id', $data['id']);
		$this->db->update('video', $data);
		return true;
	}

	// Edit View
	public function update_view ($data) {
		$this->db->where('id', $data['id']);
		$this->db->update('video', $data);
	}
	
	// Delete
	public function delete ($id){
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->CI->session->userdata('id');
		$data['is_delete'] = '1';

		$this->db->where('id', $id);
		$this->db->update('video', $data);
		return true;
	}

	public function formatLink($judul) {
		$judul = preg_replace('/[^a-zA-Z0-9_ -]/s','',$judul);
		$judul = str_replace(' ', '-', strtolower($judul));
		$link = strtotime(date('Y-m-d H:i:s')).'-'.$judul;
		return $link;
	}
}