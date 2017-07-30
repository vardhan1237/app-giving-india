<?php
require_once('conn.php');
$un= $_POST['username'];
$pd= $_POST['psd'];
mysql_query("INSERT INTO tbllogin (username, psd) VALUES ('$un', '$pd')");
header("location:home.php?action");
?>