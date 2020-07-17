<?php
include'../koneksi.php';
include'../proteksi.php';
include'sidebar.php';
 ?>

 <link rel="stylesheet" href="../img/csskonten.css">
 <link rel="stylesheet" href="../css/bootstrap.css">

 <?php
 $metode = $_GET['agung'];
 $edit = $koneksi -> prepare("SELECT * FROM anggota WHERE nis = :nis");
 $edit -> bindParam(':nis', $metode);
 $edit -> execute();
 $hasil = $edit -> fetch();
 ?>

 <div class="main">
   <button type="button" name="button" onclick="history.back(-1)" class="btn btn-danger btn-lg"><i class="fa fa-fw fa-reply"></i> Kembali</button>
   <div class="container col-md-8">
     <h1 align=center>Edit Anggota</h1>
     <br>
     <form action="anggota_proses.php?prabowo=edit" method="post">
       <div class="row">
         <div class="col">
           <label for="kode">NIS</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="nis" value="<?php echo $hasil['nis']; ?>" readonly>
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Nama Anggota</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="nama" value="<?php echo $hasil['nama_anggota']; ?>">
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Jenis Kelamin</label>
         </div>
         <div class="col">
         <select class="form-control" name="jk">
           <option><?php echo $hasil['jk']; ?></option>
           <option>laki laki</option>
           <option>perempuan</option>
         </select>
       </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Alamat</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="alamat" value="<?php echo $hasil['alamat']; ?>">
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Nomor Telp</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="no_telp" value="<?php echo $hasil['no_telp']; ?>">
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Level</label>
         </div>
         <div class="col">
           <select class="form-control" name="level" >
             <option></option>
             <?php
             $zxc = $koneksi -> prepare("SELECT * FROM level");
             $zxc -> execute();
             while($cat = $zxc -> fetch()){
             ?>
             <option value="<?php echo $cat['id_level']; ?>"><?php echo $cat['nama_level']; ?></option>
           <?php } ?>
           </select>
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Status</label>
         </div>
         <div class="col">
           <select class="form-control" name="status">
             <option><?php echo $hasil['status']; ?></option>
             <option>Aktif</option>
             <option>Dilarang</option>
           </select>
         </div>
       </div><br>
       <button type="submit" class="btn btn-success">Ubah Data</button>
     </form>
   </div>
 </div>
