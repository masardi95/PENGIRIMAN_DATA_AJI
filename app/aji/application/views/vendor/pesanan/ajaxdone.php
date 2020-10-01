<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Gambar</th>
        <th>No Transaksi</th>
        <th>Bahan</th>
        <th>Nama Produk</th>
        <th>Tgl Pesan</th>
        <th>Tgl Proses</th>
        <th>Tgl Pelunasan</th>
        <th>Tgl Acc Pembayaran</th>
        <th>Jumlah</th>
        <th>Dari</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($pesananMasuk as $dt) {
                ?>
                    <tr>
                        <td>
                          <img src="<?php echo site_url('assets/image/filekirim/') ?><?php echo $dt->nama_gambar; ?>" width="100px">
                        </td>  
                        <td><?php echo $dt->no_transaksi; ?></td> 
                        <td><?php echo $dt->bahan; ?></td>                      
                        <td><?php echo $dt->nama_product; ?></td>                          
                        <td><?php echo $dt->tgl_kirim ?></td>                      
                        <td><?php echo $dt->tgl_proses ?></td>                      
                        <td><?php echo $dt->tgl_pelunasan ?></td>                      
                        <td><?php echo $dt->tgl_acc ?></td>                      
                        <td><?php echo $dt->jumlah ?></td>                      
                        <td><?php echo $dt->nama_user_kantor ?> (<?php echo $dt->nama_kantor ?>)</td>                      
                        <td><?php echo $dt->keterangan ?></td>                                                            
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