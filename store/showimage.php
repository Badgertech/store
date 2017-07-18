<?php 
header("Content-type: image/jpeg");

$prodid=$_GET['id'];
include "mylibrary/login.php";

$query= "SELECT picture FROM products WHERE prodid = $prodid";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$picture = $row['picture'];
echo $picture;
?>