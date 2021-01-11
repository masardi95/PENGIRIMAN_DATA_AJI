<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panduan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->helper(array('form','url'));
	    $this->load->library('form_validation');
	    $this->load->model('TransaksiModel');
	    if(empty($this->session->userdata('authenticated'))) {
	      redirect('auth/logout');
	    }
	}

	public function index()
	{
		$data = array(
			'title'					=> 'Panduan',
			'dataUser'				=> $this->session->userdata(),
		);

		// echo json_encode($data);
		if (!$this->session->userdata('isVendor')){
			$this->load->view('admin/panduan/panduan', $data);
		}else{
			$this->load->view('vendor/panduan/panduan', $data);			
		}
	}

}

/* End of file Panduan.php */
/* Location: ./application/controllers/Panduan.php */