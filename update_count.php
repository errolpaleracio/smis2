<?php
include 'db.php';
$stmt = $db->prepare('UPDATE product SET quantity = quantity - ? WHERE product_id=?');
$stmt->execute(array($_POST['quantity'], $_POST['product_id']));