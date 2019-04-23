<?php
include 'db.php';
$stmt = $db->prepare('SELECT * FROM product WHERE brand_id=:brand_id');
$stmt->bindParam(':brand_id', $_GET['brand_id']);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<select name="product_id" class="form-control">
<?php foreach($products as $product):?>
    <option value="<?php echo $product->product_id?>"><?php echo $product->product_name?></option>
	<?php endforeach;?> 
</select>