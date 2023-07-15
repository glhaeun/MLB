<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productId = $_POST['pid'];
  $selectedQty = $_POST['qty'];

  // Retrieve the stock for the specified product
  $select_stock = $connect->prepare("SELECT stock FROM products WHERE id = ?");
  $select_stock->execute([$productId]);
  $product = $select_stock->fetch(PDO::FETCH_ASSOC);

  $response = ['stock' => $product['stock']];

  if ($selectedQty > $product['stock']) {
    $response['error'] = 'The selected quantity exceeds the available stock.';
  }

  header('Content-Type: application/json');
  echo json_encode($response);
}
?>
