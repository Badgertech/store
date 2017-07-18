<?php
$userid = $_SESSION['store_admin'];

$query = "SELECT name FROM admins WHERE userid = '$userid'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$name = $row['name'];
echo "<h2>Welcome $name<h2><hr>";
$date = date("l, F j, Y");
echo "<h3>Today's date is $date</h3>";
echo "<h3>Admin Messages:</h3>";
if(is_readable('../mylibrary/dailymessages.txt'))
{
	$message = file_get_contents('../mylibrary/dailymessages.txt');
	$message = nl2br($message);
	echo $message;
}
else{
	echo "No messages today<br>";

}
echo "<h3 >Products currently on sale:</h3>";
$query = "SELECT prodid, description, price, quantity FROM products WHERE onsale = 1";
$result = mysqli_query($dbc, $query);
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
	$prodid = $row['prodid'];
	$description = $row['description'];
	$price = $row['price'];
	$quantity = $row['quantity'];
	printf("<a href='admin.php?content=updateproduct&id=$prodid'>%s</a>   - $%.2lf",$description,$price);
	if($quantity ==0){
		echo "<span style='color:#cc0000'> &nbsp; &nbsp; &nbsp;OUT OF STOCK</span><br>";
		echo "<br>";
	}
}


?>