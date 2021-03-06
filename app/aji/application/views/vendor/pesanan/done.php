
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
                <div id="dataPesananDone"></div>
              </div>
            </div>
             <?php $this->load->view('footer.php')?>
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
        url: url+'vendor/pesanan/ajaxpesanandone',
        type: 'GET',
        dataType: 'html',
      })
      .done(function(e) {
        $('#dataPesananDone').html(e);
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