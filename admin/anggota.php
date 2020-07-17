<?php
include'../koneksi.php';
include'../proteksi.php';
include'sidebar.php';
 ?>

 <html>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="../img/csskonten.css">
 <link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../img/cssform.css">
 </head>
 <body>

 <div class="main">
   <b><i class="fa fa-id-card"></i> Data Anggota</b><a href="#" rel="tooltip" title="Tambah Data Anggota"><button type="button" name="button" class="btn btn-secondary" style="margin-left:67%" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-fw fa-plus"></i></button>
   </a><a href="anggota_print.php" target="blank" rel="tooltip" title="Print Data Buku"><button type="button" name="button" class="btn btn-success" ><i class="fa fa-fw fa-print"></i></button></a>
   <div id="id01" class="modal">

     <?php
      $sql = $koneksi -> prepare("SELECT max(nis) as nis FROM anggota");
      $sql -> execute();
      $hsl = $sql -> fetch();
      $kode = $hsl['nis'];
      $nourut = (int) substr($kode, 3, 3);
      $nourut++;
      $char = "AG";
      $new = $char . sprintf("%03s", $nourut);
     ?>

     <form class="modal-content animate" action="anggota_proses.php?prabowo=tambah" method="post">
       <div class="imgcontainer">
         <h3>Tambah data anggota</h3>
       </div>

       <div class="container1">
         <div class="alert alert-danger">
           ID anggota harap diingat sebagai username. password default 123
         </div>
         <input type="text" name="nis" value="<?php echo $new; ?>" readonly>

         <input type="text" placeholder="Masukan Nama Anggota" name="nama" required>

         <select name="jk" >
           <option></option>
           <option>laki laki</option>
           <option>perempuan</option>
         </select>

         <input type="text" placeholder="Masukan Alamat" name="alamat" required>

         <input type="text" placeholder="Masukan Nomor Telp" name="no_telp" required>

         <select name="level" >
           <option></option>
           <?php
           $zxc = $koneksi -> prepare("SELECT * FROM level");
           $zxc -> execute();
           while($cat = $zxc -> fetch()){
           ?>
           <option value="<?php echo $cat['id_level']; ?>"><?php echo $cat['nama_level']; ?></option>
         <?php } ?>
         </select>

         <select name="status" >
           <option></option>
           <option>Aktif</option>
           <option>Dilarang</option>
         </select>
       </div>

       <div class="container1" style="background-color:#f1f1f1">
         <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger">Batal</button>
         <button type="submit" class="btn btn-success">Tambah</button>
       </div>
     </form>
   </div>


   <script>
   // Get the modal
   var modal = document.getElementById('id01');

   // When the user clicks anywhere outside of the modal, close it
   window.onclick = function(event) {
       if (event.target == modal) {
           modal.style.display = "none";
       }
   }
   </script>

<hr>
<form class="" action="" method="post">
                <div class="input-group input-group-sm" style="width: 150px; margin-left: 950px;">
                  <input type="text" name="search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                </form>
    <table class="table table-hover">
      <thead align=center>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nis</th>
          <th scope="col">Nama Anggota</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Alamat</th>
          <th scope="col">No Telp</th>
          <th scope="col">Level</th>
          <th scope="col">Status</th>
          <th scope="col" colspan="2">Aksi</th>
        </tr>
      </thead>
      <?php
      if(isset($_POST['search'])){
        $param = $_POST['search'];
        $asd = $koneksi->prepare("SELECT * FROM anggota WHERE nis LIKE :1 OR nama_anggota LIKE :1 ");
        $asd->bindParam(':1', $param);
        $asd->execute();
      }else{
      $asd = $koneksi -> prepare("SELECT * FROM anggota");
      $asd -> execute();
    }
      $i = 1;
      while($data = $asd -> fetch()){
      $id = $data['id_level'];
      $lev = $koneksi -> prepare("SELECT * FROM level WHERE id_level = :level");
      $lev -> bindParam(':level', $id);
      $lev -> execute();
      $hasil = $lev -> fetch();
      ?>
      <tbody>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $data['nis']; ?></td>
          <td><?php echo $data['nama_anggota']; ?></td>
          <td><?php echo $data['jk']; ?></td>
          <td><?php echo $data['alamat']; ?></td>
          <td><?php echo $data['no_telp']; ?></td>
          <td><?php echo $hasil['nama_level']; ?></td>
          <td><?php echo $data['status']; ?></td>
          <td>
            <a rel="tooltip" title="Edit" href="anggota_edit.php?agung=<?php echo $data['nis']; ?>">
            <i class="fa fa-fw fa-wrench"></i></a>
          </td>
          <td>
            <a rel="tooltip" title="Hapus" href="anggota_proses.php?prabowo=hapus&app=<?php echo $data['nis']; ?>">
            <i class="fa fa-fw fa-trash"></i></a>
          </td>
        </tr>
      </tbody>
    <?php $i++;  } ?>
    </table>
   </div>
 </body>
 </html>
