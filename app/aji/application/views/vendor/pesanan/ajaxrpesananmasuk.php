<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Gambar</th>
        <th>No Transaksi</th>
        <th>Bahan</th>
        <th>Nama Produk</th>
        <th>Tgl Pesan</th>
        <th>Jumlah</th>
        <th>Dari</th>
        <th>Keterangan</th>
        <th>#</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($pesananMasuk as $dt) {
                ?>
                    <tr>
                        <td>
                            <a title="Lihat Gambar File" href="<?php echo base_url('assets/image/filekirim/') ?><?php echo $dt->nama_gambar ?>" target="_blank">
                                <img src="<?php echo site_url('assets/image/filekirim/') ?><?php echo $dt->nama_gambar; ?>" width="100px">
                            </a>
                        </td>  
                        <td><?php echo $dt->no_transaksi; ?></td> 
                        <td><?php echo $dt->bahan; ?></td>                      
                        <td><?php echo $dt->nama_product; ?></td>                          
                        <td><?php echo $dt->tgl_kirim ?></td>                      
                        <td><?php echo $dt->jumlah ?></td>                      
                        <td><?php echo $dt->nama_user_kantor ?> (<?php echo $dt->nama_kantor ?>)</td>                      
                        <td><?php echo $dt->keterangan ?></td>                      
                        <td>
                            <button class="btn btn-danger" title="Proses pesanan masuk" onclick="proses(<?php echo $dt->id_transaksi; ?>)">
                                <li class="fa fa-plug"></li>
                            </button>
                            <a class="btn btn-info" title="Lihat Gambar File" href="<?php echo base_url('assets/image/filekirim/') ?><?php echo $dt->nama_gambar ?>" target="_blank">
                                <li class="fa fa-eye"></li>
                            </a>
                            <?php if (!empty($dt->nama_file)): ?>
                                <a class="btn btn-primary" title="Download Master File" href="<?php echo base_url('assets/image/filekirim/') ?><?php echo $dt->nama_file ?>">
                                    <li class="fa fa-download"></li>
                                </a>
                            <?php else: ?>
                                <a class="btn btn-primary" title="Download Master File" href="<?php echo $dt->link_external ?>" target="_blank">
                                    <li class="fa fa-download"></li>
                                </a>
                            <?php endif ?>
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

    function proses(idTransaksi) {
        loading(true);
        $.ajax({
            url: url+'vendor/pesanan/prosestransaksi/'+idTransaksi,
            type: 'GET',
            dataType: 'JSON',
        })
        .done(function(e) {
            console.log(e);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            loadPesananMasuk();
            console.log("complete");
        });
        
    }
</script>