<?php
	include('../admin/backend/dataAccess.php');
	header(" Content-Type: image/jpeg");
	header(" Content-Disposition: inline");
	$id = $_POST["id"];
	$sql = "SELECT TProduct.imageURL FROM TProduct WHERE id='".$id."'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$image = $row[0];
	echo $image;

?>
