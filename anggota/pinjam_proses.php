<?php
include'../koneksi.php';
  $proses = $_GET['prabowo'];
  if($proses=='tambah'){
    $kd_pinjam = $_POST['kd_pinjam'];
    $nis = $_POST['nis'];
    $kd_buku = $_POST['kd_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $jumlah = $_POST['jmlh_pinjam'];
    $query = $koneksi -> prepare("SELECT * FROM buku WHERE kode_buku = '$kd_buku'");
    $query -> execute(array($kd_buku));
    $sql = $query -> fetch();
    $metode = $sql['stok'];
    $hasil = $metode - $jumlah;

    $tambah = $koneksi -> prepare("INSERT INTO peminjaman(kode_pinjam, nis, kode_buku, tgl_pinjam, jumlah) VALUES(?,?,?,?,?)");
    $tambah -> execute(array($kd_pinjam, $nis, $kd_buku, $tgl_pinjam, $jumlah));
    $insert = $tambah -> rowCount();

    $ubah = $koneksi -> prepare("UPDATE buku SET stok = :2 WHERE kode_buku = :1");
    $ubah -> bindParam(':1', $kd_buku);
    $ubah -> bindParam(':2', $hasil);
    $ubah -> execute();

    if($insert>0){
      echo "<script>
					alert('pinjam berhasil')
					window.location='buku.php'
					</script>";
		}else{
			echo "<script>
					alert('pinjam gagal')
					window.locatin='buku.php'\
					</script>";
		}
    }
