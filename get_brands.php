<?php
include 'db.php';
$stmt = $db->query('SELECT * FROM brand order by brand_name');
$brands = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<select name="brand_id" class="form-control">
    <?php foreach($brands as $brand):?>
        <option value="<?php echo $brand->brand_id?>"><?php echo $brand->brand_name?></option>
    <?php endforeach;?>
</select>

    
