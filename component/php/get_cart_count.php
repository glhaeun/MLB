<?php
include 'connect.php';

// Retrieve the cart count from the database
$select_count = $connect->prepare("SELECT SUM(quantity) AS count FROM cart");
$select_count->execute();
$count = $select_count->fetch(PDO::FETCH_ASSOC)['count'];

echo $count;
?>
