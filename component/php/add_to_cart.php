<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productId = $_POST['pid'];
  $selectedQty = $_POST['qty'];

  // Retrieve product details
  $select_product = $connect->prepare("SELECT * FROM products WHERE id = ?");
  $select_product->execute([$productId]);
  $product = $select_product->fetch(PDO::FETCH_ASSOC);

  // Calculate subtotal
  $subtotal = $product['price'] * $selectedQty;

  // Check if the product already exists in the cart
  $select_cart = $connect->prepare("SELECT * FROM cart WHERE pid = ?");
  $select_cart->execute([$productId]);
  $existingCartItem = $select_cart->fetch(PDO::FETCH_ASSOC);

  if ($existingCartItem) {
    // Update the quantity and subtotal of the existing cart item
    $newQuantity = $existingCartItem['quantity'] + $selectedQty;
    $newSubtotal = $existingCartItem['subtotal'] + $subtotal;

    // Check if the updated quantity exceeds the available stock
    if ($newQuantity <= $product['stock']) {
      $update_cart = $connect->prepare("UPDATE cart SET quantity = ?, subtotal = ? WHERE pid = ?");
      $update_cart->execute([$newQuantity, $newSubtotal, $productId]);
      echo json_encode(['success' => true]);
    } else {
        echo json_encode(
            [
              'success' => false,
              'error' => 'The selected quantity exceeds the available stock.' . "\n\n" .
                'Remaining stock for this item is ' . $product['stock']
            ],
            JSON_UNESCAPED_UNICODE
          );
    }
  } else {
    // Add the product as a new item to the cart
    if ($selectedQty <= $product['stock']) {
      $query = "INSERT INTO cart (pid, name, price, quantity, image, subtotal) VALUES (?, ?, ?, ?, ?, ?)";
      $insert_cart = $connect->prepare($query);
      $insert_cart->execute([$productId, $product['name'], $product['price'], $selectedQty, $product['image_a'], $subtotal]);
      echo json_encode(['success' => true]);
    } else {
        echo json_encode(
            [
              'success' => false,
              'error' => 'The selected quantity exceeds the available stock.' . "\n\n" .
                'Remaining stock for this item is ' . $product['stock']
            ],
            JSON_UNESCAPED_UNICODE
          );
    }
  }
}
