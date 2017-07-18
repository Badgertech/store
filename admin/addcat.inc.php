<?php 
error_reporting(0);
	include "../mylibrary/login.php";

	$cat = $_POST['catname'];
	$catname = mysqli_real_escape_string($dbc,$cat);
	$query = "INSERT INTO categories (name) VALUES ('$catname')";
	$result = mysqli_query($dbc, $query);
	$row = mysqli_num_rows($result);
	if($row = '0'){
		echo "<h2 color='#cc0000'>Sorry, category not added.</h2><hr>";
		echo "<a href='admin.php'>Try Again<a>";
	}else{
		echo "<h2 color='#00ff00'>Success! Category $cat added</h2><hr>";
		echo "<a href='admin.php'>Home</a> &nbsp; <a href='admin.php?content=newcat'>Add another category</a>";
	}
	?>