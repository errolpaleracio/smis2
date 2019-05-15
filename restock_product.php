<?php
include 'db.php';
$id = $_POST['id'];
$qty = $_POST['qty'];
echo $qty, ' id: ', $id;
$stmt = $db->prepare('UPDATE product SET quantity = quantity + ? WHERE product_id=?');
echo $stmt->execute(array($qty, $id));
header('location: product.php');