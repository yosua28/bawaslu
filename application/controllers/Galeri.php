<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->CI =& get_instance();
		$this->load->model('galeri_model');
		$this->load->model('video_model');
		$this->load->model('galerifoto_model');
	}

	public function foto($page = "")
	{
		$limit = 15;
		$pagination = 1;

		if($page == "") {
			$pagination = 1;
		} else {
			if(is_numeric($page)) {
				$pagination = $page;
			} else {
				$pagination = 1;
			}
		}

		$count = $this->galeri_model->countDataAll();

		if (($limit * ($pagination-1)) > $count) {
			$pagination = 1;
		}

		$first_page = 1;
		$last_page = 1;

		if($count > 0 ) {
			$last_page = ceil($count / $limit);
		}


		$konten = $this->galeri_model->listing(0, "", $limit, ($pagination-1));
		$data = array(
			'konten' => $konten,
			'first_page' => $first_page,
			'last_page' => $last_page,
			'page' => $pagination,
			'view' => 'galeri/foto'
		);

		$this->load->view($this->config->item('front_layout'), $data); 
	}

	public function view($link)
	{
		$detail = $this->galeri_model->detail_link($link);

		if($detail) {
			$update = array(
				'id' => $detail->id,
				'dibaca' => $detail->dibaca+1,
			);
			$update_view = $this->galeri_model->update_view($update);
			$fotoList = $this->galerifoto_model->listing($detail->id);
			$data = array(
				'detail' => $detail,
				'view' => 'galeri/foto_detail',
				'fotolist' => $fotoList
			);
			$this->load->view($this->config->item('front_layout'), $data); 
		} else {
			redirect(base_url());
		}
	}

	public function video($page = "")
	{
		$limit = 15;
		$pagination = 1;

		if($page == "") {
			$pagination = 1;
		} else {
			if(is_numeric($page)) {
				$pagination = $page;
			} else {
				$pagination = 1;
			}
		}

		$count = $this->video_model->countDataAll();

		if (($limit * ($pagination-1)) > $count) {
			$pagination = 1;
		}

		$first_page = 1;
		$last_page = 1;

		if($count > 0 ) {
			$last_page = ceil($count / $limit);
		}


		$konten = $this->video_model->listing("", $limit, ($pagination-1));
		$data = array(
			'konten' => $konten,
			'first_page' => $first_page,
			'last_page' => $last_page,
			'page' => $pagination,
			'view' => 'galeri/video'
		);

		// var_dump($konten);exit;
		$this->load->view($this->config->item('front_layout'), $data); 
	}


}
