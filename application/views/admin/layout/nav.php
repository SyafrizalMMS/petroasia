<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <!-- Menu Dashboard -->
            <li><a href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard text-aqua"></i>
                    <span>DASHBOARD</span></a></li>

            <!-- Menu Transaksi -->
            <li><a href="<?= base_url('admin/transaksi'); ?>"><i class="fa fa-check text-yellow"></i>
                    <span>Transaksi</span></a></li>

            <!-- Menu produk -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap text-green"></i> <span>PRODUK</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin/produk'); ?>"><i class="fa fa-table"></i> Data Produk</a></li>
                    <li><a href="<?= base_url('admin/produk/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Produk</a>
                    </li>
                    <li><a href="<?= base_url('admin/kategori'); ?>"><i class="fa fa-tags"></i> Kategori Produk</a></li>
                </ul>
            </li>

            <!-- Menu Rekening -->
            <li><a href="<?= base_url('admin/rekening'); ?>"><i class="fa fa-dollar text-red"></i> <span>DATA
                        REKENING</span></a></li>

            <!-- Menu user -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lock text-yellow"></i> <span>PENGGUNA</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin/user'); ?>"><i class="fa fa-table"></i> Data Pengguna</a></li>
                    <li><a href="<?= base_url('admin/user/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Pengguna</a>
                    </li>
                </ul>
            </li>

            <!-- Menu KONFIGURASI -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-wrench text-fuchsia"></i> <span>KONFIGURASI</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin/konfigurasi'); ?>"><i class="fa fa-home"></i> Konfigurasi Umum</a>
                    </li>
                    <li><a href="<?= base_url('admin/konfigurasi/logo'); ?>"><i class="fa fa-image"></i> Konfigurasi
                            Logo</a></li>
                    <li><a href="<?= base_url('admin/konfigurasi/icon'); ?>"><i class="fa fa-fonticons"></i> Konfigurasi
                            Icon</a></li>

                </ul>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titel; ?>
            <!-- <small>advanced tables</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active"><?= $titel2; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title btn btn-primary btn-lg col-xs-12"><?= $titel2; ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">