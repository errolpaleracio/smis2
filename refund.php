<?php
include 'db.php';
$sales_item_id =  $_GET['sales_item_id'];

$stmt1 = $db->prepare('SELECT * FROM sales_item WHERE sales_item_id=:sales_item_id');
$stmt1->bindParam(':sales_item_id', $sales_item_id);
$stmt1->execute();
$sales_item = $stmt1->fetch(PDO::FETCH_OBJ);

$product_id = $sales_item->product_id;
$quantity = $_GET['quantity'];
$sales_id = $sales_item->sales_id;

echo 'qty: ', $quantity, '<br>';;
$stmt2 = $db->prepare('UPDATE sales_item SET quantity=quantity-?, refunded=? WHERE sales_item_id=?');
echo 'stmt2: ', $stmt2->execute(array($quantity, $quantity, $sales_item_id)), '<br>';
echo 'sales_item_id: ', $sales_item_id, '<br>';

$stmt3 = $db->prepare('UPDATE product SET quantity=quantity+:quantity WHERE product_id=:product_id');
$stmt3->bindParam(':quantity', $quantity);
$stmt3->bindParam(':product_id', $product_id);
echo 'stmt3: ', $stmt3->execute(), '<br>';
header('location: http://localhost/smis-master/view_item_details.php?sales_id=' . $sales_id);