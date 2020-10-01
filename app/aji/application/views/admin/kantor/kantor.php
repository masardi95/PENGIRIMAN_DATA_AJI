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
                  <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalVendor" onclick="reset()">
                    <li class="fa fa-plus"> Vendor</li>
                  </button> -->
                  <b class="pull-right xxx" id="keteranganTrue" style="font-size: 23px;color: aqua; display: none">Berhasil Eksekusi :)</b>
                  <b class="pull-right xxx" id="keteranganFalse" style="font-size: 23px;color:red; display: none"></b>
                </div>
              </div>
              <div class="x_content">
                <?php echo form_open_multipart('kantor/dokantor'); ?>
                <input type="hidden" name="idKantor" id="idKantor" value="<?php echo $dataKantor->id_kantor ?>">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-md-4">
                        <div class="center">
                          <?php
                          if (empty($dataKantor->logo)) {
                             ?>
                              <img id="logoDb" src="<?php echo site_url('assets/image/75.png') ?>" style="width: 100%">
                             <?php
                           } else {
                             ?>
                              <img id="logoDb" src="<?php echo site_url('assets/image/logo/')?><?php echo $dataKantor->logo; ?>" style="width: 100% ">
                             <?php
                           }
                            
                          ?>
                          <br>
                          <input type="file" name="logo" id="logo" title="ganti logo" accept="image/*">
                        </div>                        
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama Kantor</label>
                          <input type="text" class="form-control" name="namaKantor" id="namaKantor" required value="<?php echo $dataKantor->nama_kantor ?>">
                        </div>
                        <div class="form-group">
                          <label>Email Kantor</label>
                          <input type="email" class="form-control" name="emailKantor" id="emailKantor" required value="<?php echo $dataKantor->email_kantor ?>">
                        </div>
                        <div class="form-group">
                          <label>Alamat Kantor</label><br>
                          <textarea id="alamatKantor" name="alamatKantor" style="width: 100%"><?php if(!empty($dataKantor->alamat_kantor)) echo $dataKantor->alamat_kantor; ?></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary text-align-last">Simpan</button>
                      </div>                  
                    </div>
                  </div>  
                <?php echo form_close(); ?>
              </div>
            </div>
             <?php $this->load->view('footer.php')?>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function() {
    });

    $('#logo').change(function() {
      readURL(this);
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#logoDb').attr('src', e.target.result);
          console.log(e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
</script>