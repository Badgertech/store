<!DOCTYPE html>
<html>
<head>
<title>Image Test</title>
</head>
<body>
<h2 align="center">Image Test Page</h2><hr>
<center>
<a  href="admin/admin.php" style="text-decoration:none; width:40px; height:20px; background-color:#223850; color:white; border:1px solid #444; border-radius:3px;">Home</a>
<a  href="mylibrary/imagetest-2.php" style="text-decoration:none; width:40px; height:20px; background-color:#223850; color:white; border:1px solid #444; border-radius:3px;">Image Test - 2</a>
<?php
 include "mylibrary/login.php"; 
$query = "SELECT prodid, catid, description, price, quantity, onsale FROM products";
$result = mysqli_query($dbc, $query) or die(mysqli_error());
echo "<table style='width:400px; cellpadding='0' border-collapse:collapse; border='1'>";
echo  "<tr><th >ProdID</th><th >CatID</th><th>Description</th><th>Price</th><th>Quantity</th><th>Image</th><th>On Sale</th></tr>";
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$prodid = $row['prodid'];
	$catid = $row['catid'];
	$description = $row['description'];
	$price = $row['price'];
	$quantity = $row['quantity'];
	$onsale = $row['onsale'];



	echo "<tr><td>$prodid</td><td>$catid</td><td>$description</td><td>$price</td><td>$quantity</td>";
	echo "<td align='center'><img src='showimage.php?id=$prodid' width='80' height='60'></td><td></tr>";


}
echo "</table>";
?>
</center>
</body>
</html>