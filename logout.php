<?php
session_start();
session_unset("a");
header("location:index.php");
?>
