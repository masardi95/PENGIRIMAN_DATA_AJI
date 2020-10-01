<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VendorPesananModel extends CI_Model {

	public function fetchPesananMasuk($idVendor)
	{
		$this->db->select('t.*, uk.nama_user_kantor, k.nama_kantor, p.nama_product, p.ukuran, p.bahan');
		$this->db->from('transaksi t');
		$this->db->join('user_kantor uk', 'uk.id_user_kantor = t.id_user_kantor');
		$this->db->join('kantor k', 'k.id_kantor = uk.id_kantor');
		$this->db->join('product p', 'p.id_product = t.id_product ');
		$this->db->where('tgl_proses is NULL', NULL, FALSE);
		$this->db->where('t.id_vendor', $idVendor);
		$this->db->order_by('t.id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function fetchPesananOnProg($idVendor)
	{
		$this->db->select('t.*, uk.nama_user_kantor, k.nama_kantor, p.nama_product, p.ukuran, p.bahan');
		$this->db->from('transaksi t');
		$this->db->join('user_kantor uk', 'uk.id_user_kantor = t.id_user_kantor');
		$this->db->join('kantor k', 'k.id_kantor = uk.id_kantor');
		$this->db->join('product p', 'p.id_product = t.id_product ');
		$this->db->where('tgl_proses is NOT NULL', NULL, FALSE);
		$this->db->where_not_in('status','Selesai');
		$this->db->where('t.id_vendor', $idVendor);
		$this->db->order_by('t.id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function fetchPesananDone($idVendor)
	{
		$this->db->select('t.*, uk.nama_user_kantor, k.nama_kantor, p.nama_product, p.ukuran, p.bahan');
		$this->db->from('transaksi t');
		$this->db->join('user_kantor uk', 'uk.id_user_kantor = t.id_user_kantor');
		$this->db->join('kantor k', 'k.id_kantor = uk.id_kantor');
		$this->db->join('product p', 'p.id_product = t.id_product ');
		$this->db->where('tgl_proses is NOT NULL', NULL, FALSE);
		$this->db->where('tgl_pelunasan is NOT NULL', NULL, FALSE);
		$this->db->where('status', 'Selesai');
		$this->db->where('t.id_vendor', $idVendor);
		$this->db->order_by('t.id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function updatePesanan($idTransaksi, $up)
	{
		$this->db->where('id_transaksi', $idTransaksi);
		return $this->db->update('transaksi', $up);
	}
	

}

/* End of file VendorPesananModel.php */
/* Location: ./application/models/VendorPesananModel.php */