<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->CI =& get_instance();
		$this->load->model('profil_model');
	}

	public function index()
	{
		$konten = $this->profil_model->listing("", "", "");
		$data = array(
			'konten' => $konten,
			'view' => 'admin/profil/index'
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}

	public function add()
	{
		// Validasi
		$valid = array(
			'kategori' => '',
			'nama' => '',
			'jabatan' => '',
			'foto' => '',
			'isi' => ''
		);
		//Data
		$data_konten = array(
			'kategori' => '',
			'jabatan' => '',
			'nama' => '',
			'isi' => '',
			'is_active' => ''
		);

		$post = $this->input;
		if($post->post()) {

			$error = 0;
		$foto = array();

			if(empty($post->post('kategori'))){
				$error++;
				$valid['kategori'] = 'Kategori tidak boleh kosong';
			}

			if(empty($post->post('nama'))){
				$error++;
				$valid['nama'] = 'Kategori tidak boleh kosong';
			}

			$allowed_image = array(
		        "jpg", "JPG", "png", "PNG", "jpeg", "JPEG"
		    );

			if(!empty($_FILES['foto']['image'])) {
			    $file_extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
			    
			    if (!in_array($file_extension, $allowed_image)) {
					$error++;
			        $valid['foto'] = "File harus berformat (JPG/PNG/JPEG)";
			    } else if ($_FILES["foto"]["size"] > 2000000) {
					$error++;
			        $valid['foto'] = "File tidak boleh lebih dari 2MB";
			    }
			}

			if(empty($post->post('isi'))){
				$error++;
				$valid['isi'] = 'Konten tidak boleh kosong';
			}

			$data_konten = array(
				'kategori' => $post->post('kategori'),
				'nama' => $post->post('nama'),
				'isi' => $post->post('isi'),
				'dibaca' => '0',
				'is_delete' => '0',
				'is_active' => $post->post('is_active')
			);

			if (!empty($post->post('jabatan'))) {
				$data_konten['jabatan'] = $post->post('jabatan');
			}

			if($error == 0) {
				if(!empty($_FILES['foto']['name'])) {
					$target_file = '/assets/uploads/profile/'.strtotime(date('Y-m-d H:i:s')).'_'.rand().'_'.$_FILES['foto']['name'];
					move_uploaded_file( $_FILES['foto']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_file);
					$data_konten['foto'] = $target_file;
				}
				$save_id = $this->profil_model->simpan($data_konten);
				if($save_id != null && $save_id != "") {
					redirect(base_url().'admin/profil/index');
				}
			}
		}

		$data = array(
			'id' => "",
			'action' => "Tambah",
			'valid' => $valid,
			'data' => $data_konten,
			'view' => 'admin/profil/form'
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}

	public function edit($id)
	{
		$detail = $this->profil_model->detailbyid($id);
		if($detail != null) {
			// Validasi
			$valid = array(
				'kategori' => '',
				'jabatan' => '',
				'nama' => '',
				'foto' => '',
				'isi' => ''
			);
			//Data
			$data_konten = array(
				'kategori' => $detail->kategori,
				'nama' => $detail->nama,
				'jabatan' => $detail->jabatan,
				'foto' => $detail->foto,
				'isi' => $detail->isi,
				'is_active' => $detail->is_active
			);

			$post = $this->input;
			if($post->post()) {

				$error = 0;
			$foto = array();

				if(empty($post->post('kategori'))){
					$error++;
					$valid['kategori'] = 'Kategori tidak boleh kosong';
				}

				if(empty($post->post('nama'))){
					$error++;
					$valid['nama'] = 'Kategori tidak boleh kosong';
				}
				$allowed_image = array(
			        "jpg", "JPG", "png", "PNG", "jpeg", "JPEG"
			    );

				if(!empty($_FILES['foto']['image'])) {
				    $file_extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
				    
				    if (!in_array($file_extension, $allowed_image)) {
						$error++;
				        $valid['foto'] = "File harus berformat (JPG/PNG/JPEG)";
				    } else if ($_FILES["foto"]["size"] > 2000000) {
						$error++;
				        $valid['foto'] = "File tidak boleh lebih dari 2MB";
				    }
				}

				if(empty($post->post('isi'))){
					$error++;
					$valid['isi'] = 'Konten tidak boleh kosong';
				}

				$data_konten = array(
					'kategori' => $post->post('kategori'),
					'nama' => $post->post('nama'),
					'isi' => $post->post('isi'),
					'is_delete' => '0',
					'is_active' => $post->post('is_active')
				);

				if (!empty($post->post('jabatan'))) {
					$data_konten['jabatan'] = $post->post('jabatan');
				}

				if($error == 0) {
					if(!empty($_FILES['foto']['name'])) {
						$target_file = '/assets/uploads/profile/'.strtotime(date('Y-m-d H:i:s')).'_'.rand().'_'.$_FILES['foto']['name'];
						move_uploaded_file( $_FILES['foto']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_file);
						$data_konten['foto'] = $target_file;
					}
					$data_konten['id'] = $id;
					$update = $this->profil_model->edit($data_konten);
					if($update != null && $update != "") {
						redirect(base_url().'admin/profil/index');
					}
				}
			}

			$data = array(
				'id' => $id,
				'action' => "Update",
				'valid' => $valid,
				'data' => $data_konten,
				'view' => 'admin/profil/form'
			);
			$this->load->view($this->config->item('admin_layout'), $data); 
		}
	}

	public function delete($id) {
		if (!in_array($id, array("1", "2", "3", "4"))) {
			$delete = $this->profil_model->delete($id);
			if($delete) {
				redirect(base_url().'admin/profil/index');
			}
		}
	}

}
