<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->helper(array('form','url'));
	    $this->load->library('form_validation');
	    $this->load->model('Kantor_Model');
	    $this->load->model('Mgtvendor_Model');
	    if(empty($this->session->userdata('authenticated')) || ($this->session->userdata('isVendor'))) {
	      redirect('auth/logout');
	    }
	}

	public function index()
	{
		$kantor = $this->Kantor_Model->getKantorDetail();
		$data = array(
			'title'					=> 'Kantor',
			'dataUser'				=> $this->session->userdata(),
			'dataKantor'			=> $kantor,
		);

		// echo json_encode($data);
		$this->load->view('admin/kantor/kantor', $data);
	}

	public function dokantor()
	{
		$config['upload_path'] 		= './assets/image/logo/';
		$config['allowed_types'] 	= 'gif|jpg|jpeg|png';
		$config['max_size']  		= '1024';
		$config['file_name']		= substr(rand(), 0,7);
		$cek = $this->load->library('upload', $config);
		$error = array();
		

		$isi = array(
			// 'id_kantor' 		=> $this->input->post('idKantor'), 
			'nama_kantor' 		=> $this->input->post('namaKantor'), 
			'email_kantor' 		=> $this->input->post('emailKantor'), 
			'alamat_kantor' 	=> $this->input->post('alamatKantor')
		);

		// cek keberadaan logo
		if ($_FILES['logo']['name']!=null) {
			if ( ! $this->upload->do_upload('logo')){
				$data = 'Foto => '.$this->upload->display_errors();
			}
			else{
				$isi['logo'] = $this->upload->data('file_name');
			}
		}

		if ($this->Kantor_Model->updateKantor($this->input->post('idKantor'), $isi)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil update Kantor', 
			);
			redirect('kantor');
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal update Kantor', 
			);
		}
		
		echo json_encode($isi);
	}


	/******************************************** MGT USER *****************************************/
	public function user()
	{
		$data = array(
			'title'					=> 'User Kantor',
			'dataUser'				=> $this->session->userdata(),
		);

		// echo json_encode($data);
		$this->load->view('admin/kantor/user', $data);
	}

	public function fetchUserAktif()
	{
		$data = array(
			'userKantor' => $this->Kantor_Model->fetchUserAktif()
		);
		// echo json_encode($data);
		$this->load->view('admin/kantor/ajax_user_kantor', $data);
	}

	public function fetchUserKantorById($id)
	{
		echo json_encode($this->Kantor_Model->getUserKantorById($id));
	}

	public function onOffUserKantor($status, $idUser)
	{
		$isi = array(
			'deleted' => $status, 
		);

		if ($this->Kantor_Model->onOff($idUser, $isi)) {
			$data = array(
				'result' 	=> true, 
				'message' 	=> 'Berhasil Eksekusi', 
			);
		}else{
			$data = array(
				'result' 	=> false, 
				'message' 	=> 'Gagal Eksekusi', 
			);
		}
		echo json_encode($data);
	}

	public function doUserKantor()
	{
		$idUser = $this->input->post('idUser');

		$isi = array(
			'nama_user_kantor'	=> $this->input->post('nama'),
			'alamat'			=> $this->input->post('alamat'), 
			'id_kantor'			=> 1, 
		);

		$id = $this->input->post('idUser');

		if (!empty($this->input->post('levelKantor'))) {
			$isi['level_kantor'] = 2;
		}

		if (empty($id)) {
			$usernameDb = $this->Kantor_Model->cekUsername($this->input->post('username'));
			if (empty($usernameDb)) {
				$isi['username'] = $this->input->post('username');
				$isi['password'] = md5($this->input->post('pass'));
				if ($this->Kantor_Model->isiUserKantor($isi)) {
					$data = array(
						'result' 	=> true, 
						'message' 	=> 'Berhasil Add User', 
						's'	=> $isi
					);
				}else{
					$data = array(
						'result' 	=> false, 
						'message' 	=> 'Gagal Add', 
					);
				}
			}else{
				$data = array(
					'result' 	=> false, 
					'message' 	=> 'Username Sudah dipakai', 
				);
			}
		}else{
			if ($this->Kantor_Model->updateUserKantor($idUser, $isi)) {
				$data = array(
					'result' 	=> true, 
					'message' 	=> 'Berhasil Update User', 
				);
			}else{
				$data = array(
					'result' 	=> false, 
					'message' 	=> 'Gagal Update User', 
				);
			}
		}
		echo json_encode($data);
	}

}

/* End of file Kantor.php */
/* Location: ./application/controllers/Kantor.php */