<?php
include 'connect.php';

$in_cart = 0;
$select_cart = $connect->prepare("SELECT quantity FROM cart");
$select_cart->execute();

while ($fetch_incart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
    $in_cart += $fetch_incart['quantity'];
}

echo $in_cart;
?>