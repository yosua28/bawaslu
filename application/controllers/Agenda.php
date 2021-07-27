<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->CI =& get_instance();
		$this->load->model('agenda_model');
	}

	public function index()
	{
		$konten = $this->agenda_model->listingWeb();
		$data = array(
			'konten' => $konten,
			'view' => 'agenda/index'
		);
		$this->load->view($this->config->item('front_layout'), $data); 
	}

	public function view($link)
	{
		$detail = $this->agenda_model->detail_link($link);

		if($detail) {
			$update = array(
				'id' => $detail->id,
				'dibaca' => $detail->dibaca+1,
			);
			$update_view = $this->agenda_model->update_view($update);
			$data = array(
				'detail' => $detail,
				'view' => 'agenda/detail'
			);
			$this->load->view($this->config->item('front_layout'), $data); 
		} else {
			redirect(base_url());
		}
	}
}
