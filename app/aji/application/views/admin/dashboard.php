<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('header'); ?>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <!-- sidebar menu -->
                    <?php $this->load->view('sidebar') ?>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <?php $this->load->view('nav')?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="row top_tiles">
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-tag"></i></div>
                                <div class="count"><?php echo $totTransaksi; ?></div>
                                <h3>Total Transaksi</h3>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-spinner"></i></div>
                                <div class="count"><?php echo $totPending; ?></div>
                                <h3>Antrian Cetak</h3>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-wrench"></i></div>
                                <div class="count"><?php echo $totProses; ?></div>
                                <h3>Proses</h3>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-check"></i></div>
                                <div class="count"><?php echo $totSelesai; ?></div>
                                <h3>Selesai</h3>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row col-md-12">
                        <div id="chartContainer" style="height: 300px;"></div>
                    </div> -->
                   <!--  <div style="width: 380px;height: 500px">
                        <canvas id="myChart"></canvas>
                    </div> -->
                </div>
            </div>
            <!-- /page content -->
             <?php $this->load->view('footer.php')?>
        </div>
    </div>
<!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
</body>
</html>

<script>
    // function detailTopup() {
    //     $('#modalLoading').modal('show');
    //     location.href="<?php echo site_url('topup') ?>";
    // }
    // function detailTransakksi() {
    //     $('#modalLoading').modal('show');
    //     location.href="<?php echo site_url('penjualan') ?>";
    // }
    // function detailNgutang() {
    //     $('#modalLoading').modal('show');        
    //     location.href="<?php echo site_url('penjualan/ngutang') ?>";
    // }
    // function detailLunas() {
    //     $('#modalLoading').modal('show');
    //     location.href="<?php echo site_url('pelunasan') ?>";
    // }
</script>

<script>
    function ganti_bulan(no) {
        var bulan='';
        switch (no){
            case '1':
                return 'Januari';
                break;
            case '2':
                return 'Februari';
                break;
            case '3':
                return 'Maret';
                break;
            case '4':
                return 'April';
                break;
            case '5':
                return 'Mei';
                break;
            case '6':
                return 'Juni';
                break;
            case '7':
                return 'Juli';
                break;
            case '8':
                return 'Agustus';
                break;
            case '9':
                return 'September';
                break;
            case '10':
                return 'Oktober';
                break;                
            case '11':
                return 'November';
                break;
            case '12':
                return 'Desember';
                break;
            default:
                return 'MBUH__';
                break;
        }
    }
    


</script>