<?php
include'../koneksi.php';
  $proses = $_GET['prabowo'];
  if($proses=='ubah'){
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $level = $_POST['level'];
    $status = $_POST['status'];

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
				window.location ="profil.php"
			</script>';

		}else{
			echo
			'<script>
				alert("Edit Gagal");
				window.location ="profil.php"
			</script>';

		}
  }
?>
