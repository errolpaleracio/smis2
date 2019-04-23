<?php
$nav_path = 'nav.php';
include 'header.php';


if(isset($_POST['submit'])){
	$stmt = $db->prepare('UPDATE product SET product_name=?, unit_price=?, critical_lvl=?, brand_id=? WHERE product_id=?');
	$result = $stmt->execute(array($_POST['product_name'], $_POST['unit_price'], $_POST['critical_lvl'], $_POST['brand_id'], $_POST['product_id']));
	if($result){
		echo '<script>window.onload = function(){alert("Product successfully updated.")}</script>';
	}
}
$stmt = $db->query('SELECT * FROM PRODUCT WHERE product_id=' . $_GET['product_id']);
$product = $stmt->fetch(PDO::FETCH_OBJ);
?>
<div class="container">
	<h3>Update Product</h3>
	<form class="form-horizontal" method="post">
		<input type="hidden" name="product_id" value="<?php echo $_GET['product_id']?>">
		<div class="form-group">
			<label class="col-sm-2 control-label">Product Name</label>
			<div class="col-sm-4">
				<input type="text" name="product_name" value="<?php echo $product->product_name?>" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Unit Price</label>
			<div class="col-sm-4">
				<input type="text" name="unit_price" value="<?php echo $product->unit_price?>" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Critical Level</label>
			<div class="col-sm-4">
				<input type="text" name="critical_lvl" value="<?php echo $product->critical_lvl?>" class="form-control" required>
			</div>
		</div>
		<?php
		$stmt = $db->query('SELECT * FROM brand order by brand_name');
		$brands = $stmt->fetchAll(PDO::FETCH_OBJ);
		?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Brand</label>
			<div class="col-sm-4" id="brandId">
				<select name="brand_id" class="form-control">
					<?php foreach($brands as $brand):?>
						<option value="<?php echo $brand->brand_id?>" <?php if($product->brand_id==$brand->brand_id) echo 'selected'?> ><?php echo $brand->brand_name?></option>
					<?php endforeach;?>
				</select>
			</div>
		</div>		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<input type="submit" name="submit" class="btn btn-primary">
			</div>
		</div>						
	</form>
</div>
<?php
include 'footer.php';