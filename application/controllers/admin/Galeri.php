<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->CI =& get_instance();
		$this->load->model('galeri_model');
		$this->load->model('galerifoto_model');
	}

	public function foto()
	{
		$konten = $this->galeri_model->listing(0, "");
		$data = array(
			'konten' => $konten,
			'view' => 'admin/galeri/foto'
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}

	public function add()
	{
		// Validasi
		$valid = array(
			'judul' => '',
			'foto' => '',
			'keterangan_foto' => '',
			'foto1' => '',
			'foto2' => '',
			'foto3' => '',
			'foto4' => '',
			'foto5' => '',
			'foto6' => '',
			'foto7' => '',
			'foto8' => '',
			'foto9' => '',
			'foto10' => ''
		);
		//Data
		$data_konten = array(
			'judul' => '',
			'keterangan_foto' => '',
			'is_active' => ''
		);

		$post = $this->input;
		if($post->post()) {

			$error = 0;
		$foto = array();

			if(empty($post->post('judul'))){
				$error++;
				$valid['judul'] = 'Judul tidak boleh kosong';
			}
			$allowed_image = array(
		        "jpg", "JPG", "png", "PNG", "jpeg", "JPEG"
		    );

			if(!empty($_FILES['foto']['name'])) {
			    $file_extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
			    
			    if (!in_array($file_extension, $allowed_image)) {
					$error++;
			        $valid['foto'] = "File harus berformat (JPG/PNG/JPEG)";
			    } else if ($_FILES["foto"]["size"] > 2000000) {
					$error++;
			        $valid['foto'] = "File tidak boleh lebih dari 2MB";
			    }
			} else {
				$error++;
		        $valid['foto'] = "Thumnail tidak boleh kosong";
			}

			if(empty($post->post('keterangan_foto'))){
				$error++;
				$valid['keterangan_foto'] = 'Konten tidak boleh kosong';
			}


            for ($x = 1; $x <= 10; $x++) {
            	if(!empty($_FILES['foto'.$x]['name'])) {
				    $file_extension = pathinfo($_FILES["foto".$x]["name"], PATHINFO_EXTENSION);
				    
				    if (!in_array($file_extension, $allowed_image)) {
						$error++;
				        $valid['foto'.$x] = "File harus berformat (JPG/PNG/JPEG)";
				    } else if ($_FILES["foto1"]["size"] > 2000000) {
						$error++;
				        $valid['foto'.$x] = "File tidak boleh lebih dari 2MB";
				    } else {
						array_push($foto, array('field' => 'foto'.$x, 'name' => $_FILES["foto".$x]["name"]));
				    }
				} 
            }

			$data_konten = array(
				'judul' => $post->post('judul'),
				'keterangan_foto' => $post->post('keterangan_foto'),
				'is_delete' => '0',
				'is_active' => $post->post('is_active')
			);

			if($error == 0) {
				if(!empty($_FILES['foto']['name'])) {
					$target_file = '/assets/uploads/galeri/'.strtotime(date('Y-m-d H:i:s')).'_'.rand().'_'.$_FILES['foto']['name'];
					move_uploaded_file( $_FILES['foto']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_file);
					$data_konten['foto'] = $target_file;
				}
				$save_id = $this->galeri_model->simpan($data_konten);
				if($save_id != null && $save_id != "") {

					if (count($foto) > 0) {
							// var_dump($foto);exit;
						foreach($foto as $x => $val) {
							$target_file = '/assets/uploads/galeri/'.strtotime(date('Y-m-d H:i:s')).'_'.rand().'_'.$_FILES[$val['field']]['name'];
							move_uploaded_file( $_FILES[$val['field']]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_file);
							$galeri_foto['id_galeri'] = $save_id;
							$galeri_foto['foto'] = $target_file;
							$galeri_foto['is_delete'] = '0';
							$galeri_foto['is_active'] = '1';
							$this->galerifoto_model->simpan($galeri_foto);
						}
					}
					redirect(base_url().'admin/galeri/foto');
				}
			}
		}

		$data = array(
			'id' => "",
			'action' => "Tambah",
			'valid' => $valid,
			'data' => $data_konten,
			'view' => 'admin/galeri/form'
		);
		$this->load->view($this->config->item('admin_layout'), $data); 
	}

	public function edit($id)
	{
		$detail = $this->galeri_model->detail($id);
		if($detail != null) {
			// Validasi
			$valid = array(
				'judul' => '',
				'foto' => '',
				'keterangan_foto' => '',
				'foto1' => '',
				'foto2' => '',
				'foto3' => '',
				'foto4' => '',
				'foto5' => '',
				'foto6' => '',
				'foto7' => '',
				'foto8' => '',
				'foto9' => '',
				'foto10' => ''
			);
			//Data
			$data_konten = array(
				'judul' => $detail->judul,
				'keterangan_foto' => $detail->keterangan_foto,
				'foto' => $detail->foto,
				'is_active' => $detail->is_active
			);
			$fotoList = $this->galerifoto_model->listing($id);
			if(count($fotoList) > 0) {
				foreach($fotoList as $x => $val) {
					$data_konten['foto'.($x+1)] = $val->foto;
					$data_konten['id_foto'.($x+1)] = $val->id;
				}			
			}

			$post = $this->input;
			if($post->post()) {
				$error = 0;
				$foto = array();

				if(empty($post->post('judul'))){
					$error++;
					$valid['judul'] = 'Judul tidak boleh kosong';
				}
				$allowed_image = array(
			        "jpg", "JPG", "png", "PNG", "jpeg", "JPEG"
			    );

				if(!empty($_FILES['foto']['name'])) {
				    $file_extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
				    
				    if (!in_array($file_extension, $allowed_image)) {
						$error++;
				        $valid['foto'] = "File harus berformat (JPG/PNG/JPEG)";
				    } else if ($_FILES["foto"]["size"] > 2000000) {
						$error++;
				        $valid['foto'] = "File tidak boleh lebih dari 2MB";
				    }
				}

				if(empty($post->post('keterangan_foto'))){
					$error++;
					$valid['keterangan_foto'] = 'Konten tidak boleh kosong';
				}

	            for ($x = 1; $x <= 10; $x++) {
	            	$field = "";
	            	$name = "";
	            	$id_foto = "";
	            	if(!empty($_FILES['foto'.$x]['name'])) {
					    $file_extension = pathinfo($_FILES["foto".$x]["name"], PATHINFO_EXTENSION);
					    
					    if (!in_array($file_extension, $allowed_image)) {
							$error++;
					        $valid['foto'.$x] = "File harus berformat (JPG/PNG/JPEG)";
					    } else if ($_FILES["foto1"]["size"] > 2000000) {
							$error++;
					        $valid['foto'.$x] = "File tidak boleh lebih dari 2MB";
					    } else {
			            	$field = 'foto'.$x;
			            	$name = $_FILES["foto".$x]["name"];
			            	$id_foto = "";
					    }
					} 

					if ($post->post('id_foto'.$x) != null) {
						$id_foto = $post->post('id_foto'.$x);
					}

					array_push($foto, array(
							'field' => $field, 
							'name' => $name,
							'is_delete' => $post->post('delete_foto'.$x),
							'id_foto' => $id_foto
						)
					);
	            }

				$data_konten = array(
					'judul' => $post->post('judul'),
					'keterangan_foto' => $post->post('keterangan_foto'),
					'is_delete' => '0',
					'is_active' => $post->post('is_active')
				);

				if($error == 0) {
					if(!empty($_FILES['foto']['name'])) {
						$target_file = '/assets/uploads/galeri/'.strtotime(date('Y-m-d H:i:s')).'_'.rand().'_'.$_FILES['foto']['name'];
						move_uploaded_file( $_FILES['foto']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_file);
						$data_konten['foto'] = $target_file;
					}
					$data_konten['id'] = $id;
					$update = $this->galeri_model->edit($data_konten);
					if($update != null && $update != "") {

						if (count($foto) > 0) {
							foreach($foto as $x => $val) {
								$galeri_foto = null;
								if ($val['field'] != "") { //ada upload
									if ($val['id_foto'] != "") { //update
										$target_file = '/assets/uploads/galeri/'.strtotime(date('Y-m-d H:i:s')).'_'.rand().'_'.$_FILES[$val['field']]['name'];
										move_uploaded_file( $_FILES[$val['field']]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_file);
										$galeri_foto['foto'] = $target_file;
										$galeri_foto['id'] = $val['id_foto'];
										$this->galerifoto_model->edit($galeri_foto);

									} else { //insert baru
										$target_file = '/assets/uploads/galeri/'.strtotime(date('Y-m-d H:i:s')).'_'.rand().'_'.$_FILES[$val['field']]['name'];
										move_uploaded_file( $_FILES[$val['field']]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target_file);
										$galeri_foto['id_galeri'] = $id;
										$galeri_foto['foto'] = $target_file;
										$galeri_foto['is_delete'] = '0';
										$galeri_foto['is_active'] = '1';
										$this->galerifoto_model->simpan($galeri_foto);
									}
								} else {
									if ($val['id_foto'] != "" && $val['is_delete'] == "1") { //delete
										$galeri_foto['id'] = $val['id_foto'];
										$galeri_foto['is_delete'] = '1';
										$galeri_foto['is_active'] = '0';
										$this->galerifoto_model->edit($galeri_foto);
									}
								}
							}
						}
						redirect(base_url().'admin/galeri/foto');
					}
				}
			}

			$data = array(
				'id' => $id,
				'action' => "Update",
				'valid' => $valid,
				'data' => $data_konten,
				'view' => 'admin/galeri/form'
			);
			$this->load->view($this->config->item('admin_layout'), $data); 
		}
	}



	public function delete($id) {
		$delete = $this->galeri_model->delete($id);
		if($delete) {
			redirect(base_url().'admin/galeri/foto');
		}
	}

}
