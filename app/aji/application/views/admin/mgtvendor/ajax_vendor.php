<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>email</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>#</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($dataVendor as $dt) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $dt->nama_vendor; ?></td>
                        <td><?php echo $dt->email_vendor; ?></td>
                        <td><?php echo $dt->alamat_vendor; ?></td>
                        <td>
                          <?php echo $dt->deleted < 1 ? 
                          '<button class="btn btn-success btn-sm">Aktif</button>' 
                          : 
                          '<button class="btn btn-warning btn-sm">Terhapus</button>' 
                          ?>
                        </td>
                        <td>
                          <button class="btn btn-primary" title="Edit" onclick="update(<?php echo $dt->id_vendor; ?>)">
                            <i class="fa fa-pencil"></i>
                          </button>
                          <?php 
                            if ($dt->deleted < 1) {
                              ?>                                
                                <button class="btn btn-danger" title="Hapus Vendor" onclick="hapus(<?php echo $dt->id_vendor; ?>, '<?php echo $dt->nama_vendor; ?>')">
                                  <i class="fa fa-trash"></i>
                                </button>
                              <?php
                            }else{
                              ?>                                
                                <button class="btn btn-success" title="Aktifkan Vendor" onclick="aktifkan(<?php echo $dt->id_vendor; ?>)">
                                  <i class="fa fa-check"></i>
                                </button>
                              <?php
                            }
                          ?>
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
        url: url+'mgtvendor/getvendorbyid/'+id,
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
        $('#idVendor').val(e.id_vendor);
        $('#namaVendor').val(e.nama_vendor);
        $('#emailVendor').val(e.email_vendor);
        $('#alamatVendor').val(e.alamat_vendor);
        $('#modalVendor').modal('show');
      });
    }

    function hapus(id, nama) {
      var ya = confirm("Yakin mau hapus Vendor  "+nama+" ?");
      if (ya) {
        loading(true);
        $.ajax({
          url: url+'mgtvendor/hapusvendorbyid/'+id,
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
            loadVendor();
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
          url: url+'mgtvendor/aktifkanvendorbyid/'+id,
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
            loadVendor();
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