<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No Transaksi</th>
        <th>Tujuan</th>
        <th>Diterima Oleh</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Bahan</th>
        <th>Tgl Kirim</th>
        <th>Tgl Diterima</th>
        <th>Tgl Pelunasan</th>
        <th>Tgl Acc Pembayaran</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($dataTransaksi as $dt) {
                ?>
                    <tr>
                        <td><?php echo $dt->no_transaksi; ?></td> 
                        <td><?php echo $dt->nama_vendor; ?></td>                      
                        <td><?php echo empty($dt->nama_user_vendor) ? '-' : $dt->nama_user_vendor; ?></td>                          
                        <td><?php echo $dt->keterangan ?></td>                      
                        <td><?php echo $dt->jumlah ?></td>                      
                        <td><?php echo $dt->nama_product ?></td>                      
                        <td><?php echo $dt->tgl_kirim ?></td>                      
                        <td><?php echo empty($dt->tgl_proses) ?'-':$dt->tgl_proses ?></td>                      
                        <td><?php echo empty($dt->tgl_pelunasan) ?'-':$dt->tgl_pelunasan ?></td>  
                        <td><?php echo empty($dt->tgl_acc) ?'-':$dt->tgl_acc ?></td>  
                        <td>Rp. <?php echo number_format(($dt->jumlah*$dt->harga),2) ?></td>                    
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
</script>