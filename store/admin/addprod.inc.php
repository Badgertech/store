<?php
$catid = $_POST['catid'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$query = "INSERT INTO products (catid, description, price, quantity, onsale) VALUES ('$catid', '$desc', '$price', '$quantity')";
$result = mysqli_query($dbc, $query);
