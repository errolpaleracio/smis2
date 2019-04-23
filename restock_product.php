<?php
include 'db.php';
$id = $_POST['id'];
$qty = $_POST['qty'];

$stmt = $db->prepare('UPDATE product SET quantity = quantity + ? WHERE product_id=?');
$stmt->execute(array($qty, $id));
header('location: product.php');