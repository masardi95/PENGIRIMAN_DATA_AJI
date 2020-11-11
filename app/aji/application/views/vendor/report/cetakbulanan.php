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
				<table width="100%">
					<tr>
						<td width="15%">
							<?php if ($kantor->logo == ''): ?>
								<img src="<?php echo base_url() ?>assets/image/loading.gif" alt="IMG" width="100%">
							<?php else: ?>
								<img src="<?php echo base_url() ?>assets/image/logo/<?php echo $kantor->logo ?>" alt="IMG" width="100%">
							<?php endif ?>
						</td>
						<td width="70%">
							<div style="text-align-last: center">
								<h3>
									LAPORAN BULANAN ORDER CETAK "<?php echo $kantor->nama_kantor ?>"
								</h3>
								<br>
								<b><?php echo $vendor->nama_vendor ?></b>
								<br>
								<?php echo $vendor->alamat_vendor ?>
								<br>
								Email: &nbsp;<?php echo $vendor->email_vendor ?>
							</div>
						</td>
						<td width="15%">&nbsp;</td>
					</tr>					
				</table>
				<hr>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
					<table width="100%">
						<?php foreach ($dataBulanan as $val): 
							$totBayarOfDay = 0;
							$n = 1;
							?>
								<tr>
									<td width="70%">
										<b>Bulan transaksi : &nbsp; <?php echo $val->kirim ?></b>
									</td>	
									<td>
										<b>Jumlah Transaksi : &nbsp; <?php echo $val->jum_transaksi ?></b>
									</td>
								</tr>
								<!-- <tr> -->
									<td colspan="2" style="background: red"></td>
								</tr>
								<tr>
									<td colspan="2">
										<table width="100%" border="1">
											<tr>
												<td>No</td>
												<td >Hari Transaksi</td>
												<td>Jumlah Transaksi</td>
												<td>Jumlah Diterima</td>
												<td>Jumlah Selesai</td>
												<td>Total Biaya</td>
											</tr>
											<?php foreach ($detailBulanan as $i => $det): ?>
												<?php if ($val->bulan_kirim == $det['parentTgl']) {
													?>
														<tr>
															<td><?php echo $n++ ?></td>
															<td><?php echo $det['hariTransaksi'] ?></td>
															<td><?php echo $det['jumTransaksi'] ?></td>
															<td><?php echo $det['jumDiterima'] ?></td>
															<td><?php echo $det['jumSelesai'] ?></td>
															<td><?php echo $det['totalHarga'] ?></td>
														</tr>
													<?php
													$totBayarOfDay =$totBayarOfDay + $det['nTotalHarga']; 
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