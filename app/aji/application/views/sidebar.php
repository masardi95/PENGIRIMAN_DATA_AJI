<div class="navbar nav_title" style="border: 0;">
    <a href="<?php echo base_url();?>" class="site_title"><span>TMC_Payment</span></a>
</div>

<div class="clearfix"></div>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">

            <?php 
                if (!$this->session->userdata('isVendor')) {
                    ?>                    
                        <li class="<?php if($title=='Dashboard') echo 'active';?>">
                            <a href="<?php echo site_url('admin')?>"><i class="fa fa-home"></i>Dashboard</a>
                        </li>

                        <li class="<?php if($title=='Kantor') echo 'active';?>">
                            <a href="<?php echo site_url('kantor')?>"><i class="fa fa-bank"></i>Kantor</a>
                        </li>

                        <li class="<?php if($title=='User Kantor') echo 'active';?>">
                            <a href="<?php echo site_url('kantor/user')?>"><i class="fa fa-user"></i>Mgt User Kantor</a>
                        </li>

                        <li class="">
                            <a><i class="fa fa-gear"></i>Mgt Vendor <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li class="<?php if($title=='Data Vendor') echo 'active';?>"><a href="<?php echo site_url('mgtvendor')?>">
                                    <i class="fa fa-list"></i>Vendor</a>
                                </li>
                                <li class="<?php if($title=='User Vendor') echo 'active';?>"><a href="<?php echo site_url('mgtvendor/uservendor')?>">
                                    <i class="fa fa-group"></i>Admin Vendor</a>
                                </li>   
                            </ul>
                        </li>

                        <li class="">
                            <a><i class="fa fa-money"></i>Transaksi<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li class="<?php if($title=='Kirim Data') echo 'active';?>"><a href="<?php echo site_url('transaksi/kirim')?>">
                                    <i class="fa fa-upload"></i>Kirim</a>
                                </li>
                                <li class="<?php if($title=='Transaksi Progres') echo 'active';?>"><a href="<?php echo site_url('transaksi/onprog')?>">
                                    <i class="fa fa-spinner"></i>On Prog</a>
                                </li> 
                                <li class="<?php if($title=='Transaksi Selesai') echo 'active';?>"><a href="<?php echo site_url('transaksi/done')?>">
                                    <i class="fa fa-check-square-o"></i>Selesai</a>
                                </li>   
                            </ul>
                        </li>

                        <li class="">
                            <a><i class="fa fa-line-chart"></i>Report<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li class="<?php if($title=='Transaksi Harian') echo 'active';?>"><a href="<?php echo site_url('report/harian')?>">
                                    <i class="fa fa-header"></i>Report Harian</a>
                                </li>
                                <li class="<?php if($title=='Transaksi Bulanan') echo 'active';?>"><a href="<?php echo site_url('report/bulanan')?>">
                                    <i class="fa fa-book"></i>Report Bulanan </a>
                                </li>   
                            </ul>
                        </li>
            
                    <?php
                }else{
                    ?>
                        <li class="<?php if($title=='Dashboard Vendor') echo 'active';?>">
                            <a href="<?php echo site_url('vendor/vendor')?>"><i class="fa fa-home"></i>Dashboard</a>
                        </li>

                        <li class="<?php if($title=='Kantor Vendor') echo 'active';?>">
                            <a href="<?php echo site_url('vendor/vendor/kantor')?>"><i class="fa fa-bank"></i>Kantor</a>
                        </li>

                        <li class="<?php if($title=='Produk Vendor') echo 'active';?>">
                            <a href="<?php echo site_url('vendor/produk')?>"><i class="fa fa-fax"></i>Produk</a>
                        </li>

                        <li class="">
                            <a><i class="fa fa-space-shuttle"></i>Pesanan<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li class="<?php if($title=='Pesanan Masuk') echo 'active';?>"><a href="<?php echo site_url('vendor/pesanan/in')?>">
                                    <i class="fa fa-download"></i>Masuk</a>
                                </li>  
                                <li class="<?php if($title=='Sedang Proses') echo 'active';?>"><a href="<?php echo site_url('vendor/pesanan/onprog')?>">
                                    <i class="fa fa-wrench"></i>on Progres</a>
                                </li>
                                <li class="<?php if($title=='Transaksi Selesai') echo 'active';?>"><a href="<?php echo site_url('vendor/pesanan/done')?>">
                                    <i class="fa fa-check-square-o"></i>Selesai</a>
                                </li> 
                            </ul>
                        </li>            
                    <?php
                }
            ?>

        </ul>
    </div>
</div>