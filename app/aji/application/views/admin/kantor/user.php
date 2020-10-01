
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
                  <?php if ($this->session->userdata('level')>1): ?>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalKirimBaru" onclick="reset()">
                      <li class="fa fa-plus"> User</li>
                    </button>
                  <?php endif ?>
                  
                  <b class="pull-right xxx" id="keteranganTrue" style="font-size: 23px;color: aqua; display: none"></b>
                  <b class="pull-right xxx" id="keteranganFalse" style="font-size: 23px;color:red; display: none"></b>
                </div>
              </div>
              <div class="x_content">                
                <div id="dataUser"></div>
              </div>

              <!-- MODAL MODAL -->
              <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content md-md">
                      <div class="modal-header">              
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">User Kantor</h4>
                      </div>  
                        <form id="fromUser">
                        <div class="modal-body">    
                          <input type="hidden" name="idUser" id="idUser">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Nama</label>
                                  <input type="text" class="form-control" name="nama" id="nama" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Username</label>
                                  <input type="text" class="form-control" name="username" id="username" required maxlength="10">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Password</label>
                                  <input type="password" class="form-control" name="pass" id="pass" required>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Alamat</label>
                                  <input type="text" class="form-control" name="alamat" id="alamat" required>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Set Super Admin &nbsp;</label>
                                  <input type="checkbox" name="levelKantor" id="levelKantor" value="2">
                                </div>
                              </div>
                            </div>
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
             <?php $this->load->view('footer.php')?>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function() {
      loadUser();
    });

    $('#fromUser').submit(function(e) {
      e.preventDefault();
      loading(true);
      $.ajax({
        url: url+'kantor/douserkantor',
        type: 'POST',
        dataType: 'JSON',
        data: $(this).serialize(),
      })
      .done(function(e) {
        console.log(e);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function(e) {
        $('#modalUser').modal('hide');
        if (e.result) {
          loadUser();
          $('#keteranganTrue').css('display', 'block');
          $('#keteranganTrue').html(e.message);
        }else{
          loading(false);
          $('#keteranganFalse').css('display', 'block');
          $('#keteranganFalse').html(e.message);
        }
      });
      setTimeout(function () {
        $('.xxx').css('display', 'none');
      },4000) 
    });

    function loadUser() {
      loading(true)
      $.ajax({
        url: url+'kantor/fetchUserAktif',
        type: 'GET',
        dataType: 'HTML',
      })
      .done(function(e) {
        loading(false);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function(e) {
        $('#dataUser').html(e);
      });
    }

    function reset() {
      $('#modalUser').modal('show');
      $('#idUser').val('');
      $('#nama').val('');
      $('#username').attr('disabled', false);
      $('#username').val('');
      $('#pass').attr('disabled', false);
      $('#pass').val('');
      $('#alamat').val('');
      $("#levelKantor").prop( "checked", false );
    }
</script>