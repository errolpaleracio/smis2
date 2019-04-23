<?php
include 'db.php';
$sql = 'SELECT * FROM user_account WHERE username=:username';
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $_GET['username']);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode(array('count' => count($result)));