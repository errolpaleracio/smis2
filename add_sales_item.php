<?php
include 'db.php';
session_start();
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$unit_price = $_POST['unit_price'];
$sales_id = $_POST['sales_id'];

$stmt = $db->prepare('INSERT INTO sales_item(product_id, quantity, unit_price, sales_id) VALUES (:product_id, :quantity, :unit_price, :sales_id)');
$stmt->bindParam(':product_id', $product_id);
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':unit_price', $unit_price);
$stmt->bindParam(':sales_id', $sales_id);

echo $stmt->execute();