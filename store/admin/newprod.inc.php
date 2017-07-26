<?php 
if(!isset($_SESSION['store_admin'])){
	echo "<h2>You must be logged on to access that page</h2><hr>";
	echo "<a href='admin.php'>Please log on</a>";
}else{
	$userid = $_SESSION['store_admin'];
	echo "<h2>Welcome <span style='color:blue'>$userid</span>, Enter Product Info Below</h2><hr>";
	echo "<form enctype='multipart/form-data' action='admin.php' method='post'>";
	echo "<table style='width:100%; cellpadding:1; border='1px solid #444444;'>";
	echo "<tr><th>Category: </th><td><select name='cat'><option name=''>Select</option>";
	$query = "SELECT catid, name FROM categories ORDER BY name ASC";
	$result = mysqli_query($dbc, $query) or die (mysqli_error());
	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$catid = $row['catid'];
		$name = $row['name'];
	echo "<option value='$catid'>$name</option>";
		
	}
	echo "</select></td></tr>";
	echo "<tr><th>Description:</th><td><input type='text' name='description' size='40'></td></tr>";
	echo "<tr><th>Price: </th><td><input type='text' name='price' size='10'></td></tr>";
	echo "<tr><th>Quantity:</th><td><input type='text' name = 'quantity' size='10'></td></tr>";
	echo "<tr><th>On Sale:</th><td><input type='checkbox' name='onsale' value='1'> Yes &nbsp; <input type='checkbox' name='onsale' value='0'> No </td></tr>";
	echo "<tr><th>Picture:</th><td><input type='file' name = 'picture'></td></tr>";
	echo "<tr><th></th><td><input type='submit' value='Submit'><input type='hidden' name='content' value='addprod'></td></tr>";
	echo "</table>";
	
	echo "</form>";
}



?>