<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Profil_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing($filter, $limit = "", $pagination = "") {
		$this->db->select('profil.*');
		$this->db->from('profil');
		// where
		$where = array(
				'profil.is_delete =' => 0
			);
		if ($filter != "") {
			$this->db->like('profil.nama', $filter);
			$this->db->or_like('profil.isi', $filter);
		}
		// where
		$this->db->where($where);

		if ($limit != 0) {
			$this->db->limit($limit, $limit*$pagination);
		}

		//order
		$this->db->order_by('profil.id','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// detail perberita
	public function detail($kategori){
		$query = $this->db->get_where('profil',array('kategori'  => $kategori));
		return $query->row();
	}
	
	// detail perberita
	public function detailLink($link){
		$query = $this->db->get_where('profil',array('link'  => $link));
		return $query->row();
	}

	// Tambah
	public function simpan ($data) {
		$data['created_date'] = date('Y-m-d H:i:s');
		$data['created_by'] = $this->CI->session->userdata('id');
		$data['link'] = $this->formatLink($data['kategori']);

		$this->db->insert('profil', $data);
		return $this->db->insert_id();
	}

	public function formatLink($judul) {
		$judul = preg_replace('/[^a-zA-Z0-9_ -]/s','',$judul);
		$judul = str_replace(' ', '-', strtolower($judul));
		$link = strtotime(date('Y-m-d H:i:s')).'-'.$judul;
		return $link;
	}

	// detail galeri
	public function detailbyid($id){
		$query = $this->db->get_where('profil',array('id'  => $id));
		return $query->row();
	}
	// Edit 
	public function edit ($data) {
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->CI->session->userdata('id');
		if (!in_array($data['id'], array("1", "2", "3", "4"))) {
			$data['link'] = $this->formatLink($data['kategori']);
		}
		$this->db->where('id', $data['id']);
		$this->db->update('profil', $data);
		return true;
	}
	
	// Delete
	public function delete ($id){
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->CI->session->userdata('id');
		$data['is_delete'] = '1';

		$this->db->where('id', $id);
		$this->db->update('profil', $data);
		return true;
	}

	//Listing
	public function listingWeb($jenis) {
		$this->db->select('profil.*');
		$this->db->from('profil');
		// where
		$where = array(
				'profil.is_delete =' => 0,
				'profil.is_active =' => 1
			);

		if ($jenis == "profil") {
			$this->db->where_in('id', ['1','2','3','4']);
		}

		if ($jenis == "anggota") {
			$this->db->where_not_in('id', ['1','2','3','4']);
		}
		// where
		$this->db->where($where);

		//order
		$this->db->order_by('profil.id','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	// Edit 
	public function update_view ($data) {
		$this->db->where('id', $data['id']);
		$this->db->update('profil', $data);
	}

}