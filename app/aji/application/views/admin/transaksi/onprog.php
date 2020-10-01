
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
                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalKirimBaru" onclick="reset()">
                    <li class="fa fa-plus"> Kirim Baru</li>
                  </button>
                  <b class="pull-right xxx" id="keteranganTrue" style="font-size: 23px;color: aqua; display: none">Berhasil Eksekusi :)</b>
                  <b class="pull-right xxx" id="keteranganFalse" style="font-size: 23px;color:red; display: none"></b>
                </div>
              </div>
              <div class="x_content">
                
                <div id="dataOnProg"></div>
              </div>

              <!-- MODAL Bukti Pembayaran -->
              <div class="modal fade" id="modalUploadBuktiPembayaran" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">              
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Upload Bukti Pembayaran </h4>
                      </div>
                      <?php echo form_open_multipart('transaksi/upBukti'); ?>
                        <div class="modal-body">   
                          <input type="hidden" name="idTransaksi" id="idTransaksi">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Gambar Cetak</label>
                                <input type="file" name="gambarBukti" id="gambarBukti"  accept="image/*">
                              </div>
                            </div>
                            <div class="col-md-9">
                              <img id="gambarFilePrev" style="width: 100%">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" id="btn-upload">Upload</button>
                        </div>
                      <?php echo form_close(); ?>
                    </div>
                </div>
              </div>
            </div>
             <?php $this->load->view('footer.php')?>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function() {
      loadTransaksiProg();
    });

    $('#btnKirim').click(function(event) {
      var idVendor  = $('#emailVendor').val();
      var idProduct = $('#prodVendor').val();
      var idTransaksi = $('#idTransaksi').val();
      if (idVendor==null) {alert('Vendor tidak boleh kosong')}
      if (idProduct==null) {alert('Harus pilih product vendor')}
    });

    function loadTransaksiProg() {
      loading(true);
      $.ajax({
        url: url+'transaksi/fetchAllProgTransaksi',
        type: 'GET',
        dataType: 'html',
      })
      .done(function(e) {
      })
      .fail(function() {
        console.log("error");
      })
      .always(function(e) {
        console.log(e);
        $('#dataOnProg').html(e);
        loading(false);
      });
    }

    $('#gambarBukti').change(function() {
      readURL(this);
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#gambarFilePrev').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
</script>