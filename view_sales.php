<?php
$nav_path = 'nav.php';
include 'header.php';
$sql = 'SELECT sales.*, sum(unit_price * quantity) - discount as total_price,branch_name FROM sales INNER JOIN BRANCH ON sales.branch_id=branch.branch_id inner join sales_item on sales.sales_id=sales_item.sales_id ';
$sql2 = 'SELECT sum(unit_price * quantity) - sum(discount) as total_sales, branch_name FROM sales INNER JOIN BRANCH ON sales.branch_id=branch.branch_id inner join sales_item on sales.sales_id=sales_item.sales_id ';
if($_SESSION['branch_id'] != '3'){
	$sql .= ' WHERE sales.branch_id=' . $_SESSION['branch_id'];
	$sql2 .= ' WHERE sales.branch_id='.$_SESSION['branch_id'];
}else{
	$sql .= ' WHERE sales.branch_id=' . $_GET['branch_id'];
	$sql2 .= ' WHERE sales.branch_id='.$_GET['branch_id'];
}
$stmt = $db->query($sql);
if((@$_GET['search'])){
	$start = "'" . @$_GET['start_date'] . "'";
	$end = "'" . @$_GET['end_date'] . "'";
	$sql .= ' AND sales_date BETWEEN CAST(' . $start . ' AS DATE) AND CAST(' . $end . ' AS DATE)';
	$sql2 .= ' AND sales_date BETWEEN CAST(' . $start . ' AS DATE) AND CAST(' . $end . ' AS DATE)';
}

$sql .= ' group by sales.sales_id';
//echo $sql . '<br>' . $sql2;
$stmt = $db->query($sql);
$sales = $stmt->fetchAll(PDO::FETCH_OBJ);
// echo '<pre>', var_dump($sales), '</pre>';
$sth = $db->query($sql2);
$total_sales = $sth->fetch(PDO::FETCH_OBJ);
?>
<div class="container">
    
	<h1>Total Sales: <?php echo $total_sales->total_sales?></h1>
	<div class="row">
		<form method="GET" action="">
		<?php if(isset($_GET['branch_id'])):?>
			<input type="hidden" name="branch_id" value="<?php echo $_GET['branch_id']?>">
		<?php endif;?>
		<div class="input-daterange">
			<div class="col-sm-3">
				<input type="text" name="start_date" id="start_date" class="form-control" value="<?php echo @$_GET['start_date']?>"/>
			</div>
			<div class="col-sm-3">
				<input type="text" name="end_date" id="end_date" class="form-control" value="<?php echo @$_GET['end_date']?>"/>
			</div>      
		</div>
		<div class="col-md-4">
			<input type="submit" name="search" id="search" value="Search" class="btn btn-info" />
		</div>
		</form>
    </div>
	<hr/>
	<table class="table table-bordered" id="order_data">	
		
		<thead>
			<tr>
				<th>Sale Id</th>
				<!-- <th>Total Price</th> -->
				<th>Total Price</th>
				<th>Discount</th>
				<th>Date of Transaction</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($sales as $s):?>
				<tr>
					<td><?php echo $s->sales_id?></td>
					<td><?php echo $s->total_price?></td>
					<td><?php echo $s->discount?></td>
					<td><?php echo date_format(date_create($s->sales_date), 'M d, Y')?></td>
					<td><input type="button" class="btn btn-primary show_item_id" id="item-<?php echo $s->sales_id?>" value="View Details" data-toggle="modal" data-target="#viewDetailsModal"></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
<!-- View Details Modal -->
<div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sales Items</h4>
      </div>
      <div class="modal-body" id="viewDetails">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- View Details Modal -->
<script>
function reload_item_details(id){
	var url = 'get_sales_item.php';
	if(id != 0)
		url += '?sales_id=' + id;
	$('#viewDetails').load(url);
}

$('.show_item_id').on('click', function(e){
	var id = $(this).attr('id');
	var sales_id = id.substring(5);
	reload_item_details(sales_id);
});

$('.input-daterange').datepicker({
	todayBtn:'linked',
	format: "yyyy-mm-dd",
	autoclose: true
});
$('#order_data').DataTable({
	dom: 'Bfrtip',
	//buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
	buttons: [
		{
			extend: 'pdf',
			exportOptions: {
				columns: [0,1,2,3]
			},customize: function(doc) {
          //pageMargins [left, top, right, bottom] 
          doc.pageMargins = [ 150, 20, 150, 20 ];
       }
		},{
			extend: 'print',
			exportOptions: {
				columns: [0,1,2,3]
			}
		},{
			extend: 'excel',
			exportOptions: {
				columns: [0,1,2,3]
			}
		},{
			extend: 'csv',
			exportOptions: {
				columns: [0,1,2,3]
			}
		}
	]
});

	// {
	// 		extend: 'copy',
	// 		exportOptions: {
	// 			columns [1,2,3]
	// 		}
	// 	},{
	// 		extend: 'csv',
	// 		exportOptions: {
	// 			columns [1,2,3]
	// 		}
	// 	},{
	// 		extend: 'excel',
	// 		exportOptions: {
	// 			columns [1,2,3]
	// 		}
	// 	},{
	// 		extend: 'pdf',
	// 		exportOptions: {
	// 			columns [1,2,3]
	// 		}
	// 	},{
	// 		extend: 'print',
	// 		exportOptions: {
	// 			columns [1,2,3]
	// 		}
	// 	}
</script>

<?php
include 'footer.php';