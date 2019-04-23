<?php
include 'db.php';
$brand_name = $_POST['brand_name'];

$stmt = $db->prepare('INSERT INTO brand (brand_name) VALUES (:brand_name)');
$stmt->bindParam(':brand_name', $brand_name);
$result = $stmt->execute();
echo $result;
?>