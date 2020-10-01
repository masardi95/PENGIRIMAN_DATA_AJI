<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Nama User</th>
        <th>Nama Vendor</th>
        <th>Status</th>
        <th>#</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($dataUserVendor as $dt) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $dt->username; ?></td>
                        <td><?php echo $dt->nama_user_vendor; ?></td>
                        <td><?php echo $dt->nama_vendor; ?></td>
                        <td>
                          <?php echo $dt->deleted < 1 ? 
                          '<button class="btn btn-success btn-sm">Aktif</button>' 
                          : 
                          '<button class="btn btn-warning btn-sm">Terhapus</button>' 
                          ?>
                        </td>
                        <td>
                          <button class="btn btn-primary" title="edit" onclick="update(<?php echo $dt->id_user_vendor; ?>)">
                            <i class="fa fa-pencil"></i>
                          </button>
                          <?php 
                            if ($dt->deleted < 1) {
                              ?>
                                <button class="btn btn-danger" title="hapus akun" onclick="hapus(<?php echo $dt->id_user_vendor; ?>, '<?php echo $dt->nama_vendor; ?>')">
                                  <i class="fa fa-trash"></i>
                                </button>
                              <?php
                            }else{
                              ?>
                                <button class="btn btn-success" title="aktifkan" onclick="aktifkan(<?php echo $dt->id_user_vendor; ?>, '<?php echo $dt->nama_vendor; ?>')">
                                  <i class="fa fa-check"></i>
                                </button>
                              <?php
                            }
                          ?>
                          
                          <button class="btn btn-info" title="reset password" onclick="resetpw(<?php echo $dt->id_user_vendor; ?>)">
                            <i class="fa fa-refresh"></i>
                          </button>
                        </td>
                    </tr>
                <?php
            $no++;
            }
        ?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $('#datatable-buttons').DataTable();
    });

    function update(id){
      loading(true);
      $.ajax({
        url: url+'mgtvendor/getUserVendorById/'+id,
        type: 'GET',
        dataType: 'JSON',
      })
      .done(function(e) {
      })
      .fail(function() {
        console.log("error");
      })
      .always(function(e) {
        console.log(e);
        loading(false);
        $('#idUserVendor').val(e.id_user_vendor);
        $('#namaUser').val(e.nama_user_vendor);
        $('#username').val(e.username);
        $('#pass').val('');
        $("#pass").prop('disabled', true);
        $('#vendor').val(e.id_vendor);
        $('#vendor').trigger("chosen:updated");
        $('#modalUserVendor').modal('show');
      });
    }

    function hapus(id, nama) {
      var ya = confirm("Yakin mau hapus User Vendor  "+nama+" ?");
      if (ya) {
        loading(true);
        $.ajax({
          url: url+'mgtvendor/hapususervendorbyid/'+id,
          type: 'GET',
          dataType: 'JSON',
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function(e) {
          if (e.result) {
            loadUserVendor();
            $('#keteranganTrue').css('display', 'block');
          }else{
            $('#keteranganFalse').css('display', 'block');
          }
        });
        setTimeout(function () {
          $('.xxx').css('display', 'none');
        },4000) 
      }
    }

    function aktifkan(id, nama) {
      var ya = confirm("Yakin mau Aktifkan kembali User Vendor  "+nama+" ?");
      if (ya) {
        loading(true);
        $.ajax({
          url: url+'mgtvendor/aktifkanuservendorbyid/'+id,
          type: 'GET',
          dataType: 'JSON',
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function(e) {
          if (e.result) {
            loadUserVendor();
            $('#keteranganTrue').css('display', 'block');
          }else{
            $('#keteranganFalse').css('display', 'block');
          }
        });
        setTimeout(function () {
          $('.xxx').css('display', 'none');
        },4000) 
      }
    }

    function resetpw(id) {
      var ya = confirm("Password akan direset ke password default (123456)");
      if (ya) {
        loading(true);
        $.ajax({
          url: url+'mgtvendor/resetpwuservendor/'+id,
          type: 'GET',
          dataType: 'JSON',
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function(e) {
          if (e.result) {
            loadUserVendor();
            $('#keteranganTrue').css('display', 'block');
          }else{
            $('#keteranganFalse').css('display', 'block');
          }
        });
        setTimeout(function () {
          $('.xxx').css('display', 'none');
        },4000) 
      }
    }
</script>