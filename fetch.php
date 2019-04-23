
<?php
include 'db.php';
session_start();
$sql = 'SELECT sales.sales_id, product_name, sales.quantity, sales.quantity * product.unit_price as total_price, branch.branch_name, sold FROM sales INNER JOIN product ON sales.product_id=product.product_id INNER JOIN BRANCH ON sales.branch_id=branch.branch_id WHERE sales.branch_id=' . $_SESSION['branch_id'];
if((@$_GET['is_date_search'] === 'true')){
	$start = "'" . @$_GET['start_date'] . "'";
	$end = "'" . @$_GET['end_date'] . "'";
	$sql .= ' AND sold BETWEEN CAST(' . $start . ' AS DATE) AND CAST(' . $end . ' AS DATE)';
}
$stmt = $db->query($sql);

	
$sales = $stmt->fetchAll(PDO::FETCH_OBJ);
$output = array(
'draw' => intval(@$_GET['draw']),
'recordsTotal' => count($sales),
'recordsFiltered' => count($sales),
'data' => $sales
);
echo json_encode($output);
