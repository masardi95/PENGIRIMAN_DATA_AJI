<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Tgl Transaksi</th>
        <th>Pending</th>
        <th>Diterima</th>
        <th>Selesai</th>
        <th>Total Anggaran</th>
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
                        <td><?php echo $dt->pending; ?></td> 
                        <td><?php echo $dt->diterima ?></td>                      
                        <td><?php echo $dt->selesai ?></td>                      
                        <td>Rp. <?php echo number_format($dt->tot_anggaran) ?></td>                   
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

    function lihatDetail(bulanKirim) {
        var filterPending = $('#input_pending').val();
        var filterProg = $('#input_onprogress').val();
        var filterDone = $('#input_done').val();
        loading(true);

        $.ajax({
            // url: url+'report/detailtransaksi/'+tglKirim,
            url: url+'report/detailTransaksiBulanan',
            type: 'POST',
            dataType: 'HTML',
            data : {
                'bulanKirim' : bulanKirim,
                'filterPending'   : filterPending,
                'filterProg'   : filterProg,
                'filterDone'   : filterDone
            }
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