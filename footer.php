<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">
		<form id="loginForm" class="form-horizontal">
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Username</label>
		    <div class="col-sm-10">
		      <input type="text" name="username" class="form-control" placeholder="Username" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" name="password" class="form-control" placeholder="Password" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-primary">Login</button>
			  <input type="button" id="forgotPassword" class="btn btn-default" value="Forgot password?">
		    </div>
		  </div>
		  
		</form>
			<div id="forgetPasswordField" class="hidden">
			<form id="getPasswordHintForm" class="form-horizontal">
			  <div class="form-group">
				<label class="col-sm-2 control-label">Username</label>
				<div class="col-sm-10">
				  <input type="text" name="check_username" id="checkUsername" class="form-control" placeholder="Username" required>
				  <span id="error_check_username" class="text-primary pull-left" style="font-size: 1.3em"></span>
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-primary pull-left">Get Password hint</button>
				</div>
			  </div>
		    </form> 
			</div>
      </div>
		
	  
    </div>
  </div>
</div>

<div class="modal fade" id="changeUsernameModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Username</h4>
      </div>
      <div class="modal-body">
		<form id="changeUsernameForm" class="form-horizontal">
		  <div class="form-group">
		    <label class="col-sm-4 control-label">Old Username</label>
		    <div class="col-sm-8">
		      <input type="text" name="old_username" class="form-control" placeholder="Old Username" disabled required>
		    </div>
		  </div>
		  
		   <div class="form-group">
		    <label class="col-sm-4 control-label">New Username</label>
		    <div class="col-sm-8">
		      <input type="text" name="new_username" class="form-control" placeholder="New Username" required>
			  <span id="error_new_username" class="text-danger"></span>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-4 col-sm-10">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		  </div>
		</form>        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
		<form id="changePasswordForm" class="form-horizontal">
		  <div class="form-group">
		    <label class="col-sm-4 control-label">Old Password</label>
		    <div class="col-sm-8">
		      <input type="password" name="old_password" class="form-control" placeholder="Old Password" required>
			  <span id="error_old_password" class="text-danger"></span>
		    </div>
		  </div>
		  
		   <div class="form-group">
		    <label class="col-sm-4 control-label">New Password</label>
		    <div class="col-sm-8">
		      <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
			  <span id="error_new_password" class="text-danger"></span>
		    </div>
		  </div>
		  
		   <div class="form-group">
		    <label class="col-sm-4 control-label">Repeat New Password</label>
		    <div class="col-sm-8">
		      <input type="password" name="confirm_password" class="form-control" placeholder="Repeat New Password" required>
			  <span id="error_confirm_password" class="text-danger"></span>
		    </div>
		   </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-4 col-sm-10">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		  </div>
		</form>        
      </div>
    </div>
  </div>
</div>
	
	<script>
			$.ajax({
				url: 'get_session_data.php',
				dataType: 'json',
				async: false,
				success: function(data) {
					$('input[name="old_username"]').val(data.username);
				}
			});
	
		$('#loginForm').submit(function(e){
			e.preventDefault();
			$.post('login.php', $(this).serialize(), function(data, textStatus, xhr) {
				console.log(xhr.responseText);
				if(xhr.responseText == 1)
					window.location.href='index.php';
				else{
					alert('Invalid username or password.')

				}
			});
		});

		$('#loginModal').on('hidden.bs.modal', function(e){
			$(this).find('input').val('');
		});
		$('#RegisterForm').submit(function(e){
			var password = $(this).find('input[name="password"]').val();
			var conf_password = $(this).find('input[name="conf_password"]').val();
			if(password != conf_password){
				alert('Password does not match!');
				e.preventDefault();
			}
		});
		
		

		
		$('#changePasswordForm').submit(function(e){
			e.preventDefault();
			var isValid = true;
			var old_password = $(this).find('input[name="old_password"]').val();
			var new_password = $(this).find('input[name="new_password"]').val();
			var confirm_password = $(this).find('input[name="confirm_password"]').val();
			
			if(confirm_password != new_password){
				isValid = false;
				$('#error_confirm_password').text('New password and repeat password must match.');
			}else{
				$('#error_confirm_password').text('');
			}
			
			$.ajax({
				url: 'get_session_data.php',
				dataType: 'json',
				async: false,
				success: function(data) {
					if($.md5(old_password) == data.password){
						$('#error_old_password').text('');
					}
					else{
						$('#error_old_password').text('Invalid password');
						isValid = false;
					}
				}
			});
			
			console.log(isValid);
			
			if(isValid){
				$.getJSON('get_session_data.php', function(data){
						
						$.post('change-password.php', {"password": new_password, "user_account_id": data.user_account_id}, function(data, textStatus, xhr) {
							if(xhr.responseText == 1){
								alert("Password Successfully Changed");
								location.reload();
							}
						});
				});
			}
		});
		
		$('#changeUsernameForm').submit(function(e){
			e.preventDefault();
			var isValid = true;
			
			var new_username = $(this).find('input[name="new_username"]').val();
			
			$.ajax({
				url: 'check-username.php',
				dataType: 'json',
				async: false,
				data: {"username": new_username},
				success: function(data) {
					console.log(data.count);
					if(data.count > 0){
						$('#error_new_username').text('Username is taken');
						isValid = false;
					}
					else{
						$('#error_new_username').text('');
					}
				}
			});
			
			if(isValid){
				$.getJSON('get_session_data.php', function(data){
					
						$.post('change-username.php', {"username": new_username, "user_account_id": data.user_account_id}, function(data, textStatus, xhr) {
							if(xhr.responseText == 1){
								alert("Username Successfully Changed");
								$('input[name="old_username"]').val('');
								$('input[name="new_username"]').val('');
								location.reload();
							}
						});
					
				});
			}
		});
		
		$('#forgotPassword').on('click', function(){
			$('#forgetPasswordField').toggleClass('hidden');
		});
		
		$('#getPasswordHintForm').on('submit', function(e){
			var username = $('#checkUsername').val();
			e.preventDefault();
			
			
			$.ajax({
				url: 'get-password-hint.php',
				//dataType: 'json',
				async: false,
				data: {"username": username},
				success: function(data) {
					if(data !== '')
						$('#error_check_username').text('Password hint: ' +  data);
					else
						$('#error_check_username').text('User does not exists');
				}
			});
			
		});
	</script>
</body>
</html>
