<?php
$catid = $_POST['cat'];
$desc = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$onsale = $_POST['onsale'];

$catid = mysqli_real_escape_string($dbc, $catid);
$desc =  mysqli_real_escape_string($dbc, $desc);
$price =  mysqli_real_escape_string($dbc, $price);
$quantity =  mysqli_real_escape_string($dbc, $quantity);
$thumbnail = getThumb($_FILES['picture']);
$thumbnail =  mysqli_real_escape_string($dbc, $thumbnail);


$query = "INSERT INTO products (catid, description, picture, price, quantity, onsale) VALUES ('$catid', '$desc', '$thumbnail', '$price', '$quantity', '$onsale')";
$result = mysqli_query($dbc, $query) or die('<h2>Unable to add product</h2><hr>');
if($result)
	echo "<h2>$desc added</h2><hr>";
else
	echo "<h2>Problem adding new product</h2><hr>";

?>