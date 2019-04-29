<?php
include 'db.php';

$product_id = $_GET['product_id'];
$stmt = $db->prepare('SELECT critical_lvl, quantity from product where product_id=:product_id');
$stmt->bindParam(':product_id', $product_id);
$stmt->execute();

$product = $stmt->fetch(PDO::FETCH_OBJ);
echo json_encode($product);