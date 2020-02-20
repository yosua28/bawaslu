<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->CI =& get_instance();
		$this->load->model('konten_model');
		$this->load->model('kategori_model');
	}

	public function kategori($kategori)
	{
		$is_valid = $this->kategori_model->detail($kategori);
		if($is_valid != null) {
			$konten = $this->konten_model->listing($kategori, 0);
			$data = array(
				'data_kategori' => $is_valid,
				'kategori' => $kategori,
				'konten' => $konten,
				'view' => 'admin/konten/index'
			);
			$this->load->view($this->config->item('admin_layout'), $data); 
		}
	}

	public function add($kategori)
	{
		$is_valid = $this->kategori_model->detail($kategori);
		if($is_valid != null) {
			// Validasi
			$valid = array(
				'judul' => '',
				'file_pendukung' => '',
				'foto_thumbnail' => ''
			);
			//Data
			$data_konten = array(
				'id_kategori' => $is_valid->id,
				'judul' => '',
				'isi_konten' => '',
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
					'id_kategori' => $is_valid->id,
					'judul' => $post->post('judul'),
					'isi_konten' => $post->post('isi_konten'),
					'is_active' => $post->post('is_active'),
				);

				if(empty($valid['judul']) && empty($valid['kategori']) && empty($valid['file_pendukung']) && empty($valid['foto_thumbnail'])) {
					if(!empty($_FILES['file_pendukung']['name'])) {
						$target_file = '/assets/uploads/file_pendukung/'.strtotime(date('Y-m-d H:i:s')).'_'.$_FILES['file_pendukung']['name'];
						move_uploaded_file( $_FILES['file_pendukung']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_file);
						$data_konten['file_pendukung'] = $target_file;
					}
					if(!empty($_FILES['foto_thumbnail']['name'])) {
						$target_foto_thumbnail = '/assets/uploads/foto_thumbnail/'.strtotime(date('Y-m-d H:i:s')).'_'.$_FILES['foto_thumbnail']['name'];
						move_uploaded_file( $_FILES['foto_thumbnail']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_foto_thumbnail);
						$data_konten['foto_thumbnail'] = $target_foto_thumbnail;
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
				'id' => "",
				'list_kategori' => $this->kategori_model->listing(),
				'action' => "Tambah",
				'valid' => $valid,
				'data' => $data_konten,
				'view' => 'admin/konten/form'
			);
			$this->load->view($this->config->item('admin_layout'), $data); 
		}
	}

	public function edit($kategori, $id)
	{
		$detail = $this->konten_model->detail($id);
		if($detail != null) {
			$is_valid = $this->kategori_model->detail($kategori);
			if($is_valid != null) {
				// Validasi
				$valid = array(
					'judul' => '',
					'file_pendukung' => '',
					'foto_thumbnail' => ''
				);
				//Data
				$data_konten = array(
					'id_kategori' => $is_valid->id,
					'judul' => $detail->judul,
					'isi_konten' => $detail->isi_konten,
					'is_active' => $detail->is_active,
					'foto_thumbnail' => $detail->foto_thumbnail,
					'file_pendukung' => $detail->file_pendukung
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
						'id' => $id,
						'id_kategori' => $is_valid->id,
						'judul' => $post->post('judul'),
						'isi_konten' => $post->post('isi_konten'),
						'is_active' => $post->post('is_active'),
					);

					if(empty($valid['judul']) && empty($valid['kategori']) && empty($valid['file_pendukung']) && empty($valid['foto_thumbnail'])) {
						if(!empty($_FILES['file_pendukung']['name'])) {
							$target_file = '/assets/uploads/file_pendukung/'.strtotime(date('Y-m-d H:i:s')).'_'.$_FILES['file_pendukung']['name'];
							move_uploaded_file( $_FILES['file_pendukung']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_file);
							$data_konten['file_pendukung'] = $target_file;
						}
						if(!empty($_FILES['foto_thumbnail']['name'])) {
							$target_foto_thumbnail = '/assets/uploads/foto_thumbnail/'.strtotime(date('Y-m-d H:i:s')).'_'.$_FILES['foto_thumbnail']['name'];
							move_uploaded_file( $_FILES['foto_thumbnail']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_foto_thumbnail);
							$data_konten['foto_thumbnail'] = $target_foto_thumbnail;
						}
						$save = $this->konten_model->edit($data_konten);
						if($save) {
							redirect(base_url().'admin/konten/kategori/'.$kategori);
						}
					}
				}

				// $konten = $this->konten_model->listing($kategori);
				$data = array(
					'data_kategori' => $is_valid,
					'kategori' => $kategori,
					'id' => $id,
					'list_kategori' => $this->kategori_model->listing(),
					'action' => "Update",
					'valid' => $valid,
					'data' => $data_konten,
					'view' => 'admin/konten/form'
				);
				$this->load->view($this->config->item('admin_layout'), $data); 
			}
		}
	}

	public function delete($id, $kategori) {
		$delete = $this->konten_model->delete($id);
		if($delete) {
			redirect(base_url().'admin/konten/kategori/'.$kategori);
		}
	}
}
