<!DOCTYPE html>
<html lang="en">
<head>
  <title>LOGIN || AJI</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="<?php echo base_url() ?>assets/image/loading.gif" alt="IMG" id="logoDb">
        </div>

        <form class="login100-form validate-form" id="form_login">
          <span class="login100-form-title">
            ~~Form Login~~
            <p id="notifGagal" style="display: none;">Gagal Login, cek username / password</p>
          </span>

          <!-- <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz" > -->
          <div class="wrap-input100" data-validate = "Valid email is required: ex@abc.xyz" >
            <input class="input100" type="text" name="username" placeholder="username" >
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="pass" placeholder="Password" >
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">
              <!-- Forgot -->
            </span>
            <i class="txt2" href="#">
              <input type="checkbox" name="isVendor" value="1"> 
              Karyawan vendor
              <!-- Username / Password? -->
            </i>
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="#">
              <!-- Create your Account -->
              <!-- <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i> -->
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
  <script src="<?php echo base_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>assets/login/js/main.js"></script>

</body>
</html>

<script>
  $(document).ready(function() {
    var url = '<?php echo site_url() ?>';
    ambilLogo();
  });
  $('#form_login').submit(function(e) {
    e.preventDefault();
    console.groupCollapsed('LOGIN');
    console.log($('#username').val());
    console.log($('#pass').val());
    console.groupEnd();
    $.ajax({
      url: '<?php echo site_url('auth/cek_login') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: $(this).serialize(),
    })
    .done(function() {
      // console.log("success");
    })
    .fail(function() {
      // console.log("error");
    })
    .always(function(e) {
      if (e.result) {
        location.reload();
      }else{
        $('#notifGagal').css('display', 'block');        
        setInterval(function(){ 
          $('#notifGagal').css('display', 'none');        
        }, 5000);
      }
      console.log(e);
    });
  });

  function ambilLogo() {
    $.ajax({
      url: '<?php echo site_url('auth/ambilLogo') ?>',
      type: 'GET',
      dataType: 'JSON',
    })
    .done(function(e) {
      if (e.Logo != '') {
        $('#logoDb').attr('src', '<?php echo site_url('assets/image/logo/') ?>'+e.logo);
      }
      console.log(e);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }
</script>

</body>
</html>