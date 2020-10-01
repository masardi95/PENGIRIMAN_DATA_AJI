<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateUniversal extends CI_Controller {

	public function index()
	{		
		parent::__construct();
	    $this->load->helper(array('form','url'));
	    $this->load->library('form_validation');
	    $this->load->model('Kantor_Model');
	    $this->load->model('Mgtvendor_Model');
	}

	public function updateUserKantor()
	{
		$id			= $this->input->post('idUserEdit');
		$password	= $this->input->post('passEdit');

		$isi = array(
			'nama_user_kantor' 		=> $this->input->post('namaEdit'), 
			'alamat' 				=> $this->input->post('alamatEdit'), 
		);

		// if (!empty($password)) {
		// 	$isi['password'] = md5($password);
		// }

		// if () {
		// 	$data = array(
		// 		'result' => true, 
		// 		'message' => 'Berhasil update', 
		// 	);
		// }else{
		// 	$data = array(
		// 		'result' => false, 
		// 		'message' => 'Gagal update', 
		// 	);
		// }
		
		echo json_encode($this->Kantor_Model->updateUserKantor($id, $isi));
	}


	public function updateUserVendor()
	{
		$id	= $this->input->post('idUserEdit');
		$password	= $this->input->post('passEdit');

		$isi = array(
			'nama_user_vendor' 	=> $this->input->post('namaEdit'), 
		);

		if (!empty($password)) {
			$isi['password'] = md5($password);
		}


		// if ($this->Mgtvendor_Model->updateUserVendor($id, $isi)) {
		// 	$data = array(
		// 		'result' => true, 
		// 		'message' => 'Berhasil update', 
		// 	);
		// }else{
		// 	$data = array(
		// 		'result' => false, 
		// 		'message' => 'Gagal update', 
		// 	);
		// }
		

		echo json_encode($id);
	}

}

/* End of file UpdateUniversal.php */
/* Location: ./application/controllers/UpdateUniversal.php */