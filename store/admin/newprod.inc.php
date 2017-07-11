<?php
include "../mylibrary/login.php";
if(!isset($_SESSION['store_admin'])){
	echo "<h2>Sorry, you have to be logged in to do that.</h2><hr>";
	echo "<a ref='admin.php'>Try Again</a>";
}else{
	echo "<h2>Add a new Product</h2><hr>";
	echo "<form action='admin.php' method='post'>";
		echo "<label>Category: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name='cat'><option>Select</option>";


	$query = "SELECT catid, name FROM categories";
$result = mysqli_query($dbc, $query);
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$catid = $row['catid'];
	$name = $row['name'];
	echo "<option value='$catid'> $name</option>";
}
		echo "</select><br>";
	echo "<label>Description: &nbsp; &nbsp;&nbsp;</label><input type='text' size='40' name='desc'><br>";
	echo "<label>Price: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type='text' size='10' name='price'><br>";
	echo "<label>Quantity: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type='text'size='10' name='quantity'><br>";
	echo "<input type='hidden' name='MAX_FILE_SIZE' value='1024000'>";
	echo "<label>Picture: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type='file' name='picture'><br>";



	echo "</form>";
}




?>


