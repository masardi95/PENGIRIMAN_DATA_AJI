<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor_Model extends CI_Model {

	public function getKantorDetail()
	{
		return $this->db->get('kantor')->row();
	}

	public function updateKantor($idKantor, $data)
	{
		$this->db->where('id_kantor', $idKantor);
		return $this->db->update('kantor', $data);
	}

	public function fetchUserAktif()
	{
		$id = array(15, 16);
		$this->db->where_not_in('id_user_kantor', $id);
		$this->db->where('deleted', 0);
		return $this->db->get('user_kantor')->result();
	}




	/************************** USER ****************************/
	public function getUserKantorById($id)
	{
		$this->db->where('id_user_kantor', $id);
		return $this->db->get('user_kantor')->row();
	}
	public function cekUsername($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('user_kantor')->row();
	}

	public function isiUserKantor($isi)
	{
		return $this->db->insert('user_kantor', $isi);
	}
	
	public function updateUserKantor($idUser, $isi)
	{
		$this->db->where('id_user_kantor', $idUser);
		return $this->db->update('user_kantor', $isi);
	}

	public function onOff($idUser, $status)
	{
		$this->db->where('id_user_kantor', $idUser);
		return $this->db->update('user_kantor', $status);
	}


	

}

/* End of file Kantor_Model.php */
/* Location: ./application/models/Kantor_Model.php */