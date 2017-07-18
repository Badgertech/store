<h2>Store Administration</h2><hr>
<table style="width:100%; cellpadding:2; text-align:left; padding-left:3px;">
<tr><th><a href="admin.php">Home</a></th></tr>
<?php if(isset($_SESSION['store_admin']))
{
	echo "<tr><td><form action='admin.php' method='get'>";
	echo "<label>Browse Products:  </label>";
	echo "<select name='cat'><option>Select</option>";

	$query = "SELECT catid, name FROM categories ORDER BY name ASC";
$result = mysqli_query($dbc, $query);
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$catid = $row['catid'];
	$name = $row['name'];
	echo "<option value='$catid'> $name</option>";
}
		echo "</select>";
		echo "<input type='hidden' name='name' value='$name'>";
	echo "<input name='goButton' type='submit' value='Browse'>";
	echo "<input type='hidden' name='content' value='editproducts'>";
	echo "</form></td></tr>";

echo "<tr><th><a href='admin.php?content=newprod'>Add Product</a></th></tr>";
echo "<tr><th><a href='admin.php?content=newcat'>Add Category</a></th></tr>";
echo "<tr><th><a href='admin.php?content=outofstock'>List Out of Stock</a></th></tr>";
echo "<tr><th><a href='admin.php?content=report'>Generate Report</a></th></tr>";
echo "<tr><th><a href='../mylibrary/logout.php'>Logout</a></th></tr>";
} 
?>
</table>