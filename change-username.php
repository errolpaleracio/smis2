<?php
include 'db.php';

session_start();
$stmt = $db->prepare('UPDATE user_account SET username=:username WHERE user_account_id=:user_account_id');
$stmt->bindParam(':username', $_POST['username']);
$stmt->bindParam(':user_account_id', $_POST['user_account_id']);
echo $stmt->execute();
$_SESSION['username'] = $_POST['username'];