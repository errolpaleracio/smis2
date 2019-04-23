<?php
include 'db.php';
session_start();

$stmt = $db->prepare('INSERT INTO sales(product_id, quantity, branch_id, sold, unit_price, discount) VALUES (?, ?, ?, ?, ?, ?)');
$stmt->execute(array($_POST['product_id'], $_POST['quantity'], $_SESSION['branch_id'], date('y-m-d'), $_POST['unit_price'], $_POST['discount']));