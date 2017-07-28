<?php

	function showproducts($catid, $page, $currentpage, $newpage)
	{


include "login.php";
	

		$query = "SELECT COUNT(prodid) FROM products WHERE catid = $catid";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if($row[0] == 0)
		{
			echo "<h2>Sorry, there are no products in that category.</h2><hr>";
			echo "<a href='admin.php'>Home</a>";	
		} else
		{
			
			
			$thispage = $page;
			$totrecords = $row[0];
			$recordsperpage = 5;
			$offset = ($thispage -1) * $recordsperpage;
			$totpages = ceil($totrecords / $recordsperpage);

			echo "<table id='sprod'>";
			echo "<tr><th>Image</th><th>Product</th><th>Price</th><th>QTY</th><th>Special</th></tr>";
			$query = "SELECT * FROM products WHERE catid = $catid LIMIT $offset, $recordsperpage";
			$result = mysqli_query($dbc, $query);
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				$prodid = $row['prodid'];
				$description = $row['description'];
				$price = $row['price'];
				$quantity = $row['quantity'];
				$onsale = $row['onsale'];
				echo "<tr><td><img src='showimage.php?id=$prodid' width='80' heigh='60'></td>";
				echo"<td>$prodid</td>";
				echo "<td>$description</td>";
				echo "<td>$price</td>";
				echo "<td>$quantity</td>";
				if($onsale)
				{
					echo "<td style='font-size:24px; color:green; font-weight:bold; text-align:center;'>$</td></tr>";
				}else{
					echo "<td>&nbsp;</td></tr>";
				}
			}
			if($thispage > 1)
			{
				$page = $thispage -1;
				$prevpage = "<a href='$currentpage&cat=$catid&page=$page'>Prev </a>";
			} else
			{
				$prevpage = "";
			}
			if($thispage < $totpages)
			{
				$page = $thispage +1;
				$nextpage = "<a href='$currentpage&cat=$catid&$page'>Next </a>";
			} else
			{
				$nextpage = "";
			}
			echo "</table>";
			if ($totrecords > 1)
				echo $prevpage." ".$nextpage;
		}
	}





?>
