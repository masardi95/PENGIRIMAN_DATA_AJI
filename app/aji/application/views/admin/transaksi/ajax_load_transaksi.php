<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No Transaksi</th>
        <th>Gambar</th>
        <th>Tujuan</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Bahan</th>
        <th>Tgl Kirim</th>
        <th>#</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($dataTransaksi as $dt) {
                ?>
                    <tr>
                        <td><?php echo $dt->no_transaksi; ?></td>
                        <td>
                          <img src="<?php echo site_url('assets/image/filekirim/') ?><?php echo $dt->nama_gambar; ?>" width="100px">
                        </td>  
                        <td><?php echo $dt->nama_vendor; ?></td>                      
                        <td><?php echo $dt->status; ?></td>                      
                        <td><?php echo $dt->keterangan ?></td>                      
                        <td><?php echo $dt->jumlah ?></td>                      
                        <td><?php echo $dt->nama_product ?></td>                      
                        <td><?php echo $dt->tgl_kirim ?></td>                      
                        <td>
                          <?php  
                            if (empty($dt->id_user_vendor)) {
                              ?>
                                <button class="btn btn-info" title="edit" onclick="update(<?php echo $dt->id_transaksi ?>)">
                                  <li class="fa fa-pencil"></li>
                                </button>
                              <?php
                            } else {
                              ?>
                                <button class="btn btn-info" disabled title="Tidak dapat di edit">
                                  <li class="fa fa-pencil"></li>
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
        url: url+'transaksi/gettransaksibyid/'+id,
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
        $('#idTransaksi').val(e.id_transaksi);
        $('#emailVendor').val(e.id_vendor);  
        $('#jumCetak').val(e.jumlah);
        $('#ket').val(e.keterangan);
        $('#linkExternal').val(e.link_external);
        ddUpdateProductVendorById(e.id_vendor, e.id_product)
        $("#gambarFilePrev").attr("src",url+"assets/image/filekirim/"+e.nama_gambar);
        $('#emailVendor').trigger("chosen:updated");
        $('#modalKirimBaru').modal('show');
        loading(false);
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