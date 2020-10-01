<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mgtvendor_Model extends CI_Model {

	public function cekEmailVendor($email)
	{
		$this->db->where('email_vendor', $email);
		return $this->db->get('vendor')->row();
	}

	public function isiVendor($data)
	{
		$this->db->insert('vendor', $data);
	   	$insert_id = $this->db->insert_id();

	   	return  $insert_id;
	}

	public function getVendorById($idVendor)
	{
		$this->db->where('id_vendor', $idVendor);
		return $this->db->get('vendor')->row();
	}

	public function updateVendor($idVendor, $isi)
	{
		$this->db->where('id_vendor', $idVendor);
		return $this->db->update('vendor', $isi);
	}

	public function hapusVendorById($id)
	{
		$isi = array('deleted' => 1 );
		$this->db->where('id_vendor', $id);
		return $this->db->update('vendor', $isi);
	}

	public function aktifkanvendorbyid($id)
	{
		$isi = array('deleted' => 0 );
		$this->db->where('id_vendor', $id);
		return $this->db->update('vendor', $isi);
	}

	public function ajaxFetchAllVendor()
	{
		$this->db->where('deleted', 0);
		return $this->db->get('vendor')->result();
	}

	public function fetchAllVendorAktive()
	{
		$this->db->where('deleted', 0);
		return $this->db->get('vendor')->result();
	}


	/*******************************************************************************************************************/
	/************************************************* USER VENDOR *****************************************************/
	/*******************************************************************************************************************/

	public function ajaxFetchAllUserVendor()
	{
		$this->db->select('uv.*, v.nama_vendor');
		$this->db->from('user_vendor uv');
		$this->db->join('vendor v', 'uv.id_vendor = v.id_vendor');
		$this->db->where('uv.deleted', 0);
		$this->db->order_by('uv.id_vendor', 'asc');
		return $this->db->get()->result();
	}

	public function getUserVendorById($idUser)
	{
		$this->db->where('id_user_vendor', $idUser);
		return $this->db->get('user_vendor')->row();
	}

	public function cekUsername($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('user_vendor')->row();
	}

	public function isiUserVendor($isi)
	{
		$this->db->insert('user_vendor', $isi);
	   	$insert_id = $this->db->insert_id();

	   	return  $insert_id;
	}

	public function updateUserVendor($idUser, $isi)
	{
		$this->db->where('id_user_vendor', $idUser);
		return $this->db->update('user_vendor', $isi);
	}

	public function hapusUserVendorById($id)
	{
		$isi = array('deleted' => 1 );
		$this->db->where('id_user_vendor', $id);
		return $this->db->update('user_vendor', $isi);
	}

	public function aktifkanUserVendorById($id)
	{
		$isi = array('deleted' => 0 );
		$this->db->where('id_user_vendor', $id);
		return $this->db->update('user_vendor', $isi);
	}

	public function resetPwUserVendorById($id)
	{
		$isi = array('password' => md5('123456') );
		$this->db->where('id_user_vendor', $id);
		return $this->db->update('user_vendor', $isi);
	}

	/*TRANSAKSI*/
	public function fetchProductVendorById($id)
	{
		$this->db->where('id_vendor', $id);
		$this->db->where('deleted', 0);
		return $this->db->get('product')->result();

	}

	

}

/* End of file Mgtvendor_Model.php */
/* Location: ./application/models/Mgtvendor_Model.php */