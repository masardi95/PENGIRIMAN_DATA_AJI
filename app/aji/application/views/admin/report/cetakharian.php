<!DOCTYPE html>
<html>
<head>
	<title>Report Harian</title>
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
						</td>
						<td width="70%">
							<div style="text-align-last: center">
								<h2>
									LAPORAN HARIAN ORDER CETAK
									<br>
									<?php echo $kantor->nama_kantor ?>
								</h2>
								<?php echo $kantor->alamat_kantor ?>
								<br>
								Email: &nbsp;<?php echo $kantor->email_kantor ?>
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
												<td>Ukuran ( Pxl )</td>
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
															<td><?php echo $det['ukuran'] ?></td>
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
		// window.print();
	});
</script>