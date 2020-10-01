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
                  <strong><h3><?php echo $title; ?></h3></strong>
                  <b class="pull-right xxx" id="keteranganTrue" style="font-size: 23px;color: aqua; display: none">Berhasil Eksekusi :)</b>
                  <b class="pull-right xxx" id="keteranganFalse" style="font-size: 23px;color:red; display: none"></b>
                </div>
              </div>
              <div class="x_content">
                
                <div id="dataTransaksiDone"></div>
              </div>
            </div>
             <?php $this->load->view('footer.php')?>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function() {
      loadTransaksiDone();
    });

    function loadTransaksiDone() {
      loading(true);
      $.ajax({
        url: url+'transaksi/fetchAllTransaksiSelesai',
        type: 'GET',
        dataType: 'html',
      })
      .done(function(e) {
        console.log(e);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function(e) {
        $('#dataTransaksiDone').html(e);
        loading(false);
      });
      
    }
</script>