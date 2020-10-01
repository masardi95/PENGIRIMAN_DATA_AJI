<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VendorProdukModel extends CI_Model {
	
	public function fetchProdukByIdVendor($idVendor)
	{
		$this->db->where('deleted', 0);
		$this->db->where('id_vendor', $idVendor);
		return $this->db->get('product')->result();
	}

	public function getprodukbyid($id)
	{
		$this->db->where('id_product', $id);
		return $this->db->get('product')->row();
	}

	public function isiProduct($isi)
	{
		return $this->db->insert('product', $isi);
	}

	public function update($idProduct, $isi)
	{
		$this->db->where('id_product', $idProduct);
		return $this->db->update('product', $isi);
	}
	

}

/* End of file VendorProdukModel.php */
/* Location: ./application/models/VendorProdukModel.php */