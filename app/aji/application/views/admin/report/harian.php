
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
                  <!-- <button class="btn btn-primary pull-right"> --> 

                  <!-- </button> -->
                  <b class="pull-right xxx" id="keteranganTrue" style="font-size: 23px;color: aqua; display: none">Berhasil Eksekusi :)</b>
                  <b class="pull-right xxx" id="keteranganFalse" style="font-size: 23px;color:red; display: none"></b>
                </div>
                <div class="col-md-12">
                  <form id="formFilter">
                    <input type="hidden" id="input_pending" value="">
                    <input type="hidden" id="input_onprogress" value="">
                    <input type="hidden" id="input_done" value="">
                    <div class='col-sm-4'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker6'>
                                <input type='text' class="form-control" id="date_awal" name="date_awal" placeholder="tanggal awal" required />
                                <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-4'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker7'>
                                <input type='text' class="form-control" id="date_akhir" name="date_akhir" placeholder="tanggal akhir" required />
                                <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <div class="checkbox">
                          <label><input id="pending" name="pending" type="checkbox" value="1">Pending</label>&nbsp;&nbsp;&nbsp;
                          <label><input id="onprogress" name="onprogress" type="checkbox" value="1">On Progress</label>&nbsp;&nbsp;&nbsp;
                          <label><input id="done" name="done" type="checkbox" value="1">Selesai</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <button type="submit" class="btn btn-info"><li class="fa fa-search">Search</li></button>
                      <a class="btn btn-primary" id="btnCetakAll"><li class="fa fa-print">Cetak</li></a>
                    </div>
                  </form>
                </div>
              </div>
              <div class="x_content">                
                <div id="dataReportHarian"></div>    
                <div id="dataPrint"></div>
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
      // loadData();
    });

    function loadData() {
      loading(true)
      $.ajax({
        url: url+'report/ajaxreportharian',
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

<script>
  $('input:checkbox').click(function(e) {
    var $this = $(this);
    var id = $this.attr('id');
    if($this.is(":checked")){
      $('#input_'+id).val('1');
    }else{
      $('#input_'+id).val('');
    }
  });
</script>

<script>
  $('#formFilter').submit(function(e) {
    /* Act on the event */
    e.preventDefault();
    console.info('kiriman', $(this).serialize());
    loading(true)

    $.ajax({
      url: url+'report/ajaxReportHarian',
      type: 'post',
      dataType: 'html',
      data:  $(this).serialize(),
    })
    .done(function() {
        loading(false);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function(e) {
      console.log("error");
      $('#dataReportHarian').html(e);
    });
    
  });
</script>


<script>
    $('#datetimepicker6').datetimepicker();    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>

<script>
  $('#btnCetakAll').click(function(event) {
    $.ajax({
      url: url+'report/cetakHarian',
      type: 'post',
      dataType: 'json',
      data:  $('#formFilter').serialize(),
    })
    .done(function() {
        loading(false);
    })
    .fail(function(e) {
    })
    .always(function(e) {
      var w = window.open('about:blank');
      w.document.open();
      w.document.write(e.responseText);
      w.document.close();
    });
  });
</script>