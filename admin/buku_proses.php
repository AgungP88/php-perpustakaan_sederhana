<?php
include'../koneksi.php';
  $proses = $_GET['prabowo'];
  if($proses=='tambah'){
    $kd         = $_POST['kd_buku'];
    $judul      = $_POST['judul'];
    $pengarang  = $_POST['pengarang'];
    $kategori   = $_POST['kat'];
    $stok       = $_POST['stok'];
    $tahun      = $_POST['tahun'];
    $status     = $_POST['status'];

    $tambah = $koneksi -> prepare("INSERT INTO buku (kode_buku, judul, pengarang, id_kategori, stok, tahun, status) VALUES (?,?,?,?,?,?,?)");
    $tambah -> execute(array($kd, $judul, $pengarang, $kategori, $stok, $tahun, $status));
    $insert = $tambah -> rowCount();

    if($insert>0){
			echo "<script>
					alert('tambah berhasil')
					window.location='buku.php'
					</script>";
		}else{
			echo "<script>
					alert('tambah gagal')
					window.locatin='buku.php'\
					</script>";
		}
	}

  if($proses=='edit'){
    $kd         = $_POST['kd_buku'];
    $judul      = $_POST['judul'];
    $pengarang  = $_POST['pengarang'];
    $kategori   = $_POST['kat'];
    $stok       = $_POST['stok'];
    $tahun      = $_POST['tahun'];
    $status     = $_POST['status'];

    $query = $koneksi -> prepare("UPDATE buku SET judul = :2 , pengarang = :3 , id_kategori = :4 , stok = :5 , tahun = :6 , status = :7 WHERE kode_buku = :1");

    $query -> bindParam(':1',$kd);
		$query -> bindParam(':2',$judul);
		$query -> bindParam(':3',$pengarang);
		$query -> bindParam(':4',$kategori);
		$query -> bindParam(':5',$stok);
		$query -> bindParam(':6',$tahun);
		$query -> bindParam(':7',$status);
		$query -> execute();

    $update = $query -> rowCount();

		if($update > 0){
			echo
			'<script>
				alert("Edit Berhasil");
				window.location ="buku.php"
			</script>';

		}else{
			echo
			'<script>
				alert("Edit Gagal");
				window.location ="buku.php"
			</script>';

		}
  }

  if($proses=='hapus'){
    $metode = $_GET['app'];
    $hapus = $koneksi -> prepare("DELETE FROM buku WHERE kode_buku = :kode");
    $hapus -> bindParam(':kode', $metode);
    $hapus -> execute();
    $delete = $hapus -> fetch();

    $delete = $hapus -> rowCount();

    if($delete > 0) {
			echo
			'<script>
				alert("Hapus Berhasil");
				window.location = "buku.php";
			</script>';
		}else{
			echo
			'<script>
				alert("Hapus Gagal");
				window.location = "buku.php";
			</script>';
		}
  }

?>
