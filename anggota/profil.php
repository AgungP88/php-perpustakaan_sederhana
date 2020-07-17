<?php
include'../koneksi.php';
include'../proteksi.php';
include'sidebar.php';
 ?>

 <link rel="stylesheet" href="../img/csskonten.css">
 <link rel="stylesheet" href="../css/bootstrap.css">

 <?php
 $metode = $_SESSION['username']['id'];
 $edit = $koneksi -> prepare("SELECT * FROM anggota WHERE nis = '$metode'");
 $edit -> execute(array($metode));
 $hasil = $edit -> fetch();
 ?>

 <div class="main">
   <button type="button" name="button" onclick="history.back(-1)" class="btn btn-danger btn-lg"><i class="fa fa-fw fa-reply"></i> Kembali</button>
   <div class="container col-md-8">
     <h1 align=center>Profil</h1>
     <br>
     <form action="profil_proses.php?prabowo=ubah" method="post">

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
           <label for="kode">Nama</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="nama" value="<?php echo $hasil['nama_anggota']; ?>" required>
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Jenis Kelamin</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="jk" value="<?php echo $hasil['jk']; ?>">
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
           <label for="kode">No Telp</label>
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
             <?php
             $a = $hasil['id_level'];
             $asd = $koneksi -> prepare("SELECT * FROM level WHERE id_level = '$a'");
             $asd -> execute(array($a));
             $lvl = $asd -> fetch();
            ?>
             <option value="<?php echo $lvl['id_level']; ?>"><?php echo $lvl['nama_level']; ?></option>
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
           <input type="text" class="form-control" name="status" value="<?php echo $hasil['status']; ?>">
         </div>
       </div>

       <br>
       <button type="submit" class="btn btn-success">Edit</button>
     </form>
   </div>
 </div>
