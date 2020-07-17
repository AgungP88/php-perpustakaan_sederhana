<?php
include'../koneksi.php';
include'../proteksi.php';
include'sidebar.php';
 ?>

 <link rel="stylesheet" href="../img/csskonten.css">
 <link rel="stylesheet" href="../css/bootstrap.css">

 <?php
 $metode = $_GET['agung'];
 $edit = $koneksi -> prepare("SELECT * FROM pengembalian WHERE kode_kembali = :kode");
 $edit -> bindParam(':kode', $metode);
 $edit -> execute();
 $hasil = $edit -> fetch();
 ?>

 <div class="main">
   <button type="button" name="button" onclick="history.back(-1)" class="btn btn-danger btn-lg"><i class="fa fa-fw fa-reply"></i> Kembali</button>
   <div class="container col-md-8">
     <h1 align=center>Detail Pengembalian</h1>
     <div class="row">
       <div class="col">
         <label for="kode">Kode Pengembalian</label>
       </div>
       <div class="col">
         <input type="text" class="form-control" name="kd_kembali" value="<?php echo $hasil['kode_kembali']; ?>" readonly>
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
         <label for="kode">NIS</label>
       </div>
       <div class="col">
         <input type="text" class="form-control" name="kd_pinjam" value="<?php echo $hasil['nis']; ?>" readonly>
       </div>
     </div>

     <div class="row">
       <div class="col">
         <label for="kode">Kode Buku</label>
       </div>
       <div class="col">
         <input type="text" class="form-control" name="kd_buku" value="<?php echo $hasil['kode_buku'];?>" readonly>
       </div>
     </div>

     <div class="row">
       <div class="col">
         <label for="kode">Tanggal Pinjam</label>
       </div>
       <div class="col">
         <input type="date" class="form-control" name="tgl_pinjam" value="<?php echo $hasil['tgl_pengembalian'];?>" readonly>
       </div>
     </div>

     <div class="row">
       <div class="col">
         <label for="kode">Status Pinjam</label>
       </div>
       <div class="col">
         <input type="text" class="form-control" name="jmlh_pinjam" value="<?php echo $hasil['status_pengembalian'];?>" readonly>
       </div>
     </div>

     <br>
   </div>
 </div>
