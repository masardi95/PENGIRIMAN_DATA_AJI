<!DOCTYPE html>
<html>
<head>
	<title>Report Bulanan</title>
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
		}

	    .ttd{
	    	text-align-last: center  !important;
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
           					<img src="<?php echo base_url() ?>assets/image/logo/logo_lantas.png" alt="IMG" width="100%">
						</td>
						<td width="70%">
							<div style="text-align-last: center">
								<h2>
									LAPORAN BULANAN ORDER CETAK
								</h2>
								<h2 style="margin-top: -20px; margin-bottom: 0px">
									<?php echo $kantor->nama_kantor ?>
								</h2>
								<br>
								<b> Admin : <?php echo $vendor->nama_vendor ?></b>
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
		<div class="row" style="border: dotted; margin-left: 110px; margin-right: 110px; margin-top: 30px" >
			<br>
			<br>
			<table width="100%">
				<tr>
					<td width="40%" class="ttd">Staf Admin</td>
					<td width="20%" class="ttd">&nbsp;</td>
					<td width="40%" class="ttd">Kaur Mintu</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td class="ttd">Satlantas Polres Kebumen</td>
				</tr>
				<?php 
					for ($i=0; $i <3 ; $i++) { 
						?>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
						<?php
					}
				?>
				<tr>
					<td class="ttd">( <?php echo $this->session->userdata('namaUser'); ?> )</td>
					<td class="ttd">&nbsp;</td>
					<td class="ttd">( Aiptu Agus Wijayanto, S.H. )</td>
				</tr>
				

			</table>
			
			<br>
			<br>
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