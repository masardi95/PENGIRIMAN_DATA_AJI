<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No Transaksi</th>
        <th>Gambar</th>
        <th>Tujuan</th>
        <th>Diterima Oleh</th>
        <th>Keterangan</th>
        <th>Jumlah (tot byr)</th>
        <th>Bahan</th>
        <th>Tgl Kirim</th>
        <th>Tgl Diterima</th>
        <th>Tgl Selesai</th>
        <th style="background: wheat;">Status</th>
        <th>Bukti Pembayaran</th>
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
                            <a title="Lihat Gambar File" href="<?php echo base_url('assets/image/filekirim/') ?><?php echo $dt->nama_gambar ?>" target="_blank">
                                <img src="<?php echo site_url('assets/image/filekirim/') ?><?php echo $dt->nama_gambar; ?>" width="100px">
                            </a>
                        </td>  
                        <td><?php echo $dt->nama_vendor; ?></td>                      
                        <td><?php echo empty($dt->nama_user_vendor) ? '-' : $dt->nama_user_vendor; ?></td>                      
                        <td><?php echo $dt->keterangan ?></td>  
                        <td><?php echo $dt->jumlah ?> (Rp <?php echo number_format($dt->harga * $dt->jumlah)?>)</td>                    
                        <td><?php echo $dt->nama_product ?></td>                      
                        <td><?php echo $dt->tgl_kirim ?></td>                      
                        <td><?php echo empty($dt->tgl_proses) ?'-':$dt->tgl_proses ?></td>                      
                        <td><?php echo empty($dt->tgl_selesai) ?'-':$dt->tgl_selesai ?></td>                      
                        <td style="background: wheat;"> <?php  echo $dt->status; ?> </td>                      
                        <td>
                            <?php
                                if (empty($dt->tgl_selesai)) {
                                    ?>
                                        <button class="btn btn-info" title="upload bukti Pembayaran" disabled>
                                            <li class="fa fa-upload"></li>
                                        </button>
                                    <?php
                                 } else if (!empty($dt->bukti_pembayaran)) {
                                    ?>
                                        <img src="<?php echo site_url('assets/image/bukti/') ?><?php echo $dt->bukti_pembayaran; ?>" width="100px">
                                        <!-- <button class="btn btn-info" title="upload bukti Pembayaran" onclick="upload(<?php echo $dt->id_transaksi ?>)">
                                            <li class="fa fa-upload"></li>
                                        </button> -->
                                    <?php
                                 }else{
                                    ?>
                                        <button class="btn btn-info" title="upload bukti Pembayaran" onclick="upload(<?php echo $dt->id_transaksi ?>)">
                                            <li class="fa fa-upload"></li>
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

    function upload(idTransaksi) {
        $('#idTransaksi').val(idTransaksi);
        $('#modalUploadBuktiPembayaran').modal('show');
    }

</script>