<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing($kategori) {
		$this->db->select('konten.*, konten.created_date as tgl_pembuatan,  konten.is_active as status,
			kategori.kategori, kategori.is_upload, 
			user.*');
		$this->db->from('konten');
		// Join
		$this->db->join('kategori','kategori.id = konten.id_kategori', 'LEFT');
		$this->db->join('user','user.id = konten.created_by','LEFT');
		// where
		$this->db->where(
			array(
				'kategori.kategori =' => $kategori,
				'konten.is_delete =' => 0
			)
		);
		//order
		$this->db->order_by('konten.id','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Tambah
	public function simpan ($data) {
		$data['created_date'] = date('Y-m-d H:i:s');
		$data['created_by'] = '1';
		$data['link'] = $this->formatLink($data['judul']);

		// var_dump($data);exit;

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
		var_dump("expression");exit;

		$this->db->where('id', $id);
		$this->db->update('konten', $data);
	}

	public function formatLink($judul) {
		$judul = preg_replace('/[^a-zA-Z0-9_ -]/s','',$judul);
		$judul = str_replace(' ', '-', strtolower($judul));
		$link = strtotime(date('Y-m-d H:i:s')).'-'.$judul;
		return $link;
	}
}