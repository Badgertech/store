<?php
if(!isset($_SESSION['store_admin'])){
	echo "<h2>Sorry, you have to be logged in to do that.</h2><hr>";
	echo "<a ref='admin.php'>Try Again</a>";
}else{
	echo "<h2>Add a new Category</h2><hr>";
	echo "<form action='admin.php' method='post'>";
	echo "<label>New Category:</label><input type='text' name='catname' size='20'/>";
	echo "<input type='hidden' name='content' value='addcat'>";
	echo "<br><input type='submit' value='Submit'/><br>";
	echo "</form>";



}



?>