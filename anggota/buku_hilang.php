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
   <b><i class="fa fa-Book"></i>Data Buku</b>

<hr>


      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link  text-dark" href="buku.php">Semua <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="buku_baru.php">Baru</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="buku_lama.php">Lama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="buku_rusak.php">Rusak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="buku_hilang.php">Hilang</a>
        </li>
      </ul>
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
          <th scope="col">Kode Buku</th>
          <th scope="col">Judul</th>
          <th scope="col">Pengarang</th>
          <th scope="col">Kategori</th>
          <th scope="col">Stok</th>
          <th scope="col">Tahun</th>
          <th scope="col">Status Buku</th>
          <th scope="col" colspan="0" class="action">Aksi</th>
        </tr>
      </thead>
      <?php
      if(isset($_POST['search'])){
        $param = $_POST['search'];
        $asd = $koneksi->prepare("SELECT * FROM buku WHERE judul LIKE :1 OR kode_buku LIKE :1 ");
        $asd->bindParam(':1', $param);
        $asd->execute();
      }else{
      $asd = $koneksi -> prepare("SELECT * FROM buku WHERE status = 'hilang' ");
      $asd -> execute();
      }
      $i = 1;
      while($data = $asd -> fetch()){
      $id = $data['id_kategori'];
      $kat = $koneksi -> prepare("SELECT * FROM kategori WHERE id_kategori = :kategori");
      $kat -> bindParam(':kategori', $id);
      $kat -> execute();
      $hasil = $kat -> fetch();
      ?>
      <tbody>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $data['kode_buku']; ?></td>
          <td><?php echo $data['judul']; ?></td>
          <td><?php echo $data['pengarang']; ?></td>
          <td><?php echo $hasil['nama_kategori']; ?></td>
          <td><?php echo $data['stok']; ?></td>
          <td><?php echo $data['tahun']; ?></td>
          <td><?php echo $data['status']; ?></td>
          <td>
            <a rel="tooltip" title="Pinjam" href="pinjam_tambah.php?agung=<?php echo $data['kode_buku']; ?>">
            <i class="fa fa-fw fa-pencil"></i></a>
          </td>
        </tr>
      </tbody>
      <?php $i++;  } ?>
    </table>
   </div>

 </body>
 </html>
