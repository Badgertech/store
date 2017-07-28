<?php
if(!isset($_SESSION['store_admin'])){
	echo "<h2>Sorry, you have to be logged in to do that.</h2><hr>";
	echo "<a href='admin.php'>Please Login</a>";

}else{
echo "<h2>Click on Product to edit it.</h2><hr>";
$catid = $_GET['cat'];
if(!isset($_GET['page']))
	$page = 1;
	else
		$page = $_GET['page'];
	showproducts($catid, $page, "admin.php?content=editproducts","admin.php?content=updateproduct");
// Code to implement paging
	if($thispage > 1)
	{
		$page = $thispage -1;
		$prevpage = "<a href='$currentpage&cat;=$catid&page;=$page'>Previous</a>";
	}	else
	{
		$prevpage = "";
	}
	if ($thispage < $totalpages)
	{
		$page =$thispage + 1;
		$nextpage = "<a href='$currentpage&cat;=$catid&page;=$page'>Next</a>";
	} else
	{
		$$nextpage = "";
	}
	if($totalpages > 1)
		echo $prevpage." ".$nextpage;
}

?>
