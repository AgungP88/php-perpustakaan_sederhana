<?php
include'../koneksi.php';
  $proses = $_GET['prabowo'];
  if($proses=='tambah'){
    $nis        = $_POST['nis'];
    $nama       = $_POST['nama'];
    $jk         = $_POST['jk'];
    $alamat     = $_POST['alamat'];
    $no_telp    = $_POST['no_telp'];
    $level      = $_POST['level'];
    $status     = $_POST['status'];

    $tambah = $koneksi -> prepare("INSERT INTO anggota (nis, nama_anggota, jk, alamat, no_telp, id_level, status) VALUES (?,?,?,?,?,?,?)");
    $tambah -> execute(array($nis, $nama, $jk, $alamat, $no_telp, $level, $status));

    $tambah2 = $koneksi -> prepare("INSERT INTO user(id, nama, password, hak) VALUES (?,?,123,'anggota')");
    $tambah2 -> execute(array($nis,$nama));

    $insert = $tambah -> rowCount();

    if($insert>0){
			echo "<script>
					alert('tambah berhasil')
					window.location='anggota.php'
					</script>";
		}else{
			echo "<script>
					alert('tambah gagal')
					window.locatin='anggota.php'
					</script>";
		}
	}

  if($proses=='edit'){
    $nis        = $_POST['nis'];
    $nama       = $_POST['nama'];
    $jk         = $_POST['jk'];
    $alamat     = $_POST['alamat'];
    $no_telp    = $_POST['no_telp'];
    $level      = $_POST['level'];
    $status     = $_POST['status'];

    $query = $koneksi -> prepare("UPDATE anggota SET nama_anggota = :2 , jk = :3 , alamat = :4 , no_telp = :5 , id_level = :6 , status = :7 WHERE nis = :1");
    $query2 = $koneksi -> prepare("UPDATE user SET nama = :2 WHERE id = :1");

    $query -> bindParam(':1',$nis);
		$query -> bindParam(':2',$nama);
		$query -> bindParam(':3',$jk);
		$query -> bindParam(':4',$alamat);
		$query -> bindParam(':5',$no_telp);
		$query -> bindParam(':6',$level);
		$query -> bindParam(':7',$status);
    $query2 -> bindParam(':1',$nis);
    $query2 -> bindParam(':2',$nama);
		$query -> execute();
    $query2 -> execute();

    $update = $query -> rowCount();

		if($update > 0){
			echo
			'<script>
				alert("Edit Berhasil");
				window.location ="anggota.php"
			</script>';

		}else{
			echo
			'<script>
				alert("Edit Gagal");
				window.location ="anggota.php"
			</script>';

		}
  }

  if($proses=='hapus'){
    $metode = $_GET['app'];
    $hapus = $koneksi -> prepare("DELETE FROM anggota WHERE nis = :nis");
    $hapus -> bindParam(':nis', $metode);
    $hapus -> execute();
    $delete = $hapus -> fetch();

    $hapus2 = $koneksi -> prepare("DELETE FROM user WHERE id = :id");
    $hapus2 -> bindParam(':id',$metode);
    $hapus2 -> execute();
    $delete2 = $hapus2 -> fetch();

    $delete = $hapus -> rowCount();

    if($delete > 0) {
			echo
			'<script>
				alert("Hapus Berhasil");
				window.location = "anggota.php";
			</script>';
		}else{
			echo
			'<script>
				alert("Hapus Gagal");
				window.location = "anggota.php";
			</script>';
		}
  }
?>
