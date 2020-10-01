<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Alamat</th>
        <th>Status</th>
        <?php if ($this->session->userdata('level')>1): ?>
          <th>#</th>
        <?php endif ?>
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($userKantor as $dt) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $dt->nama_user_kantor; ?></td>
                        <td><?php echo $dt->username; ?></td>
                        <td><?php echo $dt->alamat; ?></td>
                        <td>
                          <?php echo $dt->deleted < 1 ? 
                          '<button class="btn btn-success btn-sm">Aktif</button>' 
                          : 
                          '<button class="btn btn-warning btn-sm">Terhapus</button>' 
                          ?>
                        </td>
                        <?php 
                          if($this->session->userdata('level')>1){
                        ?>
                        <td>
                          <button class="btn btn-primary" title="Edit" onclick="update(<?php echo $dt->id_user_kantor; ?>)">
                            <i class="fa fa-pencil"></i>
                          </button>
                          <?php 
                            if ($dt->deleted < 1) {
                              if ($this->session->userdata('idUser') != $dt->id_user_kantor && $dt->level_kantor < 2) {
                                ?>                                
                                  <button class="btn btn-danger" title="Hapus Vendor" onclick="hapus(<?php echo $dt->id_user_kantor; ?>, '<?php echo $dt->nama_user_kantor; ?>')">
                                    <i class="fa fa-trash"></i>
                                  </button>
                                <?php
                              }
                            }else{
                              ?>                                
                                <button class="btn btn-success" title="Aktifkan Vendor" onclick="aktifkan(<?php echo $dt->id_user_kantor; ?>)">
                                  <i class="fa fa-check"></i>
                                </button>
                              <?php
                            }
                          ?>
                        </td>
                      <?php } ?>
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
        url: url+'kantor/fetchUserKantorById/'+id,
        type: 'GET',
        dataType: 'JSON',
      })
      .done(function(e) {
      })
      .fail(function() {
        console.log("error");
      })
      .always(function(e) {
        loading(false);
        $('#idUser').val(e.id_user_kantor);
        $('#nama').val(e.nama_user_kantor);
        $('#username').attr('disabled', true);
        $('#username').val(e.username);
        $('#pass').attr('disabled', true);
        $('#pass').val('');
        $('#alamat').val(e.alamat);
        if(e.level_kantor=="2"){
          $("#levelKantor").prop( "checked", true );
        }else{
          $("#levelKantor").prop( "checked", false );
        }
        $('#modalUser').modal('show');
      });
    }

    function hapus(id, nama) {
      var ya = confirm("Yakin mau hapus User  "+nama+" ?");
      if (ya) {
        loading(true);
        $.ajax({
          url: url+'kantor/onOffUserKantor/1/'+id,
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
            loadUser();
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

    function aktifkan(id) {
      var ya = confirm("Aktifkan kembali ??");
      if (ya) {
        loading(true);
        $.ajax({
          url: url+'kantor/onOffUserKantor/0/'+id,
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
            loadUser();
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