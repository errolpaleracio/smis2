<?php
include 'db.php';

$stmt = $db->prepare('SELECT password_hint FROM user_account WHERE username=:username');
$stmt->bindParam(':username', $_GET['username']);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_OBJ);

if($result != false)
	echo $result->password_hint;
else
	echo '';