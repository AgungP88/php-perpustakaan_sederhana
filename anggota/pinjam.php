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
 </head>
 <body>

 <div class="main">
   <b><i class="fa fa-folder-open"></i> Data Peminjaman</b>
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
          <th scope="col">Kode Pinjam</th>
          <th scope="col">Nis</th>
          <th scope="col">Kode Buku</th>
          <th scope="col">Tanggal Pinjam</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Status Pinjam</th>
          <th scope="col" colspan="2">Status</th>
        </tr>
      </thead>
      <?php
      if(isset($_POST['search'])){
        $param = $_POST['search'];
        $asd = $koneksi->prepare("SELECT * FROM peminjaman WHERE kode_pinjam LIKE :1 OR kode_buku LIKE :1 ");
        $asd->bindParam(':1', $param);
        $asd->execute();
      }else{
        $metode = $_SESSION['username']['id'];
      $asd = $koneksi -> prepare("SELECT * FROM peminjaman WHERE nis = '$metode'");
      $asd -> execute(array($metode));
    }
      $i = 1;
      while($data = $asd -> fetch()){
      ?>
      <tbody>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $data['kode_pinjam']; ?></td>
          <td><?php echo $data['nis']; ?></td>
          <td><?php echo $data['kode_buku']; ?></td>
          <td><?php echo $data['tgl_pinjam']; ?></td>
          <td><?php echo $data['jumlah']; ?></td>
          <td><?php echo $data['status_pinjam']; ?></td>
          <td><?php echo $data['status']; ?></td>
        </tr>
      </tbody>
    <?php $i++; } ?>
    </table>
   </div>
 </body>
 </html>
