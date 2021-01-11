<!DOCTYPE html>
<html lang="en">
   <head>
      <?php $this->load->view('header'); ?>
   </head>
   <body class="nav-md">
      <div class="container body">
         <div class="main_container">
            <div class="col-md-3 left_col">
               <div class="left_col scroll-view">
                  <!-- sidebar menu -->
                  <?php $this->load->view('sidebar') ?>
                  <!-- /sidebar menu -->
               </div>
            </div>
            <!-- top navigation -->
            <?php $this->load->view('nav')?>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
               <div class="row">
                  <div class="x_panel">
                     <div class="x_content">
                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                           <div class="panel">
                              <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 <h4 class="panel-title">
                                    <p style="text-align: justify;"><span style="text-decoration: underline;"><span style="font-size: 18px;"><strong>Tentang Sistem</strong></span></span></p>
                                 </h4>
                              </a>
                              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                 <div class="panel-body">
                                    <p style="font-size: 18px;text-align: justify;">Sistem Informasi pembayaran ini dibuat untuk mempermudah transaksi antara Satlantas dan pihak percetakan terkait, sehingga transaksi yang dilakukan bisa semakin terperinci dan tidak ada data yang hilang atau tidak terhitung. Dengan adanya system ini diharapkan transaksi yang terjadi bisa lebih mudah untuk dipertanggungjawabkan kepada pimpinan masing masing pihak baik itu pihak Satlantas ataupun pihak percetakan yang terkait.</p>
                                 </div>
                              </div>
                           </div>
                           <div class="panel">
                              <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 <h4 class="panel-title">
                                    <p style="text-align: justify;"><span style="text-decoration: underline;"><span style="font-size: 18px;"><strong>1. Log In</strong></span></span></p>
                                 </h4>
                              </a>
                              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                 <div class="panel-body">
                                    <p style="font-size: 18px;text-align: justify;">Untuk log in pertama akun akan diberikan oleh admin Satlantas berupa <em>username</em> : **** dan Password : **** dan untuk log in karyawan harus menceklis di bawah Tombol <strong>LOG IN.</strong></p>
                                 </div>
                              </div>
                           </div>

                           <div class="panel">
                              <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#3" aria-expanded="false" aria-controls="3">
                                 <h4 class="panel-title">
                                    <p style="text-align: justify;"><span style="text-decoration: underline;"><span style="font-size: 18px;"><strong>2.  Dalam menu terdapat beberapa pilihan</strong></span></span></p>
                                 </h4>
                              </a>
                              <div id="3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="3">
                                 <div class="panel-body">
                                    <table style="border-collapse: collapse; width: 100%;">
                                       <tbody>
                                          <tr style="height: 17px;">
                                             <td style="width: 19.586%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Dashboard</span></td>
                                             <td style="width: 1.21065%; text-align: justify;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Menampilkan data transaksi yang dilakukan.</span></td>
                                          </tr>
                                          <tr style="height: 17px;">
                                             <td style="width: 19.586%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Kantor</span></td>
                                             <td style="width: 1.21065%; text-align: justify;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Menampilkan admin kantor dan dapat di edit data admin terkait, khusus untuk pimpinan dapat menghapus data admin kantor.</span></td>
                                          </tr>
                                          <tr style="height: 17px;">
                                             <td style="width: 19.586%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Mgt User Kantor</span></td>
                                             <td style="width: 1.21065%; text-align: justify;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Menampilkan data vendor terkait yaitu percetakan dan event organizer yang sudah berkerja sama, pada menu ini admin dapat vendor ataupun admin vendor yang sudah mengusulkan Kerjasama.</span></td>
                                          </tr>
                                          <tr style="height: 17px;">
                                             <td style="width: 19.586%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Mgt User Vendor</span></td>
                                             <td style="width: 1.21065%; text-align: justify;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Menampilkan data vendor terkait yaitu percetakan dan event organizer yang sudah berkerja sama, pada menu ini admin dapat menambahkan vendor ataupun admin vendor yang sudah mengusulkan Kerjasama. </span></td>
                                          </tr>
                                          <tr style="height: 17px;">
                                             <td style="width: 19.586%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Transaksi</span></td>
                                             <td style="width: 1.21065%; text-align: justify;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Menampilan Menu Transaksi berupa Antrian cetak, Proses Dan Selesai. </span></td>
                                          </tr>
                                          <tr style="height: 17px;">
                                             <td style="width: 19.586%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Report</span></td>
                                             <td style="width: 1.21065%; text-align: justify;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Mengelola dan mencetak laporan transaksi harian dan bulanan yang. </span></td>
                                          </tr>
                                          <tr style="height: 17px;">
                                             <td style="width: 19.586%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Informasi</span></td>
                                             <td style="width: 1.21065%; text-align: justify;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Menampilkan informasi seputar sistem dan petunjuk penggunaan. </span></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                 </div>
                              </div>
                           </div>


                           <div class="panel">
                              <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#4" aria-expanded="false" aria-controls="4">
                                 <h4 class="panel-title">
                                    <p style="text-align: justify;"><span style="text-decoration: underline;"><span style="font-size: 18px;"><strong>3. Ketentuan Pemesanan</strong></span></span></p>
                                 </h4>
                              </a>
                              <div id="4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="4">
                                 <div class="panel-body">
                                    <p style="font-size: 18px;text-align: justify;">Untuk mengirimkan pesanan dapat dilakukan melalui menu antrian cetak dengan meng klik tombol Kirim dan langsung diisi Vendor, Bahan, Ukuran Panjang dan Lebar, Jumlah cetak, Keterangan untuk vendor terkait, dan melampirkan preview file dan file yang akan dikirimkan. Karena keterbatasan sistem file diatas 10Mb direkomendasikan melalui Google Drive dan menyematkan link terkait.</p>
                                 </div>
                              </div>
                           </div>

                           <div class="panel">
                              <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#5" aria-expanded="false" aria-controls="5">
                                 <h4 class="panel-title">
                                    <p style="text-align: justify;"><span style="text-decoration: underline;"><span style="font-size: 18px;"><strong>4. Ketentuan Pelunasan</strong></span></span></p>
                                 </h4>
                              </a>
                              <div id="5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="5">
                                 <div class="panel-body">
                                    <p><span style="font-size: 18px;">Jika pesanan sudah selesai dapat dilakukan transfer dan bukti transfer dapat di upload di menu proses klik tombol &ldquo;<strong><span style="text-decoration: underline;">upload bukti pembayaran</span></strong>&rdquo;.</span></p>
                                 </div>
                              </div>
                           </div>


                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /page content -->
            <?php $this->load->view('footer.php')?>
         </div>
      </div>
      <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
   </body>
</html>