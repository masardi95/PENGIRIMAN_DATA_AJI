<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Bahan</th>
        <th>Ukuran</th>
        <th>Harga</th>
        <th>#</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($dataProduk as $dt) {
                ?>
                    <tr> 
                        <td><?php echo $no; ?></td> 
                        <td><?php echo $dt->nama_product; ?></td>                          
                        <td><?php echo $dt->bahan ?></td>                      
                        <td><?php echo $dt->ukuran ?></td>                      
                        <td><?php echo $dt->harga ?></td>                      
                        <td>
                            <button class="btn btn-info" title="Edit" onclick="update(<?php echo $dt->id_product; ?>)">
                                <li class="fa fa-pencil"></li>
                            </button>
                            <button class="btn btn-danger" title="Hapus" onclick="hapus(<?php echo $dt->id_product; ?>,'<?php echo $dt->nama_product ?>')">
                                <li class="fa fa-trash"></li>
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

    function update(id_product) {
        loading(true);
        $.ajax({
            url: url+'vendor/produk/getprodukbyid/'+id_product,
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
            $('#idProduct').val(e.id_product);
            $('#namaProduct').val(e.nama_product);
            $('#harga').val(e.harga);
            $('#ukuran').val(e.ukuran);
            $('#bahan').val(e.bahan);
            $('#modalProduct').modal('show');
        });        
    }

    function hapus(id, nama) {
      var ya = confirm("Yakin mau hapus  "+nama+" ?");
      if (ya) {
        loading(true);
        $.ajax({
          url: url+'vendor/produk/hapus/'+id,
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
            loadProduk();
            $('#keteranganTrue').css('display', 'block');
          }else{
            $('#keteranganFalse').css('display', 'block');
          }
          loading(false);
        });
        setTimeout(function () {
          $('.xxx').css('display', 'none');
        },4000) 
      }
    }
</script>