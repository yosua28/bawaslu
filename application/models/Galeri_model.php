<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Galeri_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing($all, $filter, $limit = "", $pagination = "") {
		$this->db->select('galeri.*');
		$this->db->from('galeri');
		// where
		$where = array(
				'galeri.is_delete =' => 0
			);
		if($all == 0) {
			if($this->CI->session->userdata('role') != 'superadmin') {
				$where['galeri.created_by'] = $this->CI->session->userdata('id');
			}
		}
		if ($filter != "") {
			$this->db->like('galeri.judul', $filter);
			$this->db->or_like('galeri.keterangan_foto', $filter);
		}
		// where
		$this->db->where($where);
			// var_dump($limit, $pagination);exit;

		if ($limit != 0) {
			$this->db->limit($limit, $limit*$pagination);
		}

		//order
		$this->db->order_by('galeri.id','DESC');
		$query = $this->db->get();
		// var_dump($this->db->last_query());exit;
		return $query->result();
	}

	//Count
	public function countDataAll() {
		$where = array(
				'galeri.is_delete =' => 0
			);
		$this->db->where($where);
		$this->db->from('galeri');
		return $this->db->count_all_results(); 
	}


	// Tambah
	public function simpan ($data) {
		$data['created_date'] = date('Y-m-d H:i:s');
		$data['created_by'] = $this->CI->session->userdata('id');
		$data['link'] = $this->formatLink($data['judul']);

		$this->db->insert('galeri', $data);
		return $this->db->insert_id();
	}

	// detail galeri
	public function detail($id){
		$query = $this->db->get_where('galeri',array('id'  => $id));
		return $query->row();
	}

	// detail perberita
	public function detail_link($link){
		$this->db->select('galeri.*');
		$this->db->from('galeri');
		$where = array(
				'galeri.link =' => $link,
				'galeri.is_delete =' => 0,
				'galeri.is_active =' => 1,
			);
		// where
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row();
	}
	
	
	// Edit 
	public function edit ($data) {
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->CI->session->userdata('id');

		$this->db->where('id', $data['id']);
		$this->db->update('galeri', $data);
		return true;
	}

	// Edit 
	public function update_view ($data) {
		$this->db->where('id', $data['id']);
		$this->db->update('galeri', $data);
	}
	
	// Delete
	public function delete ($id){
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->CI->session->userdata('id');
		$data['is_delete'] = '1';

		$this->db->where('id', $id);
		$this->db->update('galeri', $data);
		return true;
	}

	public function formatLink($judul) {
		$judul = preg_replace('/[^a-zA-Z0-9_ -]/s','',$judul);
		$judul = str_replace(' ', '-', strtolower($judul));
		$link = strtotime(date('Y-m-d H:i:s')).'-'.$judul;
		return $link;
	}

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