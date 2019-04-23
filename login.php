<?php
include 'db.php';
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);
$stmt = $db->prepare("SELECT * FROM user_account WHERE username=? AND password=?");
$stmt->execute(array($username, $password));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if($result){
	$_SESSION['username'] = $username;
	$_SESSION['user_account_id'] = $result['user_account_id'];
	$_SESSION['password'] = $result['password'];
	$_SESSION['role_id'] = $result['role_id'];
	$_SESSION['name'] = $result['name'];
	$_SESSION['branch_id'] = $result['branch_id'];
	echo 1;
}else{
	echo 0;
}