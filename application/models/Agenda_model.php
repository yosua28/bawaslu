<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing($all = 1) {
		$this->db->select('agenda.*, agenda.id as id_agenda, agenda.is_active as status, user.*');
		$this->db->from('agenda');
		// Join
		$this->db->join('user','user.id = agenda.created_by','LEFT');
		// where
		$where = array(
				// 'agenda.waktu_selesai >=' => date('Y-m-d H:i:s'),
				'agenda.is_delete =' => 0
			);
		if($all == 0) {
			if($this->CI->session->userdata('role') != 'superadmin') {
				$where['agenda.created_by'] = $this->CI->session->userdata('id');
			}
		}
		// where
		$this->db->where($where);
		//order
		$this->db->order_by('agenda.waktu_mulai', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// detail perberita
	public function detail($id){
		$query = $this->db->get_where('agenda',array('id'  => $id));
		return $query->row();
	}

	public function simpan ($data) {
		$data['created_date'] = date('Y-m-d H:i:s');
		$data['created_by'] = $this->CI->session->userdata('id');
		$data['link'] = $this->formatLink($data['judul']);

		return $this->db->insert('agenda',$data);
	}

	// Delete
	public function delete ($id){
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->CI->session->userdata('id');
		$data['is_delete'] = '1';

		$this->db->where('id', $id);
		$this->db->update('agenda', $data);
		return true;
	}

	public function formatLink($judul) {
		$judul = preg_replace('/[^a-zA-Z0-9_ -]/s','',$judul);
		$judul = str_replace(' ', '-', strtolower($judul));
		$link = strtotime(date('Y-m-d H:i:s')).'-'.$judul;
		return $link;
	}

	// Edit 
	public function update_view ($data) {
		$this->db->where('id', $data['id']);
		$this->db->update('agenda', $data);
	}

	// Edit 
	public function edit ($data) {
		$data['updated_date'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->CI->session->userdata('id');

		$this->db->where('id', $data['id']);
		$this->db->update('agenda', $data);
		return true;
	}

	
}