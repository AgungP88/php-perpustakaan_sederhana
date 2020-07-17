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
  <div class="container col-md-8">
    <h1 align=center>Edit Buku</h1>
    <br>
    <form action="buku_proses.php?prabowo=edit" method="post">
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
          <label for="kode">Judul Buku</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="judul" value="<?php echo $hasil['judul']; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="kode">Pengarang</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="pengarang" value="<?php echo $hasil['pengarang']; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="kode">Kategori</label>
        </div>
        <div class="col">
          <select class="form-control" name="kat" >
            <option></option>
            <?php
            $zxc = $koneksi -> prepare("SELECT * FROM kategori");
            $zxc -> execute();
            while($cat = $zxc -> fetch()){
            ?>
            <option value="<?php echo $cat['id_kategori']; ?>"><?php echo $cat['nama_kategori']; ?></option>
          <?php } ?>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="kode">Stok</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="stok" value="<?php echo $hasil['stok']; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="kode">Tahun</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="tahun" value="<?php echo $hasil['tahun']; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="kode">Status</label>
        </div>
        <div class="col">
          <select class="form-control" name="status">
            <option><?php echo $hasil['status']; ?></option>
            <option>Baru</option>
            <option>Lama</option>
            <option>Rusak</option>
            <option>Hilang</option>
          </select>
        </div>
      </div><br>
      <button type="submit" class="btn btn-success">Ubah Data</button>
    </form>
  </div>
</div>
