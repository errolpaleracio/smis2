<?php
include 'db.php';
$stmt = $db->prepare('SELECT * FROM product WHERE product_id=?');
$stmt->execute(array($_GET['product_id']));
echo json_encode($stmt->fetch(PDO::FETCH_OBJ));
