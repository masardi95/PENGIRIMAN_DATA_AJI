<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends CI_Model {

	public function fetch_transaksi_harian()
	{
		$this->db->select("CONCAT(
		  CASE DAYOFWEEK(date(tgl_kirim))
		    WHEN 1 THEN 'Minggu'
		    WHEN 2 THEN 'Senin'
		    WHEN 3 THEN 'Selasa'
		    WHEN 4 THEN 'Rabu'
		    WHEN 5 THEN 'Kamis'
		    WHEN 6 THEN 'Jumat'
		    WHEN 7 THEN 'Sabtu'
		  END,', ', DATE_FORMAT(tgl_kirim , '%e/%m/%Y')) kirim, date(tgl_kirim) tgl_kirim, 
		  count(id_transaksi ) as jum_transaksi, sum(case(status) when 'Diterima Vendor' then 1 else 0 end) as diterima, 
		  sum(case(status) when 'Selesai' then 1 else 0 end) as selesai, sum(jumlah) as satuan");		
		$this->db->from('transaksi');
		$this->db->group_by('kirim');
		$this->db->order_by('id_transaksi', 'desc');

		return $this->db->get()->result();
	}

	public function fetch_transaksi_bulanan()
	{
		$this->db->select("CONCAT(
		  CASE MONTH(tgl_kirim) 
		    WHEN 1 THEN 'Januari' 
		    WHEN 2 THEN 'Februari' 
		    WHEN 3 THEN 'Maret' 
		    WHEN 4 THEN 'April' 
		    WHEN 5 THEN 'Mei' 
		    WHEN 6 THEN 'Juni' 
		    WHEN 7 THEN 'Juli' 
		    WHEN 8 THEN 'Agustus' 
		    WHEN 9 THEN 'September'
		    WHEN 10 THEN 'Oktober' 
		    WHEN 11 THEN 'November' 
		    WHEN 12 THEN 'Desember' 
		  END,' ',
		  YEAR(tgl_kirim)) kirim, date_format(tgl_kirim,'%Y-%m') bulan_kirim,
		  count(id_transaksi ) as jum_transaksi, sum(case(status) when 'Diterima Vendor' then 1 else 0 end) as diterima, 
		  sum(case(status) when 'Selesai' then 1 else 0 end) as selesai, sum(jumlah) as satuan");		
		$this->db->from('transaksi');
		$this->db->group_by('kirim');
		$this->db->order_by('id_transaksi', 'desc');

		return $this->db->get()->result();
	}

	public function fetchDetailTransaksi($tgl)
	{
		$this->db->select('t.*, v.nama_vendor, p.nama_product, uv.nama_user_vendor');
		$this->db->from('transaksi t');
		$this->db->join('vendor v', 'v.id_vendor = t.id_vendor');
		$this->db->join('product p', 'p.id_product = t.id_product');
		$this->db->join('user_vendor uv', 'uv.id_user_vendor = t.id_user_vendor', 'left');
		// $this->db->where('tgl_pelunasan is NOT NULL', NULL, FALSE);
		$this->db->like('t.tgl_kirim', $tgl);

		return $this->db->get()->result();
	}

	public function fetchDetailTransaksiBulanan($tgl)
	{
		/*$this->db->select("CONCAT(
		  CASE DAYOFWEEK(date(tgl_kirim))
		    WHEN 1 THEN 'Minggu'
		    WHEN 2 THEN 'Senin'
		    WHEN 3 THEN 'Selasa'
		    WHEN 4 THEN 'Rabu'
		    WHEN 5 THEN 'Kamis'
		    WHEN 6 THEN 'Jumat'
		    WHEN 7 THEN 'Sabtu'
		  END,', ', DATE_FORMAT(tgl_kirim , '%e/%m/%Y')) hari_kirim, date(tgl_kirim) tgl_kirim, 
		  count(id_transaksi ) as jum_transaksi, sum(case(status) when 'Diterima Vendor' then 1 else 0 end) as diterima, 
		  sum(case(status) when 'Selesai' then 1 else 0 end) as selesai, sum(jumlah) as satuan,
		  sum(jumlah*harga) as total_harga");		
		$this->db->from('transaksi');
		$this->db->group_by(''.date_format($tgl,'%Y-%m-%d'));
		return $this->db->get()->result();*/
		$sql="select CONCAT(
			CASE DAYOFWEEK(date(tgl_kirim))
				WHEN 1 THEN 'Minggu'
				WHEN 2 THEN 'Senin'
				WHEN 3 THEN 'Selasa'
				WHEN 4 THEN 'Rabu'
				WHEN 5 THEN 'Kamis'
				WHEN 6 THEN 'Jumat'
				WHEN 7 THEN 'Sabtu'
			END,', ', DATE_FORMAT(tgl_kirim , '%e/%m/%Y')) hari_kirim, date(tgl_kirim) tgl_kirim, 
			count(id_transaksi ) as jum_transaksi, sum(case(status) when 'Diterima Vendor' then 1 else 0 end) as diterima, 
			sum(case(status) when 'Selesai' then 1 else 0 end) as selesai, sum(jumlah) as satuan,
			sum(jumlah*harga) as total_harga
			from transaksi t2 
			where tgl_kirim like '%".$tgl."%' group by date_format(tgl_kirim,'%Y-%m-%d')";    
	    $query = $this->db->query($sql);
	    return $query->result_array();

	}
	

}

/* End of file ReportModel.php */
/* Location: ./application/models/ReportModel.php */