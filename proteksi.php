<?php
session_start();
if(!isset($_SESSION["username"])) {
	echo
	"<script>
			alert ('anda harus login dulu');
			window.location = 'index.php';
	</script>";
}
?>
