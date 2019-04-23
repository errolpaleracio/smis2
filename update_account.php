
<?php
$nav_path = 'nav.php';
include 'header.php';

if(isset($_POST['submit'])){
	$stmt = $db->prepare('INSERT INTO PRODUCT (product_name, unit_price, quantity, branch_id, critical_lvl) values (?, ?, ?, ?, ?)');
	$result = $stmt->execute(array($_POST['product_name'], $_POST['unit_price'], $_POST['quantity'], $_SESSION['branch_id'], $_POST['critical_lvl']));
	if($result){
		echo '<script>window.onload = function(){alert("Product successfully added.")}</script>';
	}
}
?>

<div class="container">

	<form class="form-horizontal" method="post">
		<div class="form-group">
			<label class="col-sm-2 control-label">Product Name</label>
			<div class="col-sm-4">
				<input type="text" name="product_name" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Unit Price</label>
			<div class="col-sm-4">
				<input type="text" name="unit_price" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Quantity</label>
			<div class="col-sm-4">
				<input type="text" name="quantity" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Critical Level</label>
			<div class="col-sm-4">
				<input type="text" name="critical_lvl" class="form-control" required>
			</div>
		</div>		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<input type="submit" name="submit" class="btn btn-primary">
			</div>
		</div>						
	</form>
	
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="restockModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Restock product</h4>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" action="restock_product.php" method="post">
				<div class="form-group">
					<label class="control-label col-sm-4">Quantity</label>
					<div class="col-sm-8">
						<input type="number" min="1" name="qty" class="form-control" required>
						<input type="hidden" name="id">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-12">
						<input type="submit" class="btn btn-primary">
					</div>
				</div>
			</form>
		</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';