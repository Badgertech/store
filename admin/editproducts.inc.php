<?php 
if(!isset($_SESSION['store_admin']))
{
	echo "<h2>Sorry, you have to be logged in to do that</h2><hr>";
	echo "<a href='admin.php'>Please Login</a>";
} else 
{
	echo "<h2>Click on a product to edit it.</h2><hr>";
	$catid = $_GET['cat'];
	if(!isset($_GET['page']))
		$page = 1;
	else
		$page = $_GET['page'];
	showproducts($catid, $page, "admin.php?content=editproducts", "admin.php?content=updateproduct");
}
?>
