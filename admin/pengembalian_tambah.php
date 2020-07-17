<?php
include'../koneksi.php';
include'../proteksi.php';
include'sidebar.php';
 ?>

 <link rel="stylesheet" href="../img/csskonten.css">
 <link rel="stylesheet" href="../css/bootstrap.css">

 <?php
 $metode = $_GET['agung'];
 $edit = $koneksi -> prepare("SELECT * FROM peminjaman WHERE kode_pinjam = :kode");
 $edit -> bindParam(':kode', $metode);
 $edit -> execute();
 $hasil = $edit -> fetch();
 ?>

 <div class="main">
   <button type="button" name="button" onclick="history.back(-1)" class="btn btn-danger btn-lg"><i class="fa fa-fw fa-reply"></i> Kembali</button>
   <?php
    $sql = $koneksi -> prepare("SELECT max(kode_kembali) as kd_kembali FROM pengembalian");
    $sql -> execute();
    $hsl = $sql -> fetch();
    $kode = $hsl['kd_kembali'];
    $nourut = (int) substr($kode, 3, 3);
    $nourut++;
    $char = "PGM";
    $new = $char . sprintf("%03s", $nourut);
   ?>
   <div class="container col-md-8">
     <h1 align=center>Pengembalian Buku</h1>
     <br>
     <form action="pengembalian_proses.php?prabowo=tambah" method="post">
       <div class="row">
         <div class="col">
           <label for="kode">Kode Kembali</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="kd_kembali" value="<?php echo $new; ?>" readonly>
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Kode Pinjam</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="kd_pinjam" value="<?php echo $hasil['kode_pinjam']; ?>" readonly>
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Nama Peminjam</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="nis" value="<?php echo $hasil['nis']; ?>" readonly>
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
           <label for="kode">Jumlah</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="jumlah" value="<?php echo $hasil['jumlah']; ?>" readonly>
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Status Pengembalian</label>
         </div>
         <div class="col">
           <select class="form-control" name="status_kembali">
             <option></option>
             <option>Dikembalikan</option>
             <option>Belum Dikembalikan</option>
           </select>
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Tanggal Pengembalian</label>
         </div>
         <div class="col">
           <input type="date" class="form-control" name="tgl_kembali">
         </div>
       </div>

       <br>
       <button type="submit" class="btn btn-success">Pengembalian Buku</button>
     </form>
   </div>
 </div>
