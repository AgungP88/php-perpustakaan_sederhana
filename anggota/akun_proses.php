<?php
include'../koneksi.php';
  $proses = $_GET['prabowo'];
  if($proses=='ubah'){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $pw = $_POST['pw'];
    $hak = $_POST['hak'];

    $query = $koneksi -> prepare("UPDATE akun SET nama = :2, password = :3, hak = :4 WHERE id = :1");

    $query -> bindParam(':1', $id);
    $query -> bindParam(':2', $nama);
    $query -> bindParam(':3', $pw);
    $query -> bindParam(':4', $hak);
    $query -> execute();

    $ubah = $query -> rowCount();

    if($ubah > 0){
			echo
			'<script>
				alert("Edit Berhasil");
				window.location ="akun.php"
			</script>';

		}else{
			echo
			'<script>
				alert("Edit Gagal");
				window.location ="akun.php"
			</script>';

		}
  }
?>
