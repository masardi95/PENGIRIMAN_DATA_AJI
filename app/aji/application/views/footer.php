  <!-- footer content -->
  <footer>
      <div class="pull-right">
          <li class="fa fa-fire"> @TMC_Payment</li> 
      </div>
      <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->

  
  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url() ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- bootstrap-daterangepicker -->
  <script src="<?php echo base_url() ?>assets/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap-datetimepicker -->    
  <script src="<?php echo base_url() ?>assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <!-- Datatables -->
  <script src="<?php echo base_url() ?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url() ?>build/js/custom.min.js"></script>

  <!-- Chart JS -->
  <script src="<?php echo base_url() ?>assets/Chart.js/dist/Chart.min.js"></script>

  <script src="<?php echo base_url() ?>assets/chosen/chosen.jquery.min.js"></script>  
  <script src="<?php echo base_url() ?>assets/master/dropdownMaster.js"></script>  
  <script src="<?php echo base_url() ?>assets/master/modalMaster.js"></script>
  <!-- Switchery -->
  <!-- <script src="<?php echo base_url() ?>assets/switchery/dist/switchery.min.js"></script> -->
  <!-- jQuery Smart Wizard -->
  <!-- <script src="<?php echo base_url() ?>assets/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script> -->


  <script>
    $(document).ready(function() {
      $(".chosen-select").chosen({
        no_results_text: "Data Tidak Ada",
        width: "100%"
      });
    });
  </script>

  <script>
    $('#openProfil').click(function(event) {
      $('#modalEditUser').modal('show');
      var isVendor= "<?php echo $this->session->userdata('isVendor') ? 1 : 0 ?>"
      var id = "<?php echo $this->session->userdata('idUser'); ?>"
      var urlGetUser = '';
      var urlUpdateUser = '';
      if(isVendor>0){
        urlUser = url+'vendor/vendor/getUserVendorById/'+id;
      }else{
        urlUser = url+'kantor/fetchUserKantorById/'+id;
      }
      loading(true);
      $.ajax({
        url: urlUser,
        type: 'GET',
        dataType: 'JSON',
      })
      .done(function(e) {
        console.log(e);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function(e) {
        loading(false);
        if(isVendor==0){
          // kantor
          $('#idUserEdit').val(e.id_user_kantor);
          $('#namaEdit').val(e.nama_user_kantor);
          $('#usernameEdit').val(e.username);
          $('#alamatEdit').val(e.alamat);
        }else{
          $('#idUserEdit').val(e.id_user_vendor);
          $('#namaEdit').val(e.nama_user_vendor);
          $('#usernameEdit').val(e.username);
          $('#groupAlamat').css('display', 'none');
        }
      });      
    });
  </script>


  <script>
    $('#fromEditUser').submit(function(e) {
      e.preventDefault();
      var isVendor= "<?php echo $this->session->userdata('isVendor') ? 1 : 0 ?>"
      var id = "<?php echo $this->session->userdata('idUser'); ?>"
      var urlUpdateUser = '';
      if(isVendor>0){
        urlUpdateUser = url+'UpdateUniversal/updateUserVendor';
      }else{
        urlUpdateUser = url+'UpdateUniversal/updateUserKantor';
      }
      loading(true);
      $.ajax({
        url: urlUpdateUser,
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
      .always(function() {
        loading(false);
        console.log("complete");
      });
      
    });
  </script>