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
        <th>Ukuran (P x l)</th>
        <th>Jumlah</th>
        <th>Total Bayar</th>
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
                          <img src="<?php echo site_url('assets/image/filekirim/') ?><?php echo $dt->nama_gambar; ?>" width="100px">
                        </td>  
                        <td><?php echo $dt->no_transaksi; ?></td> 
                        <td><?php echo $dt->bahan; ?></td>                      
                        <td><?php echo $dt->nama_product; ?></td>                          
                        <td><?php echo $dt->tgl_kirim ?></td>                      
                        <td><?php echo $dt->tgl_proses ?></td>                      
                        <td><?php echo empty($dt->tgl_pelunasan)?'-':$dt->tgl_pelunasan ?></td>                      
                        <td><?php echo $dt->panjang ." x ".$dt->lebar ?></td>  
                        <td><?php echo $dt->jumlah ?></td>  
                        <td><?php echo "Rp. ".number_format($dt->panjang * $dt->lebar * $dt->harga * $dt->jumlah)?></td>                   
                        <td><?php echo $dt->nama_user_kantor ?> (<?php echo $dt->nama_kantor ?>)</td>                      
                        <td><?php echo $dt->keterangan ?></td>                      
                        <td>
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
                            <?php
                                if (empty($dt->tgl_selesai)) {
                                     ?>
                                        <button class="btn btn-danger" title="Selesai" onclick="proses(<?php echo $dt->id_transaksi; ?>)">
                                            <li class="fa fa-check"></li>
                                        </button>
                                     <?php
                                 } else if (!empty($dt->bukti_pembayaran)) {
                                     ?>
                                        <button class="btn btn-info" title="Lihat Bukti" onclick="lihatBukti('<?php echo $dt->bukti_pembayaran ?>')">
                                            <li class="fa fa-sticky-note"></li>
                                        </button>
                                        <button class="btn btn-warning" title="Terima Bukti, dan selesaikan transaksi" onclick="selesaikan(<?php echo $dt->id_transaksi ?>)">
                                            <li class="fa fa-check"></li>
                                        </button>
                                     <?php
                                 }else {
                                    ?>
                                        <button class="btn btn-warning" title="Nunnggu Pembayraan oleh pemesan">
                                            <?php echo $dt->status; ?>
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

    function proses(idTransaksi) {
        loading(true);
        $.ajax({
            url: url+'vendor/pesanan/settunggupembayaran/'+idTransaksi,
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
            loadPesananOnprog();
            console.log("complete");
        });        
    }

    function lihatBukti(buktiPembayaran) {
        var win = window.open(url+'assets/image/bukti/'+buktiPembayaran, '_blank');
        win.focus();
    }

    function selesaikan(idTransaksi) {
      var ya = confirm("Selesaikan Transaksi?");
      if (ya) {
        loading(true);
        $.ajax({
          url: url+'vendor/pesanan/selesaikan/'+idTransaksi,
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
            loadPesananOnprog();
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