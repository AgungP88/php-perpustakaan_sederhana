<?php
include'../koneksi.php';
include'../proteksi.php';
include'sidebar.php';
 ?>

 <link rel="stylesheet" href="../img/csskonten.css">
 <link rel="stylesheet" href="../css/bootstrap.css">

 <?php
 $metode = $_GET['agung'];
 $edit = $koneksi -> prepare("SELECT * FROM buku WHERE kode_buku = :kode");
 $edit -> bindParam(':kode', $metode);
 $edit -> execute();
 $hasil = $edit -> fetch();
 ?>

 <div class="main">
   <button type="button" name="button" onclick="history.back(-1)" class="btn btn-danger btn-lg"><i class="fa fa-fw fa-reply"></i> Kembali</button>
   <?php
    $sql = $koneksi -> prepare("SELECT max(kode_pinjam) as kd_pinjam FROM peminjaman");
    $sql -> execute();
    $hsl = $sql -> fetch();
    $kode = $hsl['kd_pinjam'];
    $nourut = (int) substr($kode, 3, 3);
    $nourut++;
    $char = "PJM";
    $new = $char . sprintf("%03s", $nourut);
   ?>
   <div class="container col-md-8">
     <h1 align=center>Pinjam Buku</h1>
     <br>
     <form action="pinjam_proses.php?prabowo=tambah" method="post">
       <div class="row">
         <div class="col">
           <label for="kode">Kode Pinjam</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="kd_pinjam" value="<?php echo $new; ?>" readonly>
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Nama Peminjam</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="nis" value="<?php echo $_SESSION['username']['id']; ?>" readonly>
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Kode Buku</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="kd_buku" value="<?php echo $hasil['kode_buku']; ?>" readonly>
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Tanggal Pinjam</label>
         </div>
         <div class="col">
           <input type="date" class="form-control" name="tgl_pinjam">
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Jumlah Pinjam</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="jmlh_pinjam">
         </div>
       </div>

       <br>
       <button type="submit" class="btn btn-success">Pinjam Buku</button>
     </form>
   </div>
 </div>
