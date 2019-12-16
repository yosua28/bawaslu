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
				'agenda.waktu_selesai >=' => date('Y-m-d H:i:s'),
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
		$this->db->order_by('agenda.waktu_mulai', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// detail perberita
	public function detail($kategori){
		$query = $this->db->get_where('kategori',array('kategori'  => $kategori));
		return $query->row();
	}

	public function simpan ($data) {
		$data['created_date'] = date('Y-m-d H:i:s');
		$data['created_by'] = $this->CI->session->userdata('id');
		$data['link'] = $this->formatLink($data['judul']);

		return $this->db->insert('agenda',$data);
	}

	
}