<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends CI_Model {

/*	public function fetch_transaksi_harian()
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
		  sum(case(status) when 'Dikirim' then 1 else 0 end) as pending, 
		  count(id_transaksi ) as jum_transaksi, sum(case(status) when 'Diterima Vendor' then 1 else 0 end) as diterima,
		  sum(case(status) when 'Selesai' then 1 else 0 end) as selesai, sum(jumlah) as satuan,
		  sum(harga*jumlah*panjang*lebar) as tot_anggaran");		
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
		  sum(case(status) when 'Dikirim' then 1 else 0 end) as pending, 
		  count(id_transaksi ) as jum_transaksi, sum(case(status) when 'Diterima Vendor' then 1 else 0 end) as diterima, 
		  sum(case(status) when 'Selesai' then 1 else 0 end) as selesai, sum(jumlah) as satuan,
		  sum(harga*jumlah*panjang*lebar) as tot_anggaran");			
		$this->db->from('transaksi');
		$this->db->group_by('kirim');
		$this->db->order_by('id_transaksi', 'desc');

		return $this->db->get()->result();
	}

	*/

	public function fetch_transaksi_harian_filter($star, $end, $pending, $prog, $done)
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
		  sum(case(status) when 'Dikirim' then 1 else 0 end) as pending, 
		  count(id_transaksi ) as jum_transaksi, sum(case(status) when 'Diterima Vendor' then 1 else 0 end) as diterima,
		  sum(case(status) when 'Selesai' then 1 else 0 end) as selesai, sum(jumlah) as satuan,
		  sum(harga*jumlah*panjang*lebar) as tot_anggaran");		
		$this->db->from('transaksi');

		$this->db->where('tgl_kirim >=', $star);
		$this->db->where('tgl_kirim <=', $end);

		$status = array();

		if (!empty($pending)) {array_push($status, 'Dikirim');}
		if (!empty($prog)) {array_push($status, 'Diterima Vendor');}
		if (!empty($done)) {array_push($status, 'Selesai');}

		if (!empty($status)) {
			$this->db->where_in('status', $status);
		}
		
		$this->db->group_by('kirim');
		$this->db->order_by('id_transaksi', 'desc');

		return $this->db->get()->result();
	}

	public function fetch_transaksi_bulanan_filter($star, $end, $pending, $prog, $done)
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
		  sum(case(status) when 'Dikirim' then 1 else 0 end) as pending, 
		  count(id_transaksi ) as jum_transaksi, sum(case(status) when 'Diterima Vendor' then 1 else 0 end) as diterima, 
		  sum(case(status) when 'Selesai' then 1 else 0 end) as selesai, sum(jumlah) as satuan,
		  sum(harga*jumlah*panjang*lebar) as tot_anggaran");			
		$this->db->from('transaksi');

		$this->db->where('date(tgl_kirim) >=', $star);
		$this->db->where('date(tgl_kirim) <=', $end);

		$status = array();

		if (!empty($pending)) {array_push($status, 'Dikirim');}
		if (!empty($prog)) {array_push($status, 'Diterima Vendor');}
		if (!empty($done)) {array_push($status, 'Selesai');}

		if (!empty($status)) {
			$this->db->where_in('status', $status);
		}
		
		$this->db->group_by('kirim');
		$this->db->order_by('id_transaksi', 'desc');

		return $this->db->get()->result();
	}

	public function fetchDetailTransaksi($parentTgl, $star, $end, $pending, $prog, $done)
	{
		$status = array();
		$this->db->select('t.*, v.nama_vendor, p.nama_product, uv.nama_user_vendor');
		$this->db->from('transaksi t');
		$this->db->join('vendor v', 'v.id_vendor = t.id_vendor');
		$this->db->join('product p', 'p.id_product = t.id_product');
		$this->db->join('user_vendor uv', 'uv.id_user_vendor = t.id_user_vendor', 'left');
		// // $this->db->where('tgl_pelunasan is NOT NULL', NULL, FALSE);

		if (!empty($parentTgl)) {$this->db->like('t.tgl_kirim', $parentTgl);}


		if (!empty($star)) {$this->db->where('t.tgl_kirim >=', $star);}
		if (!empty($end)) {$this->db->where('t.tgl_kirim <=', $end);}


		if (!empty($pending)) {array_push($status, 'Dikirim');}
		if (!empty($prog)) {array_push($status, 'Diterima Vendor');}
		if (!empty($done)) {array_push($status, 'Selesai');}

		if (!empty($status)) {
			$this->db->where_in('status', $status);
		}
		
		// $this->db->group_by('kirim');
		$this->db->order_by('t.id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function fetchDetailTransaksiBulanan($parentTgl, $star, $end, $pending, $prog, $done)
	{
		$status ="'0'";
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
		  	sum(case(status) when 'Dikirim' then 1 else 0 end) as pending, 
			count(id_transaksi ) as jum_transaksi, sum(case(status) when 'Diterima Vendor' then 1 else 0 end) as diterima, 
			sum(case(status) when 'Selesai' then 1 else 0 end) as selesai, sum(jumlah) as satuan,
			sum(t2.jumlah*t2.harga*t2.panjang*t2.lebar) as total_harga,
			t2.*, v.nama_vendor, p.nama_product, uv.nama_user_vendor
			from transaksi t2 
			join vendor v on v.id_vendor = t2.id_vendor
			join product p on p.id_product = t2.id_product
			left join user_vendor uv on uv.id_user_vendor = t2.id_user_vendor";


			if (!empty($parentTgl)) {$sql .=" where tgl_kirim like '%".$parentTgl."%' ";}

			if (!empty($star)) {$sql .=" and tgl_kirim >= '".$star."'";}
			if (!empty($end)) {$sql .=" and tgl_kirim <= '".$end."'";}


			// if (!empty($pending)) {$sql .=" and t2.status = 'Dikirim'";}
			// if (!empty($prog)) {$sql .=" and  t2.status = 'Diterima Vendor'";}
			// if (!empty($done)) {$sql .=" and  t2.status = 'Selesai'";}

			if (!empty($pending)) {$status .=", 'Dikirim'";}
			if (!empty($prog)) {$status .=", 'Diterima Vendor'";}
			if (!empty($done)) {$status .=", 'Selesai'";}

			if($status != "'0'"){
				$sql .=" and t2.status in (".$status.") ";
			}

			
			// if (!empty($parentTgl)){ 
			// 	$sql .=" group by date_format(tgl_kirim,'%Y-%m-%d')";
			// }else{
				$sql .=" group by tgl_kirim";
			// }

			if (!empty($status)) {
				$this->db->where_in('status', $status);
			}

	    $query = $this->db->query($sql);
	    return $query->result_array();

	}
	

}

/* End of file ReportModel.php */
/* Location: ./application/models/ReportModel.php */