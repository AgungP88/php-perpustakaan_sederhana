<?php
include'../koneksi.php';
include'../proteksi.php';
include'sidebar.php';
 ?>

 <link rel="stylesheet" href="../img/csskonten.css">
 <link rel="stylesheet" href="../css/bootstrap.css">


 <?php
 $anggota = $koneksi -> prepare("SELECT * FROM anggota");
 $anggota -> execute();
 $jumanggota = $anggota -> rowCount();

 $buku = $koneksi -> prepare("SELECT * FROM buku");
 $buku -> execute();
 $jumbuku = $buku -> rowCount();

 $pinjam = $koneksi -> prepare("SELECT * FROM peminjaman");
 $pinjam -> execute();
 $jumpinjam = $pinjam -> rowCount();

 $kembali = $koneksi -> prepare("SELECT * FROM pengembalian");
 $kembali -> execute();
 $jumkembali = $kembali -> rowCount();
 ?>


<div class="main" >
  <h1><i class="fa fa-Home"></i>Dashboard</h1>
 <br>
 <div class="row">
    <div class="col-lg-3 col-6">
        <div class="card bg-primary text-white">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fa fa-id-card fa-2x"></i>
                    </div>
                    <div class="col-md-9 text-sm-right">
                        <div class="text-sm"><?php echo $jumanggota; ?></div>
                        <div class="text-sm">Anggota</div>
                    </div>
                </div>
            </div>
            <a href="anggota.php">
                <div class="card-footer bg-light">
                    <span class="pull-left">Lihat Semua</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="card bg-success text-white">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fa fa-book fa-2x"></i>
                    </div>
                    <div class="col-md-9 text-right">
                        <div class=""><?php echo $jumbuku; ?></div>
                        <div>Buku</div>
                    </div>
                </div>
            </div>
            <a href="buku.php">
                <div class="card-footer bg-light">
                    <span class="pull-left">Lihat Semua</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="card bg-danger text-white">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fa fa-folder-open fa-2x"></i>
                    </div>
                    <div class="col-md-9 text-right">
                        <div class="huge"><?php echo $jumpinjam; ?></div>
                        <div>Pinjam</div>
                    </div>
                </div>
            </div>
            <a href="peminjaman.php">
                <div class="card-footer bg-light">
                    <span class="pull-left">Lihat Semua</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="card bg-info text-white">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fa fa-folder fa-2x"></i>
                    </div>
                    <div class="col-md-9 text-right">
                        <div class="huge"><?php echo $jumkembali; ?></div>
                        <div>Kembali</div>
                    </div>
                </div>
            </div>
            <a href="pengembalian.php">
                <div class="card-footer bg-light">
                    <span class="pull-left">Lihat Semua</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
