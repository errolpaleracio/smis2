<?php
include 'db.php';
$sql = 'update product set archived=0 WHERE product_id=?';
$stmt = $db->prepare($sql);

$data = array($_GET['product_id']);
$stmt->execute($data);
header('location: product.php');