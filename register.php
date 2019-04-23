<?php
$nav_path = 'nav.php';
include 'header.php';

if(isset($_POST['submit'])){
	
	$stmt = $db->prepare('INSERT INTO user_account (username, password, name, address, contact_no, birth_date, role_id) VALUES (?, ?, ?, ?, ?, ?, ?)');
	$result = $stmt->execute(array($_POST['username'], $_POST['password'], $_POST['name'], $_POST['address'], $_POST['contact_no'], $_POST['birth_date'], 2));
	if($result > 0)
		echo '<script>window.onload=function(){alert("Account Successfully Registered")}</script>';
	else
		echo '<script>alert("window.onload=function(){Account Was not Registered.")}</script>';
	
}


?>
<div class="container">
<h3>Register</h3>
<form action="" method="post" class="form-horizontal" id="RegisterForm">
	<div class="form-group">
		<label class="col-sm-2 control-label">Name</label>	
		<div class="col-sm-4">
			<input type="text" name="name" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Username</label>
		<div class="col-sm-4">
			<input type="text" name="username" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Password</label>
		<div class="col-sm-4">
			<input type="password" name="password" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Confirm Password</label>
		<div class="col-sm-4">
			<input type="password" name="conf_password" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Address</label>
		<div class="col-sm-4">
			<input type="text" name="address" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Contact No</label>
		<div class="col-sm-4">
			<input type="number_format" name="contact_no" class="form-control" maxlength="11" required>
			
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Birthday</label>
		<div class="col-sm-4">
			<input type="date" name="birth_date" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-4 col-sm-offset-2">
			<input type="submit" name="submit" value="Register" class="btn btn-primary">
		</div>
	</div>				
</form>
</div>
<?php 
include 'footer.php';