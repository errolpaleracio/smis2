<?php
include 'db.php';
session_start();
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$unit_price = $_POST['unit_price'];
$sales_id = $_POST['sales_id'];

$sth = $db->query('SELECT * FROM product WHERE product_id='.$product_id);
$original_price = $sth->fetch(PDO::FETCH_OBJ)->original_price;
$stmt = $db->prepare('INSERT INTO sales_item(product_id, quantity, unit_price, sales_id, original_price) VALUES (:product_id, :quantity, :unit_price, :sales_id, :original_price)');
$stmt->bindParam(':product_id', $product_id);
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':unit_price', $unit_price);
$stmt->bindParam(':sales_id', $sales_id);
$stmt->bindParam(':original_price', $original_price);

echo $stmt->execute();