<?php 
include 'db.php';

$brand_name = $_GET['brand_name'];
$stmt = $db->prepare('SELECT COUNT(*) AS product_count FROM brand WHERE brand_name=:brand_name');
$stmt->bindParam(':brand_name', $brand_name);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_OBJ);

echo $result->product_count;

?>