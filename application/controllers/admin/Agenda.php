<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->CI =& get_instance();
		$this->load->model('agenda_model');
	}

	public function index()
	{
		$list_agenda = $this->agenda_model->listing(0);
		$data = array(
			'list_agenda' => $list_agenda,
			'view' => 'admin/agenda/index'
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}

	public function add()
	{
		// Validasi
		$valid = array(
			'nama_kegiatan' => '',
			'tempat' => '',
			'file_pendukung' => '',
			'waktu_mulai' => '',
			'waktu_selesai' => ''
		);
		//Data
		$data_konten = array(
			'nama_kegiatan' => '',
			'tempat' => '',
			'penjelasan_kegiatan' => '',
			'file_pendukung' => '',
			'waktu_mulai' => '',
			'waktu_selesai' => '',
			'is_active' => ''
		);

		$post = $this->input;
		if($post->post()) {

			if(!empty($_FILES['file_pendukung']['name'])) {
				$allowed_file_pendukung = array(
			        "pdf", "PDF"
			    );
			    $file_extension = pathinfo($_FILES["file_pendukung"]["name"], PATHINFO_EXTENSION);
			    
			    if (!in_array($file_extension, $allowed_file_pendukung)) {
			        $valid['file_pendukung'] = "File harus berformat (PDF)";
			    } else if ($_FILES["file_pendukung"]["size"] > 5000000) {
			        $valid['file_pendukung'] = "FIle tidak boleh lebih dari 5MB";
			    }
			}

			if(!empty($_FILES['foto_thumbnail']['name'])) {
				$allowed_foto_thumbnail = array(
			        "jpg", "JPG", "png", "PNG", "jpeg", "JPEG"
			    );
			    $file_extension = pathinfo($_FILES["foto_thumbnail"]["name"], PATHINFO_EXTENSION);
			    
			    if (!in_array($file_extension, $allowed_foto_thumbnail)) {
			        $valid['foto_thumbnail'] = "File harus berformat (JPG/PNG/JPEG)";
			    } else if ($_FILES["foto_thumbnail"]["size"] > 2000000) {
			        $valid['foto_thumbnail'] = "FIle tidak boleh lebih dari 2MB";
			    }
			}


			if(empty($post->post('judul'))){
				$valid['judul'] = 'Judul tidak boleh kosong';
			}

			$data_konten = array(
				'nama_kegiatan' => $post->post('nama_kegiatan'),
				'tempat' => $post->post('tempat'),
				'penjelasan_kegiatan' => $post->post('penjelasan_kegiatan'),
				'waktu_mulai' => $post->post('waktu_mulai'),
				'waktu_selesai' => $post->post('waktu_selesai'),
				'is_active' => $post->post('is_active')
			);

			if(empty($valid['nama_kegiatan']) && empty($valid['tempat']) && empty($valid['waktu_mulai']) && empty($valid['waktu_selesai']) && empty($valid['file_pendukung'])) {
				if(!empty($_FILES['file_pendukung']['name'])) {
					$target_file = '/assets/uploads/file_pendukung/'.strtotime(date('Y-m-d H:i:s')).'_'.$_FILES['file_pendukung']['name'];
					move_uploaded_file( $_FILES['file_pendukung']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_file);
					$data_konten['file_pendukung'] = $target_file;
				}
				$save = $this->konten_model->simpan($data_konten);
				if($save) {
					redirect(base_url().'admin/konten/kategori/'.$kategori);
				}
			}
		}

		// $konten = $this->konten_model->listing($kategori);
		$data = array(
			'data_kategori' => $is_valid,
			'kategori' => $kategori,
			'list_kategori' => $this->kategori_model->listing(),
			// 'konten' => $konten,
			'valid' => $valid,
			'data' => $data_konten,
			'view' => 'admin/konten/form'
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}

}
