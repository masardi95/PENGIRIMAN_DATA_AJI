<!DOCTYPE html>
<html>
<head>
	<title>Rport Harian</title>
	<style>
		@media print {
	    html, body {
	        font-family: 'Roboto', sans-serif;
	        margin: 0;
	        background: unset !important;
	        border: unset !important;
	        min-height: auto !important;
	        -webkit-print-color-adjust: exact;
	    }
	    td{
	    	font-size: 12px;
	    }
	</style>
</head>
<body>
	<div class="page">
		<div class="row">
			<div class="col-md-12">
				<div style="text-align-last: center">
					<h3>
						LAPORAN HARIAN
						<br>
						<?php echo $kantor->nama_kantor ?>
					</h3>
					<?php echo $kantor->alamat_kantor ?>
					<br>
					Email: &nbsp;<?php echo $kantor->email_kantor ?>
				</div>
				<hr>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
					<table width="100%">
						<?php foreach ($dataHarian as $val): 
							$totBayarOfDay = 0;
							$n = 1;
							?>
								<tr>
									<td width="70%">
										<b>Tgl transaksi : &nbsp; <?php echo $val->kirim ?></b>
									</td>	
									<td>
										<b>Jumlah Transaksi : &nbsp; <?php echo $val->jum_transaksi ?></b>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="background: red"></td>
								</tr>
								<tr>
									<td colspan="2">
										<table width="100%" border="1">
											<tr>
												<td>No</td>
												<td >No Transaksi</td>
												<td>Tgl Kirim</td>
												<td>Tgl Selesai</td>
												<td>Tgl Pelunasan</td>
												<td>Jumlah</td>
												<td>Keterangan</td>
												<td>Total</td>
											</tr>
											<?php foreach ($detailHarian as $i => $det): ?>
												<?php if ($val->tgl_kirim == $det['parentTgl']) {
													?>
														<tr>
															<td><?php echo $n++ ?></td>
															<td><?php echo $det['noTransaksi'] ?></td>
															<td><?php echo $det['tglKirim'] ?></td>
															<td><?php echo $det['tglSelesai'] ?></td>
															<td><?php echo $det['tgl_pelunasan'] ?></td>
															<td><?php echo $det['jumlah'] ?></td>
															<td><?php echo $det['keterangan'] ?></td>
															<td><?php echo $det['totalBayar'] ?></td>
														</tr>
													<?php
													$totBayarOfDay =$totBayarOfDay + $det['nTotalBayar']; 
												} ?>

											<?php endforeach ?>
										</table>
									</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><b><u>Total Bayar ; Rp. <?php echo number_format($totBayarOfDay); ?></u></b></td>
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>
								</tr>

						<?php endforeach ?>
					</table>
			</div>
		</div>
	</div>
</body>
</html>

  <script src="<?php echo base_url() ?>assets/jquery/dist/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		window.print();
	});
</script>