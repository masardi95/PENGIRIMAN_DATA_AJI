
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
                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalProduct" onclick="reset()">
                    <li class="fa fa-plus"> Produk</li>
                  </button>
                  <b class="pull-right xxx" id="keteranganTrue" style="font-size: 23px;color: aqua; display: none">Berhasil Eksekusi :)</b>
                  <b class="pull-right xxx" id="keteranganFalse" style="font-size: 23px;color:red; display: none"></b>
                </div>
              </div>
              <div class="x_content">                
                <div id="dataProduk"></div>
              </div>

              <!-- MODAL MODAL C U VENDOR -->
              <div class="modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content md-md">
                      <div class="modal-header">              
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Produk</h4>
                      </div>
                      <form id="formProduct">
                        <div class="modal-body">    
                          <input type="hidden" name="idProduct" id="idProduct">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Nama Product</label>
                                  <input type="text" class="form-control" name="namaProduct" id="namaProduct" required>
                                </div> 
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Nama Bahan</label>
                                  <input type="text" class="form-control" name="bahan" id="bahan" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Ukuran m<sup>2</sup></label>
                                  <input type="number" class="form-control" name="ukuran" id="ukuran" min="1" max="100" value="1" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Harga (Rp)</label>
                                  <input type="number" class="form-control" name="harga" id="harga" min="1" max="999999999" value="0" required>
                                </div>
                              </div>
                            </div>
                          </div>           
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" id="btnKirim">Simpan</button>
                        </div>
                      </form>
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
      loadProduk();
    });

    $('#formProduct').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: url+'vendor/produk/doproduk',
        type: 'POST',
        dataType: 'JSON',
        data: $(this).serialize(),
      })
      .done(function(e) {
        $('#modalProduct').modal('hide');
        loadProduk();
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });      
    });

    function loadProduk() {
      loading(true);
      $.ajax({
        url: url+'vendor/produk/fetchProdukVendor',
        type: 'GET',
        dataType: 'html',
      })
      .done(function(e) {
        $('#dataProduk').html(e);
      })
      .fail(function(e) {
        console.log(e);
      })
      .always(function() {
        loading(false);
        // console.log("complete");
      });
    }

    function reset() {
      $('#idProduct').val('');
      $('#namaProduct').val('');
      $('#harga').val('');
      $('#ukuran').val('');
      $('#bahan').val('');
    }
</script>