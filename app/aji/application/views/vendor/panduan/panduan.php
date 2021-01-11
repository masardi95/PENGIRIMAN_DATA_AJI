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
                                             <td style="width: 12.8063%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Dashboard</span></td>
                                             <td style="width: 2.28287%; text-align: justify;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Menampilkan data transaksi yang dilakukan.</span></td>
                                          </tr>
                                          <tr style="height: 17px; text-align: justify;">
                                             <td style="width: 12.8063%; height: 17px;"><span style="font-size: 18px;">Kantor</span></td>
                                             <td style="width: 2.28287%;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px;"><span style="font-size: 18px;">Menampilkan Data kantor yang nanti data dapat di edit oleh admin percetakan terkait.</span></td>
                                          </tr>
                                          <tr style="height: 17px; text-align: justify;">
                                             <td style="width: 12.8063%; height: 17px;"><span style="font-size: 18px;">Produk</span></td>
                                             <td style="width: 2.28287%;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px;"><span style="font-size: 18px;">Menambahkan produk yang tersedia dan menentukan harga yang telah ditetapkan.</span></td>
                                          </tr>
                                          <tr style="height: 17px; text-align: justify;">
                                             <td style="width: 12.8063%; height: 17px;"><span style="font-size: 18px;">Pesanan</span></td>
                                             <td style="width: 2.28287%;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px;"><span style="font-size: 18px;">Mengelola pesanan baik itu menerima pesanan, dan&nbsp;menyelesaikan transaksi jika pihak satlantas telah mengirimkan&nbsp;bukti tranfer.</span></td>
                                          </tr>
                                          <tr style="height: 17px; text-align: justify;">
                                             <td style="width: 12.8063%; height: 17px;"><span style="font-size: 18px;">Report </span></td>
                                             <td style="width: 2.28287%;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px;"><span style="font-size: 18px;">Mengelola laporan baik itu harian ataupun bulanan yang dilakukan&nbsp;dan bisa langsung mencetak kedalam bentuk ekrtas ataupun pdf.</span></td>
                                          </tr>
                                          <tr style="height: 17px; text-align: justify;">
                                             <td style="width: 12.8063%; height: 17px;"><span style="font-size: 18px;">Informasi</span></td>
                                             <td style="width: 2.28287%;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px;"><span style="font-size: 18px;">Menampilkan informasi seputar sistem dan petunjuk penggunaan.</span></td>
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
                                    <p style="text-align: justify;"><span style="text-decoration: underline;"><span style="font-size: 18px;"><strong>3. Pesanan yang dilakukan akan masuk ke menu pesanan dan terdapat tombol</strong></span></span></p>
                                 </h4>
                              </a>
                              <div id="4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="4">
                                 <div class="panel-body">
                                    <table style="border-collapse: collapse; width: 100%;">
                                       <tbody>
                                          <tr style="height: 17px;">
                                             <td style="width: 23.7637%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Proses Pesanan Masuk</span></td>
                                             <td style="width: 1.06383%; text-align: justify;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Pesanan akan di teruskan dan masuk kedalam halam proses</span></td>
                                          </tr>
                                          <tr style="height: 17px; text-align: justify;">
                                             <td style="width: 23.7637%; height: 17px;"><span style="font-size: 18px;">Lihat File</span></td>
                                             <td style="width: 1.06383%;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px;"><span style="font-size: 18px;">Menampilkan file preview berupa gambar untuk memastikan file benar. </span></td>
                                          </tr>
                                          <tr style="height: 17px; text-align: justify;">
                                             <td style="width: 23.7637%; height: 17px;"><span style="font-size: 18px;">Download master File</span></td>
                                             <td style="width: 1.06383%;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px;"><span style="font-size: 18px;">Mendownload file yang dikirimkan atau jika menyematkan link google drive akan membuka new tabd dan menuju akun terkait. </span></td>
                                          </tr>
                                          <tr style="height: 17px; text-align: justify;">
                                             <td style="width: 23.7637%; height: 17px;"><span style="font-size: 18px;">Batalkan Antrian Cetak</span></td>
                                             <td style="width: 1.06383%;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px;"><span style="font-size: 18px;">Mengembalikan file kepada admin jika vendor sedang ada job lain dan tidak memungkinkan transaksi dilakukan. </span></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                 </div>
                              </div>
                           </div>
                           <div class="panel">
                              <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#5" aria-expanded="false" aria-controls="5">
                                 <h4 class="panel-title">
                                    <p style="text-align: justify;"><span style="text-decoration: underline;"><span style="font-size: 18px;"><strong>4.  Pada menu proses menampilkan data yang sedang di proses, dan beberapa tombol berupa</strong></span></span></p>
                                 </h4>
                              </a>
                              <div id="5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="5">
                                 <div class="panel-body">
                                    <table style="border-collapse: collapse; width: 100%;">
                                       <tbody>
                                          <tr style="height: 17px;">
                                             <td style="width: 23.7637%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Lihat Gambar File </span></td>
                                             <td style="width: 1.06383%; text-align: justify; height: 17px;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px; text-align: justify;"><span style="font-size: 18px;">Melihat ulang gambar file untuk memastikan file yang di download.</span></td>
                                          </tr>
                                          <tr style="height: 17px; text-align: justify;">
                                             <td style="width: 23.7637%; height: 17px;"><span style="font-size: 18px;">Download master File</span></td>
                                             <td style="width: 1.06383%; height: 17px;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px;"><span style="font-size: 18px;">Mendownload file ulang jika terjadi trouble di file yang di download di awal.</span></td>
                                          </tr>
                                          <tr style="height: 17px; text-align: justify;">
                                             <td style="width: 23.7637%; height: 17px;"><span style="font-size: 18px;">Selesaikan transaksi</span></td>
                                             <td style="width: 1.06383%; height: 17px;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px;"><span style="font-size: 18px;">Jika Billboard sudah terpasang dan selesai dapat mengklik tombol ini untuk menunggu tranfer dari pihak satlantas.</span></td>
                                          </tr>
                                          <tr style="height: 17px; text-align: justify;">
                                             <td style="width: 23.7637%; height: 17px;"><span style="font-size: 18px;">Lihat Bukti Pembayaran</span></td>
                                             <td style="width: 1.06383%; height: 17px;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 17px;"><span style="font-size: 18px;">Melihat bukti tranfer berupa screenshot atau foto.</span></td>
                                          </tr>
                                          <tr style="height: 36px;">
                                             <td style="width: 23.7637%; height: 36px;"><span style="font-size: 18px;">Terima Bukti dan selesaikan transaksi</span></td>
                                             <td style="width: 1.06383%; height: 36px;"><span style="font-size: 18px;">:</span></td>
                                             <td style="width: 84.9109%; height: 36px;"><span style="font-size: 18px;">Menyelesaikan transaksi dan data akan&nbsp;masuk ke menu selesai dan masuk akumulasi perhitungan.</span></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
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