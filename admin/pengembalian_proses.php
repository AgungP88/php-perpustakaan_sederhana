<?php
include'../koneksi.php';
  $proses = $_GET['prabowo'];
  if($proses=='tambah'){
    $kd_kembali   = $_POST['kd_kembali'];
    $kd_pinjam    = $_POST['kd_pinjam'];
    $nis          = $_POST['nis'];
    $kd_buku      = $_POST['kd_buku'];
    $status       = $_POST['status_kembali'];
    $tgl_kembali  = $_POST['tgl_kembali'];
    $jumlah       = $_POST['jumlah'];
    $query = $koneksi -> prepare("SELECT * FROM buku WHERE kode_buku = '$kd_buku'");
    $query -> execute(array($kd_buku));
    $sql = $query -> fetch();
    $metode = $sql['stok'];
    $hasil = $metode + $jumlah;

    $tambah = $koneksi -> prepare("INSERT INTO pengembalian(kode_kembali, kode_pinjam, nis, kode_buku, status_pengembalian, tgl_pengembalian) VALUES(?,?,?,?,?,?)");
    $tambah -> execute(array($kd_kembali, $kd_pinjam, $nis, $kd_buku, $status, $tgl_kembali));
    $insert = $tambah -> rowCount();

    $ubah = $koneksi -> prepare("UPDATE buku SET stok = :2 WHERE kode_buku = :1");
    $ubah -> bindParam(':1', $kd_buku);
    $ubah -> bindParam(':2', $hasil);
    $ubah -> execute();

    $ubah2 = $koneksi -> prepare("UPDATE peminjaman SET status_pinjam = '$status' WHERE kode_pinjam = '$kd_pinjam'");
    $ubah2 -> execute(array($status, $kd_pinjam));

    if($insert>0){
      echo "<script>
  					alert('pengembalian berhasil')
  					window.location='pengembalian.php'
  					</script>";
    }else{
      echo "<script>
  					alert('pengembalian gagal')
  					window.location='pengembalian.php'
  					</script>";
    }

  }

?>
