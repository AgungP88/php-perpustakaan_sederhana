<?php include'../koneksi.php'; ?>
 <link rel="stylesheet" href="../css/bootstrap.css">
 <script>
         window.print();
     </script>

<h1 align=center>Data Anggota</h1>

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
    </tr>
  </thead>
  <?php
  $i = 1;
  $asd = $koneksi -> prepare("SELECT * FROM anggota");
  $asd -> execute();
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
    </tr>
  </tbody>
  <?php $i++; } ?>
</table>
