<h2>Status</h2><hr>
<?php
$query = "SELECT prodid FROM products";
$result= mysqli_query($dbc, $query);
$totprods = mysqli_num_rows($result);
echo "Products in Store:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  $totprods<br>";
$query = "SELECT prodid FROM products WHERE quantity = '0'";
$result= mysqli_query($dbc, $query);
$outofstock = mysqli_num_rows($result);
echo "Products Out of Stock:&nbsp;&nbsp; $outofstock<br>";
$query = "SELECT orderid FROM orders WHERE status = 'pending'";
$result = mysqli_query($dbc, $query);
$pending = mysqli_num_rows($result);
echo "Pending Orders: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  $pending<br>";

?>