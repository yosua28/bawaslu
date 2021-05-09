<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Galerifoto_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing($galeri_id) {
		$this->db->select('galeri_foto.*');
		$this->db->from('galeri_foto');
		// where
		$where = array(
				'galeri_foto.is_delete =' => 0,
				'galeri_foto.id_galeri =' => $galeri_id
			);
		// where
		$this->db->where($where);
		//order
		$this->db->order_by('galeri_foto.id','ASC');
		$query = $this->db->get();
		return $query->result();
	}


	// Tambah
	public function simpan ($data) {
		$data['created_date'] = date('Y-m-d H:i:s');
		$data['created_by'] = $this->CI->session->userdata('id');

		return $this->db->insert('galeri_foto', $data);
	}

	// Edit 
	public function edit ($data) {
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->CI->session->userdata('id');

		$this->db->where('id', $data['id']);
		$this->db->update('galeri_foto', $data);
		return true;
	}

	// // detail perberita
	// public function detail($id){
	// 	$query = $this->db->get_where('konten',array('id'  => $id));
	// 	return $query->row();
	// }

	// // detail perberita
	// public function detail_link($link){
	// 	$this->db->select('konten.*, konten.id as id_konten, konten.created_date as tgl_pembuatan,  konten.is_active as status,
	// 		kategori.kategori, kategori.is_upload, 
	// 		user.nama as pembuat');
	// 	$this->db->from('konten');
	// 	// Join
	// 	$this->db->join('kategori','kategori.id = konten.id_kategori', 'LEFT');
	// 	$this->db->join('user','user.id = konten.created_by','LEFT');
	// 	$where = array(
	// 			'konten.link =' => $link,
	// 			'konten.is_delete =' => 0,
	// 			'konten.is_active =' => 1,
	// 		);
	// 	// where
	// 	$this->db->where($where);
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
	
	
	// Edit 
	// public function edit ($data) {
	// 	$data['updated_date'] = date('Y-m-d H:i:s');
	// 	$data['updated_by'] = $this->CI->session->userdata('id');

	// 	$this->db->where('id', $data['id']);
	// 	$this->db->update('konten', $data);
	// 	return true;
	// }

	// // Edit 
	// public function update_view ($data) {
	// 	$this->db->where('id', $data['id']);
	// 	$this->db->update('konten', $data);
	// }
	
	// // Delete
	// public function delete ($id){
	// 	$data['updated_date'] = date('Y-m-d H:i:s');
	// 	$data['updated_by'] = $this->CI->session->userdata('id');
	// 	$data['is_delete'] = '1';

	// 	$this->db->where('id', $id);
	// 	$this->db->update('konten', $data);
	// 	return true;
	// }

	// public function formatLink($judul) {
	// 	$judul = preg_replace('/[^a-zA-Z0-9_ -]/s','',$judul);
	// 	$judul = str_replace(' ', '-', strtolower($judul));
	// 	$link = strtotime(date('Y-m-d H:i:s')).'-'.$judul;
	// 	return $link;
	// }

	// //Listing
	// public function listingBerita($is_pengumuman) {
	// 	$this->db->select('konten.*, konten.id as id_konten, konten.created_date as tgl_pembuatan,  konten.is_active as status,
	// 		kategori.kategori, kategori.is_upload, 
	// 		user.*');
	// 	$this->db->from('konten');
	// 	// Join
	// 	$this->db->join('kategori','kategori.id = konten.id_kategori', 'LEFT');
	// 	$this->db->join('user','user.id = konten.created_by','LEFT');
	// 	// where
	// 	if($is_pengumuman == 1) {
	// 		$where = array(
	// 				'kategori.kategori =' => 'pengumuman',
	// 				'konten.is_active =' => '1',
	// 				'konten.is_delete =' => 0
	// 			);
	// 	} else if($is_pengumuman == 2) {
	// 		$where = array(
	// 				'kategori.kategori !=' => 'pengumuman',
	// 				'kategori.kategori !=' => 'berita-utama',
	// 				'konten.is_active =' => '1',
	// 				'konten.is_delete =' => 0
	// 			);
	// 	} else {
	// 		$where = array(
	// 				'kategori.kategori =' => 'berita-utama',
	// 				'konten.is_active =' => '1',
	// 				'konten.is_delete =' => 0
	// 			);
	// 		$this->db->limit(5);
	// 	}
	// 	// where
	// 	$this->db->where($where);
	// 	//order
	// 	$this->db->order_by('konten.id','DESC');
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }
}