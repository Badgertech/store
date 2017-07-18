<?php 

$host = "localhost";
$user = "storeadmin";
$password = "password";
$db = "store";

$dbc = mysqli_connect("$host", "$user", "$password", "$db") or die('<h2 color="red">Could not connect to database.'.mysqli_connect_error().'</h2><hr>');