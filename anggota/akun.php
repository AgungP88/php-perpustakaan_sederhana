<?php
include'../koneksi.php';
include'../proteksi.php';
include'sidebar.php';
 ?>

 <link rel="stylesheet" href="../img/csskonten.css">
 <link rel="stylesheet" href="../css/bootstrap.css">

 <?php
 $metode = $_SESSION['username']['id'];
 $edit = $koneksi -> prepare("SELECT * FROM user WHERE id = '$metode'");
 $edit -> execute(array($metode));
 $hasil = $edit -> fetch();
 ?>

 <div class="main">
   <button type="button" name="button" onclick="history.back(-1)" class="btn btn-danger btn-lg"><i class="fa fa-fw fa-reply"></i> Kembali</button>
   <div class="container col-md-8">
     <h1 align=center>Profil</h1>
     <br>
     <form action="akun_proses.php?prabowo=ubah" method="post">

       <div class="row">
         <div class="col">
           <label for="kode">ID</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="nis" value="<?php echo $hasil['id']; ?>" readonly>
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Nama</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="nama" value="<?php echo $hasil['nama']; ?>" required>
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Password</label>
         </div>
         <div class="col">
           <input type="text" class="form-control" name="pw" value="<?php echo $hasil['password']; ?>">
         </div>
       </div>

       <div class="row">
         <div class="col">
           <label for="kode">Hak</label>
         </div>
         <div class="col">
            <input type="text" class="form-control" name="hak" value="<?php echo $hasil['hak']; ?>" readonly>
         </div>
       </div>


       <br>
       <button type="submit" class="btn btn-success">Edit</button>
     </form>
   </div>
 </div>
