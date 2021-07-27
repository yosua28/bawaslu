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
			'penjelasan_kegiatan' => '',
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


			if(empty($post->post('nama_kegiatan'))){
				$valid['nama_kegiatan'] = 'Nama Kegiatan tidak boleh kosong';
			}
			if(empty($post->post('tempat'))){
				$valid['tempat'] = 'Tempat Kegiatan tidak boleh kosong';
			}
			if(empty($post->post('waktu_mulai'))){
				$valid['waktu_mulai'] = 'Waktu Mulai Kegiatan tidak boleh kosong';
			}
			if(empty($post->post('waktu_selesai'))){
				$valid['waktu_selesai'] = 'Waktu Selesai Kegiatan tidak boleh kosong';
			}

			$data_konten = array(
				'nama_kegiatan' => $post->post('nama_kegiatan'),
				'tempat' => $post->post('tempat'),
				'penjelasan_kegiatan' => $post->post('penjelasan_kegiatan'),
				'waktu_mulai' => $post->post('waktu_mulai'),
				'waktu_selesai' => $post->post('waktu_selesai'),
				'is_delete' => 0,
				'dibaca' => 0,
				'is_active' => $post->post('is_active')
			);

			if(empty($valid['nama_kegiatan']) && empty($valid['tempat']) && empty($valid['waktu_mulai']) && empty($valid['waktu_selesai']) && empty($valid['file_pendukung'])) {
				if(!empty($_FILES['file_pendukung']['name'])) {
					$target_file = '/assets/uploads/file_pendukung/'.strtotime(date('Y-m-d H:i:s')).'_'.$_FILES['file_pendukung']['name'];
					move_uploaded_file( $_FILES['file_pendukung']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_file);
					$data_konten['file_pendukung'] = $target_file;
				}
				$mulai = new DateTime($data_konten['waktu_mulai']);
				$selesai = new DateTime($data_konten['waktu_selesai']);

				$data_konten['waktu_mulai'] = $mulai->format('Y-m-d H:i:s');
				$data_konten['waktu_selesai'] = $selesai->format('Y-m-d H:i:s');
				// var_dump($data_konten);exit;
				$save = $this->agenda_model->simpan($data_konten);
				if($save) {
					redirect(base_url().'admin/agenda/index');
				}
			}
		}

		$data = array(
			'action' => 'Tambah Agenda',
			'valid' => $valid,
			'data' => $data_konten,
			'view' => 'admin/agenda/form',
			'id' => ""
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}

	public function edit($id)
	{
		$detail = $this->agenda_model->detail($id);
		if($detail != null) {
			// Validasi
			$valid = array(
				'nama_kegiatan' => '',
				'tempat' => '',
				'penjelasan_kegiatan' => '',
				'file_pendukung' => '',
				'waktu_mulai' => '',
				'waktu_selesai' => ''
			);
			//Data
			$mulai = new DateTime($detail->waktu_mulai);
			$selesai = new DateTime($detail->waktu_selesai);
			$data_konten = array(
				'nama_kegiatan' => $detail->nama_kegiatan,
				'tempat' => $detail->tempat,
				'penjelasan_kegiatan' => $detail->penjelasan_kegiatan,
				'file_pendukung' => $detail->file_pendukung,
				'waktu_mulai' => $mulai->format('d-m-Y H:m'),
				'waktu_selesai' => $selesai->format('d-m-Y H:m'),
				'is_active' => $detail->is_active
			);
			// var_dump($data_konten);exit;

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


				if(empty($post->post('nama_kegiatan'))){
					$valid['nama_kegiatan'] = 'Nama Kegiatan tidak boleh kosong';
				}
				if(empty($post->post('tempat'))){
					$valid['tempat'] = 'Tempat Kegiatan tidak boleh kosong';
				}
				if(empty($post->post('waktu_mulai'))){
					$valid['waktu_mulai'] = 'Waktu Mulai Kegiatan tidak boleh kosong';
				}
				if(empty($post->post('waktu_selesai'))){
					$valid['waktu_selesai'] = 'Waktu Selesai Kegiatan tidak boleh kosong';
				}

				$data_konten = array(
					'id' => $id,
					'nama_kegiatan' => $post->post('nama_kegiatan'),
					'tempat' => $post->post('tempat'),
					'penjelasan_kegiatan' => $post->post('penjelasan_kegiatan'),
					'waktu_mulai' => $post->post('waktu_mulai'),
					'waktu_selesai' => $post->post('waktu_selesai'),
					'is_delete' => 0,
					'is_active' => $post->post('is_active')
				);

				if(empty($valid['nama_kegiatan']) && empty($valid['tempat']) && empty($valid['waktu_mulai']) && empty($valid['waktu_selesai']) && empty($valid['file_pendukung'])) {
					if(!empty($_FILES['file_pendukung']['name'])) {
						$target_file = '/assets/uploads/file_pendukung/'.strtotime(date('Y-m-d H:i:s')).'_'.$_FILES['file_pendukung']['name'];
						move_uploaded_file( $_FILES['file_pendukung']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_file);
						$data_konten['file_pendukung'] = $target_file;
					}
					$mulai = new DateTime($data_konten['waktu_mulai']);
					$selesai = new DateTime($data_konten['waktu_selesai']);

					$data_konten['waktu_mulai'] = $mulai->format('Y-m-d H:i:s');
					$data_konten['waktu_selesai'] = $selesai->format('Y-m-d H:i:s');
					// var_dump($data_konten);exit;
					$save = $this->agenda_model->edit($data_konten);
					if($save) {
						redirect(base_url().'admin/agenda/index');
					}
				}
			}

			$data = array(
				'action' => 'Update Agenda',
				'valid' => $valid,
				'data' => $data_konten,
				'view' => 'admin/agenda/form',
				'id' => $id
			);
			$this->load->view($this->config->item('admin_layout'), $data); 
		}
	}

	public function delete($id) {
		$delete = $this->agenda_model->delete($id);
		if($delete) {
			redirect(base_url().'admin/agenda/index');
		}
	}

}
