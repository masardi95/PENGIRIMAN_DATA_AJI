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
                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalVendor" onclick="reset()">
                    <li class="fa fa-plus"> Vendor</li>
                  </button>
                  <b class="pull-right xxx" id="keteranganTrue" style="font-size: 23px;color: aqua; display: none">Berhasil Eksekusi :)</b>
                  <b class="pull-right xxx" id="keteranganFalse" style="font-size: 23px;color:red; display: none"></b>
                </div>
              </div>
              <div class="x_content">
                <div id="dataVendor"></div>
              </div>
            </div>
             <?php $this->load->view('footer.php')?>
        </div>


        <!-- MODAL MODAL C U VENDOR -->
        <div class="modal fade" id="modalVendor" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">              
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title">Data Vendor</h4>
                </div>
                <form id="formVendor">
                  <div class="modal-body">    
                    <input type="hidden" name="idVendor" id="idVendor">
                    <div class="form-group">
                      <label>Nama Vendor</label>
                      <input type="text" class="form-control" name="namaVendor" id="namaVendor" required>
                    </div> 
                    <div class="form-group">
                      <label>Email Vendor</label>
                      <input type="email" class="form-control" name="emailVendor" id="emailVendor" required>
                    </div> 
                    <div class="form-group">
                      <label>Alamat Vendor</label>
                      <input type="text" class="form-control" name="alamatVendor" id="alamatVendor" required>
                    </div>                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" >Simpan</button>
                  </div>
                </form>
              </div>
          </div>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function() {
      loadVendor();
    });

    function loadVendor() {
      loading(true);
      $.ajax({
        url: url+'mgtvendor/ajaxfetchallvendor',
        type: 'GET',
        dataType: 'html',
      })
      .done(function() {
      })
      .always(function(e) {
        $('#dataVendor').html(e);
        loading(false);
      });
      
    }

    $('#formVendor').submit(function(e) {
      e.preventDefault();
      $('#modalVendor').modal('hide');
      loading(true);
      $.ajax({
        url: url+'mgtvendor/doData',
        type: 'POST',
        dataType: 'JSON',
        data:$(this).serialize(),
      })
      .done(function() {
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function(e) {
        if (e.result) {
          loadVendor();
          reset();
          $('#keteranganTrue').css('display', 'block');
        }else{
          alert(e.message);
          $('#keteranganFalse').css('display', 'block');
        }
        loading(false);
      });
      setTimeout(function () {
        $('.xxx').css('display', 'none');
      },4000) 
    });

    function reset() {
      $('#idVendor').val('');
      $('#namaVendor').val('');
      $('#emailVendor').val('');
      $('#alamatVendor').val('');
    }
</script>