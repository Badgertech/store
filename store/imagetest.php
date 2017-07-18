<!DOCTYPE html>
<html>
<head>
<title>Image Test</title>
</head>
<body>
<?php
 include "mylibrary/login.php"; 
$query = "SELECT prodid, description FROM products";
$result = mysqli_query($dbc, $query) or die(mysqli_error());
echo "<table style='width:50%; cellpadding='0' border-collapse:collapse; border='1'>";
echo  "<tr><th>Product ID</th><th>Description</th><th>Image</th></tr>";
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$prodid = $row['prodid'];
	$description = $row['description'];

	echo "<tr><td>$prodid</td><td>$description</td>";
	echo "<td align='center'><img src='showimage.php?id=$prodid' width='80' height='60'></td></tr>";


}
echo "</table>";
?>
</body>
</html>