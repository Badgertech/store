<?php
	header("Content-type: image/jpeg");
	include "..mylibrary/login.php";
	$query = "SELECT picture FROM products WHERE prodid=$prodid";
	$result = mysqli_query($dbc, $query) or die(mysqli_error());
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$picture = $row['picture'];
	echo $picture;

	?>