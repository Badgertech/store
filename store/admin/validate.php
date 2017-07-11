<?php 
session_start();
include "../mylibrary/login.php";
$userid = $_POST['userid'];
$password = $_POST['password'];

$query = "SELECT userid, name FROM admins WHERE userid='$userid' and password=PASSWORD('$password')";
$result = mysqli_query($dbc, $query);
if(mysqli_num_rows($result) == 0)
{
	echo "<h2 style='color:red'><b>Error:</b> Account not validated</h2>";
	echo "<a href='admin.php'>Try Again</a>";

}else{
	$_SESSION['store_admin'] = $userid;
	header("Location: admin.php");
}
?>