<?php
if(!isset($_SESSION['store_admin'])){
	echo "<h2>Sorry, you have to be logged in to do that.</h2><hr>";
	echo "<a ref='admin.php'>Please Logon</a>";
}else{
	$userid = $_SESSION['store_admin'];
	echo "<h2>Add a new Product</h2><hr>";
	echo "<table style='width:100%; cellpadding:1;>";
	echo "<form echtype='mulipart/form-data' action='admin.php' method='post'>";
	echo "<tr><th align='left'>Category:</th><td align='left'><select name='cat'><option>Select</option>";
	$query = "SELECT catid, name FROM categories ORDER BY name ASC";
	$result = mysqli_query($dbc, $query) or die(mysqli_error());
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$catid = $row['catid'];
		$name = $row['name'];
		echo "<option value='$catid'>$name</option>";
	}
	echo "</select></td></tr>";
	echo "<tr><th align='left'>Description:</th><td align='left'><input type='text' name='description' size='40'></td></tr>";
	echo "<tr><th align='left'>Price: </th><td align='left'><input type='text' name='price' size='10'></td></tr>";
	echo "<tr><th align='left'>Quantity:</th><td align='left'><input type='text' name='quantity' size='10'></td></tr>";
	echo "<input type='hidden' name='MAX_FILE_SIZE'  value='204800'>";
	echo "<tr><th align='left'>Picture:</th><td align='left'><input type='file' name='picture'></td></tr>";
	echo "</table>";
  	echo "<br><input type='submit' value='Submit'/><br>";

   	echo "<input type='hidden' name='content' value='addproduct'>";
   	echo "</form>";

	
}




?>


