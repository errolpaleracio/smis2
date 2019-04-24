<?php
include 'db.php';
$sales_id = $_GET['sales_id'];
$stmt = $db->prepare('select sales_item.*, product_name from sales_item inner join product on sales_item.product_id=product.product_id WHERE sales_id=:sales_id;');
$stmt->bindParam(':sales_id', $sales_id);
$stmt->execute();
$sales_items = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $db->prepare('select discount from sales where sales_id=:sales_id');
$stmt->bindParam(':sales_id', $sales_id);
$stmt->execute();

$sale = $stmt->fetch(PDO::FETCH_OBJ);
$discount = $sale->discount;
?>

<table class="table">
    <thead>
	    <tr>
			<th>Product</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
		</tr>
    </thead>
    <tbody>
        <?php $total_price = 0;?>
        <?php foreach($sales_items as $sales_item):?>
            <tr>
                <td><?php echo $sales_item->product_name;?></td>
                <td><?php echo $sales_item->quantity;?></td>
                <td><?php echo $sales_item->unit_price;?></td>
                <td><?php echo $sales_item->quantity * $sales_item->unit_price;?></td>
                <?php $total_price += $sales_item->quantity * $sales_item->unit_price;?>
            </tr>
        <?php endforeach;?>
    </tbody>
    <tfoot>
        <tr style="background-color: #ddd;">
            <td></td>
            <td></td>
            <td>Total Amount:</td>
            <td><?php echo $total_price;?></td>
        </tr>
        <tr style="background-color: #ddd;">
            <td></td>
            <td></td>
            <td>Discount:</td>
            <td><?php echo $discount;?></td>
        </tr>
        <tr style="background-color: #ddd;">
            <td></td>
            <td></td>
            <td>Final Amount:</td>
            <td><?php echo $total_price - $discount;?></td>
        </tr>
    </tfoot>
        
</table>