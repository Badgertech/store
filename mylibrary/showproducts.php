<?php
	function showproducts($catid, $page, $currentpage, $newpage)
	{
		include "login.php";

		$query = "SELECT count(prodid) FROM products WHERE catid = $catid";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result);
		if ($row[0] == 0)
		{
			echo "<h4>Sorry, there are no products in this category</h4><hr>";
		}else{
			echo "<h2>Product Page</h2><hr>";
			         $thispage = $page;
         $totrecords = $row[0];
         $recordsperpage = 5;
         $offset = ($thispage - 1) * $recordsperpage;
         $totpages = ceil($totrecords / $recordsperpage);

			echo "<table style='100%;  border-collapse:collapse; border:1px solid #444;'>";
			echo "<tr><th>Image</th><th>Product</th><th>Price</th><th>In Stock</th><th>Quantity</th><th>Special</th></tr>";
			$query = "SELECT * FROM products WHERE catid=$catid LIMIT $offset, $recordsperpage";
			$result = mysqli_query($dbc, $query);
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$prodid = 		$row['prodid'];
				$description = 	$row['description'];
				$price = 		$row['price'];
				$quantity = 	$row['quantity'];
				$onsale = 		$row['onsale'];
				echo "<tr>";
				echo "<td><img src='showimage.php?id=$prodid' width='80' height='60'></td>";
				echo "<td><a href='$newpage&id=$prodid'>$description</a></td>";
				echo "<td>$".$price."</td>";
				echo "<td>$quantity</td><td>";
				if($onsale)
					echo "On Sale!";
				else
					echo "&nbsp;";
				echo "</td></tr>";
			}
			echo "</table>";
			//code to impliment paging
			if($thispage > 1)
			{
				$page = $thispage -1;
				$prevpage = "<a href='$currentpage&cat;=$catid&page;=$page'>Previous Page</a>";
			}else{
				$prevpage =" ";
			}
			if($thispage < $totpages){
				$page = $thispage + 1;
				$nextpage = "<a href='$currentpage&cat;=$catid&page;=$page'>Next page</a>";
			} else{
				$nextpage = " ";
			}
			if($totpages > 1)
				echo $prevpage." ".$nextpage;
		}
	}




?>