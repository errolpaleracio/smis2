<?php
include 'db.php';
session_start();

$stmt = $db->prepare('UPDATE user_account SET password=?, password_hint=? WHERE user_account_id=?');
echo $stmt->execute(array(md5($_POST['password']), substr_replace($_POST['password'], str_repeat('*', strlen($_POST['password']) - 2), 1, strlen($_POST['password']) - 2), $_POST['user_account_id']));
$_SESSION['password'] = md5($_POST['password']);
