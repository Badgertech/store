<h2>Store Administration</h2><hr>
<table style="">
<tr><th><a href="admin.php">Home</a></th></tr>
<?php if(isset($_SESSION['store_admin']))
{
	echo "<form action='admin.php' method='get'>";
	echo "<tr><td>";
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
		echo "<input name='goButton' type='submit' value='Browse'>";
		
	
	echo "<input  name='content'  type='hidden'value='editproducts'>";
	echo "</form></td></tr>";

echo "<tr><th><a href='admin.php?content=newprod'>Add Product</a></th></tr>";
echo "<tr><th><a href='admin.php?content=newcat'>Add Category</a></th></tr>";
echo "<tr><th><a href='admin.php?content=outofstock'>List Out of Stock</a></th></tr>";
echo "<tr><th><a href='admin.php?content=report'>Generate Report</a></th></tr>";
echo "<tr><th><a href='../imagetest.php'>Image Page</a></th></tr>";
echo "<tr><th><a href='../mylibrary/logout.php'>Logout</a></th></tr>";
} 
?>
</table>