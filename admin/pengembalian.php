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
   <b><i class="fa fa-folder"></i> Data Pengembalian</b><a href="pengembalian_print.php" target="blank" rel="tooltip" title="Print Data Pengembalian"><button type="button" name="button" class="btn btn-success" style="margin-left:67%" ><i class="fa fa-fw fa-print"></i></button>
<hr></a>
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
          <th scope="col">Kode Kembali</th>
          <th scope="col">Kode Pinjam</th>
          <th scope="col">NIS</th>
          <th scope="col">Kode Buku</th>
          <th scope="col">Tanggal Pengembalian</th>
          <th scope="col">Status Pengembalian</th>
          <th scope="col" colspan="2">Aksi</th>
        </tr>
      </thead>
      <?php
      if(isset($_POST['search'])){
        $param = $_POST['search'];
        $asd = $koneksi->prepare("SELECT * FROM pengembalian WHERE kode_kembali LIKE :1 OR kode_buku LIKE :1 ");
        $asd->bindParam(':1', $param);
        $asd->execute();
      }else{
      $asd = $koneksi -> prepare("SELECT * FROM pengembalian");
      $asd -> execute();
    }
      $i = 1;
      while($data = $asd -> fetch()){
      ?>
      <tbody>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $data['kode_kembali']; ?></td>
          <td><?php echo $data['kode_pinjam']; ?></td>
          <td><?php echo $data['nis']; ?></td>
          <td><?php echo $data['kode_buku']; ?></td>
          <td><?php echo $data['tgl_pengembalian']; ?></td>
          <td><?php echo $data['status_pengembalian']; ?></td>
          <td colspan="2">
            <a rel="tooltip" title="Detail" href="pengembalian_detail.php?agung=<?php echo $data['kode_kembali']; ?>" >
            <i class="fa fa-fw fa-info"></i></a>
          </td>
        </tr>
      </tbody>
    <?php } ?>
    </table>
   </div>
 </body>
 </html>
