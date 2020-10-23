<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('LoginModel');
    $this->load->helper(array('form','url'));
    $this->load->library('form_validation');
  }

  // awalan tampilan login 
  public function index()
  {
    if(empty($this->session->userdata('authenticated'))){ 
      $this->load->view('login');
    }else{
      if (!$this->session->userdata('isVendor')) {
        redirect('admin','refresh');        
      }else{
        redirect('vendor/vendor','refresh');        
      }
      // if ($this->session->userdata('levelLogin')=='1') {
      //   redirect('siswa','refresh');
      // } else if ($this->session->userdata('levelLogin')=='2'){
      //   redirect('guru','refresh');
      // }else{
      //   // super admin
      // }    
    }
  }

  // cek login 
  public function cek_login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('pass'); 
    // $vendor   = isset($this->input->post('isVendor')); 
    $user = null;
    if ($this->input->post('isVendor')) {
      $user = $this->LoginModel->get_user_vendor($username,md5($password));
      if (!empty($user)) {
        $session = array(
          'authenticated' =>true,
          'level'         =>$user->level_vendor, 
          'username'      =>$user->username, 
          'password'      =>$user->password, 
          'idUser'        =>$user->id_user_vendor,
          'namaUser'      =>$user->nama_user_vendor, 
          'isVendor'      =>true, 
        );
        $this->session->set_userdata($session); 
      }
    } else {
      $user = $this->LoginModel->get_user_kantor($username,md5($password));
      if (!empty($user)) {
        $session = array(
          'authenticated' =>true,
          'level'         =>$user->level_kantor, 
          'username'      =>$user->username, 
          'password'      =>$user->password, 
          'idUser'        =>$user->id_user_kantor,
          'namaUser'      =>$user->nama_user_kantor, 
          'isVendor'      =>false, 
        );
        $this->session->set_userdata($session); 
      }
    }
    if (!empty($user)) {
      $data = array(
        'result'  => true, 
        'ket'     => 'Berhasil Login',
        'session' => $session
      );
    } else {
      $data = array(
        'result'  => false, 
        'ket'     => 'Gagal Login',
        // 'session' => $session
      );
    }
    echo json_encode($data);
  }

  // ambil logo page login
  public function ambilLogo()
  {
      $logo = $this->LoginModel->ambilLogo();
      echo json_encode($logo);
  }

  // tombol logout
  public function logout(){
      $this->session->sess_destroy(); // Hapus semua session
      redirect('auth'); // Redirect ke halaman login
  }

  public function get_session()
  {
    echo json_encode($this->session->userdata());
  }
}