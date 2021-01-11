<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Kode Transaksi</th>
        <th>Nama Vendor</th>
        <th>Ukuran (P x L)</th>
        <th>Kirim</th>
        <th>Status</th>
        <th>Jumlah</th>
        <th>Biaya</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($detailTransaksi as $dt) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td> 
                        <td><?php echo $dt['no_transaksi']; ?></td> 
                        <td><?php echo $dt['nama_vendor'] ?></td>
                        <td><?php echo $dt['panjang']." x ".$dt['lebar'] ?></td>  
                        <td><?php echo $dt['tgl_kirim'] ?></td>                      
                        <td><?php echo $dt['status'] ?></td>                      
                        <td><?php echo $dt['jumlah'] ?></td>                       
                        <td>Rp. <?php echo number_format(($dt['harga']*$dt['jumlah']*$dt['panjang']*$dt['lebar']),2) ?></td>                          
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