<?php
require'koneksi.php';

	$user = $_POST['name'];
	$pw = $_POST['pw'];

	$row = $koneksi -> prepare('SELECT * FROM user WHERE id = :id AND password = :pw');
	$row -> bindParam(':id', $user);
	$row -> bindParam(':pw', $pw);
	$row -> execute();
	$cek = $row -> fetch();
	$JumRow = $row -> rowCount();

	if ($JumRow>0){
		session_start();
		if($cek['hak']=='admin'){
		$_SESSION["username"]=$cek;
		echo "<script>
			alert('Login Berhasil')</script>
			<script>window.location = 'admin/utama_admin.php'
			</script>";
      }
  else if($cek['hak']=='anggota'){
    $_SESSION["username"]=$cek;
		echo "<script>
			alert('Login Berhasil')</script>
			<script>window.location = 'anggota/utama_anggota.php'
			</script>";
    }else{
      echo "<script>
  			alert('Login Gagal')</script>
  			<script>window.location = 'index.php'
  			</script>";
    }
}
	else{
		echo "<script>
			alert('Login Gagal')</script>
			<script>window.location = 'index.php'
			</script>";
	}
?>
