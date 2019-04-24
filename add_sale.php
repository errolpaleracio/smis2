<?php
include 'db.php';
session_start();
$sales_date =  date('y-m-d');
$discount = $_POST['discount'];
$branch_id = $_SESSION['branch_id'];

$stmt = $db->prepare('INSERT INTO sales(sales_date, discount, branch_id) VALUES (:sales_date, :discount, :branch_id)');
$stmt->bindParam(':sales_date', $sales_date);
$stmt->bindParam(':discount', $discount);
$stmt->bindParam(':branch_id', $branch_id);

$stmt->execute();
echo $db->lastInsertId();