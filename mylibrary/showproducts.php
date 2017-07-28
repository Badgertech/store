<?php
	function showproducts($catid, $page, $currentpage, $newpage)
	{
		include "login.php";
		$query = "SELECT count(prodid) FROM products WHERE catid = $catid";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if ($row[0] == 0)
		{
			echo "<h2>Sorry, there are no products in this category</h2><hr>";
		}else{
			echo "<h2>Product Page</h2><hr>";
			$thispage = $page;
			$totalrecords = $row[0];
			$recordsperpage = 5;
			$offset = ($thispage - 1) * $recordsperpage;
			$totalpages = ceil($totalrecords/$recordsperpage);
			echo "<table style='width:100%; cellpadding:1; border=1'>";
			echo "<tr><th>Image</th><th>Product</th><th>Price</th><th>In Stock</th><th>Special</th></tr>";
			$query = "SELECT * FROM products WHERE catid=$catid LIMIT $offset, $recordsperpage";
			$result = mysqli_query($dbc, $query);
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$prodid = $row['prodid'];
				$description = $row['description'];
				$price = $row['price'];
				$quantity = $row['quantity'];
				$onsale = $row['onsale'];
				echo "<tr><td><img src='showimage.php?id=$prodid' width='80' height='60'></td>";
				echo "<td><a href='$newpage&id=$prodid'>$description</a></td>";
				echo "<td>$".$price."</td><td>$quantity</td>";
				if($onsale)
					echo "<td>On Sale!</td>";
				else
					echo "<td>&nbsp;</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}




?>