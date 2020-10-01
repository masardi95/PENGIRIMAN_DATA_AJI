
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
                  <a href="<?php echo base_url('report/cetakbulanan') ?>" target="_BLANK" class="pull-right"> 
                    <button class="btn btn-primary pull-right">
                      <li class="fa fa-print">&nbsp;Cetak Laporan</li>
                    </button>
                  </a>
                </div>
              </div>
              <div class="x_content">                
                <div id="dataReportHarian"></div>
              </div>

              <!-- MODAL MODAL -->
              <div class="modal fade" id="modalDetailTransaksi" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content md-lg">
                      <div class="modal-header">              
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Detail Transaksi</h4>
                      </div>                        
                      <div class="modal-body">    
                        <div class="row">
                          <div id="dataDetail"></div>
                        </div>            
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Ok</button>
                      </div>
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
      loadData();
    });

    function loadData() {
      loading(true)
      $.ajax({
        url: url+'report/ajaxreportbulanan',
        type: 'GET',
        dataType: 'HTML',
      })
      .done(function() {
        loading(false);
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function(e) {
        $('#dataReportHarian').html(e);
      });
      
    }
</script>