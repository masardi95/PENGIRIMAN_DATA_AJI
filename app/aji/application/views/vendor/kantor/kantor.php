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
                <?php echo form_open_multipart('vendor/vendor/dovendor'); ?>
                <input type="hidden" name="idVendor" id="idVendor" value="<?php echo $vendor->id_vendor ?>">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama Vendor</label>
                          <input type="text" class="form-control" name="namaVendor" id="namaVendor" required value="<?php echo $vendor->nama_vendor ?>">
                        </div>
                        <div class="form-group">
                          <label>Email Kantor</label>
                          <input type="email" class="form-control" name="emailVendor" id="emailVendor" required value="<?php echo $vendor->email_vendor ?>">
                        </div>
                        <div class="form-group">
                          <label>Alamat Kantor</label><br>
                          <textarea id="alamatVendor" name="alamatVendor" style="width: 100%"><?php if(!empty($vendor->alamat_vendor)) echo $vendor->alamat_vendor; ?></textarea>
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