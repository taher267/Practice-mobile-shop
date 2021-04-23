<?php include_once("header.php");
//print_r($Login->CanLogin());
 ?>
 <?php if (isset($_COOKIE['Auth'])): 
 	$Auth =  $_COOKIE['Auth'];
 	$UserInfo = $Login->checkCookie($Auth);
 	// print_r($UserInfo);
 	 endif; ?>
 <div class="container">
	<div class="row">
		<div class="col-lg-5 mx-auto my-3">
			<div class="">
				<div class="card">
					<div class="card">
						<div class="card-header text-center">
							<h4>Profile</h4>
						</div>
						<div class="card-body">
							<?php 
							if(isset($_COOKIE['Auth'])):
							array_map(function($user){?>
								<div class="input-group my-3">
									<span class="input-group-text">First Name:</span>
									<input type="text" disabled value="<?php echo $user['first_name'] ?>" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">First Name:</span>
									<input type="text" disabled value="<?php echo $user['last_name'] ?>" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">User Name:</span>
									<input type="text" disabled value="<?php echo $user['user_name'] ?>" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">Email</span>
									<input type="text" disabled value="<?php echo $user['user_email'] ?>" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">USER ID</span>
									<input type="text" disabled value="<?php echo $user['user_id'] ?>" class="form-control">
								</div>
								<?php }, $UserInfo); else: header("Location:signup.php"); endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once'footer.php'; ?>