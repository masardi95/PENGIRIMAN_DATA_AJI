<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VendorKantorModel extends CI_Model {

	public function getKantorByUser($idUser)
	{
		$this->db->select('v.*');
		$this->db->from('user_vendor uv');
		$this->db->join('vendor v', 'v.id_vendor = uv.id_vendor', 'left');
		$this->db->where('uv.id_user_vendor', $idUser);
		return $this->db->get()->row();
	}

	public function updateVendor($idVendor, $isi)
	{
		$this->db->where('id_vendor', $idVendor);
		return $this->db->update('vendor', $isi);
	}
	

}

/* End of file VendorKantorModel.php */
/* Location: ./application/models/VendorKantorModel.php */