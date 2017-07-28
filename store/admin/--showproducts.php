<?php

	function showproducts($catid, $page, $currentpage, $newpage)
	{

		$query = "SELECT count(prodid) FROM products WHERE catid = $catid";
		echo "$query <br>";
		$result = mysqli_query($dbc, $query) or die ('connection failed');
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if($row[0] == 0)
		{
			echo "<h2>Sorry, there are no products in that category</h2><hr>";
		} else
		 {
			$thispage = $page;
			$totalrecords = $row[0];
			$offset = ($thispage - 1) * $recordsperpage;
			$totpages = ceil($totrecords/$recordsperpage);
			echo "<table style='width:100%; cellpadding:1; border:1;'>";
			echo "<th><th>Image</th><th>Product</th><th>Price</th><th>QTY</th><th>Sale</th></tr>";

			$query = "SELECT * FROM products WHERE catid = $catid LIMIT $offset, $recordsperpage";
			$result = mysqli_query($dbc, $query) or die (mysqli_error());
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				$prodid = $row['prodid'];
				$description = $row['description'];
				$price = $row['price'];
				$quantity = $row['quantity'];
				$onsale = $row['onsale'];
				echo "<tr><td><img src='showimage.php?id=$prodid width='80' height='60'>";
				echo "</td><td>$description</td><td>$".$price."</td><td>$quantity</td><td>$onsale</td></tr>";
			}
			echo "</table>";
			//code to implement paging
			if($thispage > 1)
			{
				$page = $thispage - 1;
				$prevpage = "<a href='$currentpage&cat;=$catid&page;=$page'>Prev </a>";
			} else
			{
				$prevpage = " ";
			}
			if($thispage < $totpages)
			{
				$page = $thispage+1;
				$nextpage = "<a href='$currentpage&cat;=$catid&page;=$page'> Next</a>";
			} else
			{
				$nextpage = " ";
			}
			if($totpages > 1);
			echo  $prevpage." ".$nextpage;
		} 

	}

?>