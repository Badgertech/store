<?php
	$prodid = $_GET['id'];
	$query = "SELECT prodid, catid, description, price, quantity, onsale FROM products WHERE prodid = $prodid";
	$result = mysqli_query($dbc, $query) or die ('Product not found');
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$catid = $row['catid'];
	$decsription = $row['description'];
	$price = $row['price'];
	$quantity = $row['quantity'];
	$onsale = $row['onsale'];

	$query = "SELECT name FROM categories WHERE catid = $catid";
	$result = mysqli_query($dbc, $query);
	$catname = $row['name'];
	echo  "<h2>Update Product Information</h2><hr>";
	echo "<form enctype='multipart/form-data' action='admin.php' method='post'>";
	echo "<input type='hidden' name='content' value='changeproduct'>";
	echo "<input type='hidden' name='prodid' value = '$prodid'>";
	echo "<table width='100%' cellpadding='1' border='1'>";
	echo "<tr><th>Product ID</th><td>$prodid</td></tr>";
	echo "<tr><th>Category</th><td><select name='catid'><option>Select</option>";
	$query= "SELECT catid, name FROM categories ORDER BY name ASC";
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$tempcatid = $row['catid'];
		$name = $row['name'];
		if($tempid == $catid)
			echo "<option value='$temcatid' selected='selected'>$name</option>";
		else
			echo "<option value='$tempcatid'>$name</option>";
	}
	echo "</select></td></tr>";
	echo "<tr><th>Description</th><td><input type='text' name = 'description' value='$description'></td></tr>";
	echo "<tr><th>Price</th><td><input type='text'  name='price' value='$price'></td></tr>";
	echo "<tr><th>Quantity</th><td><input type='text'> name='quantity'> value='$quantity'></td></tr>";
	if($onsale)
		echo "<tr><th>On Sale</th><td><input type='checkbox' name='onsale' value='1' checked></td></tr>";
		else
			echo "<tr><th>On Sale</th><td><input type= 'checkbox' name='onsale' value='1'></td></tr>";
		echo "<tr><th>Image</th><td><img src='showimage.php?id=$prodid' width='80' height='60'></td></tr>";
		echo "<tr><th>Update Image</th><td><input type='file' name='picture'></td></tr>";
		echo "<tr><th></th><td><input type='submit' name = 'button' value='Update'>";
		echo "<input type='submit' name='button' value='Delete Product'></td></tr>";
		echo "</table>";
		echo "</form>";















?>