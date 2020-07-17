<?php include'../koneksi.php'; ?>
 <link rel="stylesheet" href="../css/bootstrap.css">
 <script>
         window.print();
     </script>

<h1 align=center>Data Buku</h1>

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
    </tr>
  </thead>
  <?php
  $i = 1;
  $asd = $koneksi -> prepare("SELECT * FROM pengembalian");
  $asd -> execute();
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
    </tr>
  </tbody>
  <?php $i++; } ?>
</table>
