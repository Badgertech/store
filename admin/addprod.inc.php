<?php
$catid = $_POST['catid'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$query = "INSERT INTO products (catid, description, price, quantity, onsale) VALUES ('$catid', '$desc', '$price', '$quantity')";
$result = mysqli_query($dbc, $query) or die(mysqli_error());
$row = mysqli_num_rows($result);
if ($row = 0){
	echo "<h2>Sorry, unable to add product</h2><hr>";
}else{
	echo "<h2>Product $desc added</h2><hr>";
	echo "<a href='admin.php'>Home</a>";
}
?>