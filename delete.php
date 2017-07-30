<?php
require_once('conn.php');
$idp= $_REQUEST['id'];
mysql_query("delete  FROM tbllogin where id=$idp");
header("location:home.php?action");
?>