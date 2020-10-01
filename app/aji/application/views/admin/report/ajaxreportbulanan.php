<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Bulan Transaksi</th>
        <th>Jumlah</th>
        <th>Diterima</th>
        <th>Selesai</th>
        <th>Satuan</th>
        <th>#</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($dataBulanan as $dt) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td> 
                        <td><?php echo $dt->kirim; ?></td> 
                        <td><?php echo $dt->jum_transaksi ?></td>                      
                        <td><?php echo $dt->diterima ?></td>                      
                        <td><?php echo $dt->selesai ?></td>                      
                        <td><?php echo $dt->satuan ?></td>                       
                        <td>
                            <button class="btn btn-info" title="detail transaksi" onclick="lihatDetail('<?php echo $dt->bulan_kirim ?>')">
                                <li class="fa fa-search"></li>
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

    function lihatDetail(tglKirim) {
        console.log(tglKirim);
        loading(true);
        $.ajax({
            url: url+'report/detailtransaksi/'+tglKirim,
            type: 'GET',
            dataType: 'HTML',
        })
        .done(function(e) {
            $('#dataDetail').html('');
            $('#dataDetail').html(e);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            loading(false);
            $('#modalDetailTransaksi').modal('show');    
            console.log("complete");
        });        
    }
</script>