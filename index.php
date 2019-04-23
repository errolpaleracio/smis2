<?php
include 'main.php';
if(isset($_SESSION['branch_id'])){
	$sql = 'select count(*) as prod_count from product where quantity <= critical_lvl AND archived=0 AND branch_id='.$_SESSION['branch_id'];
	$prod = $db->query($sql);
	$result = $prod->fetch(PDO::FETCH_OBJ)->prod_count;
	if($result > 0)
		echo '<script>alert("There are products that has reach its critical levels. Please Replenish them.")</script>';
	
}
