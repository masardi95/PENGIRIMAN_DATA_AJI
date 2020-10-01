
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
                <div class="col-md-12">
                  <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalKirimBaru" onclick="reset()">
                    <li class="fa fa-plus"> Kirim Baru</li>
                  </button> -->
                  <b class="pull-right xxx" id="keteranganTrue" style="font-size: 23px;color: aqua; display: none">Berhasil Eksekusi :)</b>
                  <b class="pull-right xxx" id="keteranganFalse" style="font-size: 23px;color:red; display: none"></b>
                </div>
              </div>
              <div class="x_content">                
                <div id="dataPesananMasuk"></div>
              </div>
            </div>
             <?php $this->load->view('footer.php')?>
        </div>


        <!-- MODAL MODAL C U VENDOR -->
        <div class="modal fade" id="modalKirimBaru" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content md-lg">
                <div class="modal-header">              
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title">Data Kirim File</h4>
                </div>
                <?php echo form_open_multipart('transaksi/doKirim'); ?>
                  <div class="modal-body">    
                    <input type="hidden" name="idTransaksi" id="idTransaksi">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="col-md-4">
                          <img src="<?php echo site_url('assets/image/75.png') ?>" id="gambarFilePrev" style="width: 100%">
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Kirim ke vendor</label>
                            <select class="form-control chosen-select" name="emailVendor" id="emailVendor" required>
                              <option value="" selected disabled>Pilih Vendor</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Produk vendor</label>
                            <select class="form-control chosen-select" name="prodVendor" id="prodVendor" required>
                              <option value="" selected disabled>Pilih Produk Vendor</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label>Jumlah Cetak</label>
                            <input type="number" class="form-control" name="jumCetak" id="jumCetak" min="1" max="100" value="1" required>
                          </div>
                          <div class="form-group">
                            <label>Keterangan Cetak</label>
                            <input type="text" class="form-control" name="ket" id="ket" required>
                          </div>  
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Gambar Cetak</label>
                            <input type="file" name="gambarFile" id="gambarFile"  accept="image/*">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>File Mentah Cetak (.cdr)</label>
                             <input type="file" name="fileMentah" id="fileMentah"  accept=".cdr, .psd">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label>Nama Vendors</label>
                      <input type="text" class="form-control" name="namaVendor" id="namaVendor" required>
                    </div> 
                    <div class="form-group">
                      <label>Email Vendor</label>
                      <input type="email" class="form-control" name="emailVendor" id="emailVendor" required>
                    </div> 
                    <div class="form-group">
                      <label>Alamat Vendor</label>
                      <input type="text" class="form-control" name="alamatVendor" id="alamatVendor" required>
                    </div>       -->             
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btnKirim">Simpan</button>
                  </div>
                <?php echo form_close(); ?>
              </div>
          </div>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function() {
      loadPesananMasuk();
    });

    function loadPesananMasuk() {
      loading(true);
      $.ajax({
        url: url+'vendor/pesanan/ajaxpesananmasuk',
        type: 'GET',
        dataType: 'html',
      })
      .done(function(e) {
        $('#dataPesananMasuk').html(e);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        loading(false);
        console.log("complete");
      });
      
    }
</script>