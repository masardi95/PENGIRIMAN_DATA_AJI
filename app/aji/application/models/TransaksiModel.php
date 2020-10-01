<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {

	public function getProductById($idProduct)
	{
		$this->db->where('id_product', $idProduct);
		return $this->db->get('product')->row();
	}

	public function insertTransaksiKantor($isi)
	{
		$this->db->insert('transaksi', $isi);
		return $this->db->insert_id();
	}	

	public function updateTransaksi($isi, $idTransaksi)
	{
		$this->db->where('id_transaksi', $idTransaksi);
		return $this->db->update('transaksi', $isi);
	}

	public function fetchAllTransaksiBelumProgres()
	{
		$this->db->select('t.*, v.nama_vendor, p.nama_product, uv.nama_user_vendor');
		$this->db->from('transaksi t');
		$this->db->join('vendor v', 'v.id_vendor = t.id_vendor');
		$this->db->join('product p', 'p.id_product = t.id_product');
		$this->db->join('user_vendor uv', 'uv.id_user_vendor = t.id_user_vendor', 'left');
		$this->db->where('tgl_proses is NULL', NULL, FALSE);

		return $this->db->get()->result();
	}

	public function fetchAllProgTransaksi()
	{
		$this->db->select('t.*, v.nama_vendor, p.nama_product, uv.nama_user_vendor');
		$this->db->from('transaksi t');
		$this->db->join('vendor v', 'v.id_vendor = t.id_vendor');
		$this->db->join('product p', 'p.id_product = t.id_product');
		$this->db->join('user_vendor uv', 'uv.id_user_vendor = t.id_user_vendor', 'left');
		$this->db->where('tgl_proses is NOT NULL', NULL, FALSE);
		$this->db->where_not_in('status','Selesai');

		return $this->db->get()->result();
	}

	public function fetchAllTransaksiSelesai()
	{
		$this->db->select('t.*, v.nama_vendor, p.nama_product, uv.nama_user_vendor');
		$this->db->from('transaksi t');
		$this->db->join('vendor v', 'v.id_vendor = t.id_vendor');
		$this->db->join('product p', 'p.id_product = t.id_product');
		$this->db->join('user_vendor uv', 'uv.id_user_vendor = t.id_user_vendor', 'left');
		$this->db->where('status', 'Selesai');

		return $this->db->get()->result();
	}

	public function getTransaksiById($id)
	{
		$this->db->where('id_transaksi', $id);
		return $this->db->get('transaksi')->row();
	}

	public function getCountAllTransaksi($id)
	{
		if ($id>0) {
			$this->db->where('id_vendor', $id);
		}
		return $this->db->get('transaksi')->num_rows();
	}

	public function getCountAllPending($id)
	{
		if ($id>0) {
			$this->db->where('id_vendor', $id);
		}
		$this->db->where('tgl_proses is NULL', NULL, FALSE);
		return $this->db->get('transaksi')->num_rows();
	}

	public function getCountAllProses($id)
	{
		if ($id>0) {
			$this->db->where('id_vendor', $id);
		}
		$this->db->where('tgl_proses is NOT NULL', NULL, FALSE);
		$this->db->where('tgl_pelunasan is NULL', NULL, FALSE);
		return $this->db->get('transaksi')->num_rows();
	}

	public function getCountAlldone($id)
	{
		if ($id>0) {
			$this->db->where('id_vendor', $id);
		}
		$this->db->where('tgl_pelunasan is NOT NULL', NULL, FALSE);
		return $this->db->get('transaksi')->num_rows();
	}

}

/* End of file TransaksiModel.php */
/* Location: ./application/models/TransaksiModel.php */