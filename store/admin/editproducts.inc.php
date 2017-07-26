<?php
if(!isset($_SESSION['store_admin']))
{
	echo "<h2>Sorry, you have to be logged on to access this page</h2><hr>";
	echo "<a  href='admin.php' style='text-decoration:none; width:40px; height:20px; background-color:#223850; color:white; border:1px solid #444; border-radius:3px;''>Home</a>";
} else
{
	echo "<h2>Click on a product to edit</h2><hr>";
	$catid = $_GET['cat'];
	if(!isset($_GET['page']))
		$page = 1;
	else
		$page = $_GET['page'];

      showproducts($catid, $page, "admin.php?content=editproducts", "admin.php?content=updateproduct");
}
?>