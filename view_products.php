<?php
$nav_path = 'nav.php';
include 'header.php';

$stmt = $db->query('SELECT * FROM product');
$products = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container">
<div class="col-sm-12">
	<h3>Stocks</h3>
</div>
<?php foreach($products as $p):?>
	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-sm-6" style="border-right: 1px solid black">
					<a href="#" class="thumbnail"><img src="img/social_logo.jpg"></a>
				</div>
				<div class="col-sm-6">
				<br><br>
					<strong><?php echo $p->product_name;?></strong>
					<strong style="font-size: 2em;">Php<?php echo $p->unit_price?></strong>
									<center><strong><?php echo $p->quantity;?>pc</strong><center>	
				</div>
			</div>
		</div>
	</div>
<?php endforeach;?>
</div>
<script>
	
<?php
include 'footer.php';