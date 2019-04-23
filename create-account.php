
<?php
$nav_path = 'nav.php';
include 'header.php';

if(isset($_POST['submit'])){
	
	$stmt = $db->prepare('INSERT INTO user_account(username, password, name, address, contact_no, branch_id, password_hint) values (?, ?, ?, ?, ?, ?, ?)');
	
	$data = array(
		$_POST['create_username'],
		MD5($_POST['create_password']),
		$_POST['name'],
		$_POST['address'],
		$_POST['contact_no'],
		$_POST['branch_id'],
		substr_replace($_POST['create_password'], str_repeat('*', strlen($_POST['create_password']) - 2), 1, strlen($_POST['create_password']) - 2)
	);
	$result = $stmt->execute($data);
	if($result){
		echo '<script>window.onload = function(){alert("Account successfully added.")}</script>';
	}
	
}
?>

<div class="container">
	<h3>Create Account</h3>
	<form class="form-horizontal" method="post" id="createAccountForm">
		<div class="form-group">
			<label class="col-sm-2 control-label">Username</label>
			<div class="col-sm-4">
				<input type="text" name="create_username" placeholder="Username" class="form-control" required>
				<span id="error_create_username" class="text-danger"></span>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Password</label>
			<div class="col-sm-4">
				<input type="password" name="create_password" placeholder="Password" class="form-control" required>
				<span id="error_create_password" class="text-danger"></span>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Repeat Password</label>
			<div class="col-sm-4">
				<input type="password" name="create_repeat_password" placeholder="Repeat Password" class="form-control" required>
				<span id="error_create_repeat_password" class="text-danger"></span>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-4">
				<input type="text" name="name" placeholder="Name" class="form-control" required>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Address</label>
			<div class="col-sm-4">
				<input type="text" name="address" placeholder="Address" class="form-control" required>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Contact No</label>
			<div class="col-sm-4">
				<input type="number_format" name="contact_no" placeholder="Contact No" class="form-control" required maxlength="11">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Branch</label>
			<div class="col-sm-4">
				<select name="branch_id" class="form-control">
					<option value="1">Branch 1</option>
					<option value="2">Branch 2</option>
				</select>
			</div>
		</div>
		
		
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<input type="submit" name="submit" class="btn btn-primary">
			</div>
		</div>						
	</form>	
	<table class="table table-bordered" id="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Username</th>
				<th>Address</th>
				<th>Contact No</th>
				<th>Branch Name</th>
			</tr>
		</thead>
		<?php 
		$sql = 'SELECT * FROM user_account INNER JOIN branch ON user_account.branch_id=branch.branch_id WHERE user_account.branch_id != 3';
		$stmt = $db->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_OBJ);
		?>
		<tbody>
		<?php foreach($result as $row):?>
		<tr>
			<td><?php echo $row->name;?></td>
			<td><?php echo $row->username;?></td>
			<td><?php echo $row->address;?></td>
			<td><?php echo $row->contact_no;?></td>
			<td><?php echo $row->branch_name;?></td
		</tr>
		<?php endforeach;?>
		</tbody>
	</table>
</div>


<script>
$(document).ready(function(){
	$('#table').DataTable();
});

$('#createAccountForm').on('submit', function(e){
	
	var is_valid = true;
	var new_username = $('input[name="create_username"]').val();
	var create_new_password = $('input[name="create_password"]').val();
	var create_confirm_password = $('input[name="create_repeat_password"]').val();
	
	$.ajax({
		url: 'check-username.php',
		dataType: 'json',
		async: false,
		data: {"username": new_username},
		success: function(data) {
			console.log(data.count);
			if(data.count > 0){
				$('#error_create_username').text('Username is taken');
				is_valid = false;
			}
			else{
				$('#error_create_username').text('');
			}
		}
	});
	
	if(create_new_password !== create_confirm_password){
		$('#error_create_repeat_password').text('New password and repeat password must match.');
		is_valid = false;
	}else{
		$('#error_create_repeat_password').text('');
	}
	
	if(!is_valid)
		e.preventDefault();
});
</script>
<?php
include 'footer.php';