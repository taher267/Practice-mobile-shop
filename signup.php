<?php include_once("header.php");
session_start();
$message = '';
if (!isset($_COOKIE['Auth'])) {
	if ($_SERVER['REQUEST_METHOD']='POST') {
		if (isset($_POST['signup_submit'])) {
			if (!empty($_POST['first_name']) && !empty($_POST['last_name'])  && !empty($_POST['user_name'])  && !empty($_POST['user_email'])  && !empty($_POST['user_pass']) ) {
				$salt = "$2y$07$".'minimumTwintyTwoDigits';
				 $userpass= crypt($_POST['user_pass'], $salt);
				
				$NewRegArr = array(
					'first_name' =>$_POST['first_name'] ,
					'last_name' =>$_POST['last_name'] ,
					'user_name' =>$_POST['user_name'] ,
					'user_email' =>$_POST['user_email'] ,
					'user_pass' =>$userpass

				 );
				$Login->insertUser($NewRegArr);
			}else{
				
					$fields = array(
					'first_name' =>$_POST['first_name'] ,
					'last_name' =>$_POST['last_name'] ,
					'user_name' =>$_POST['user_name'] ,
					'user_email' =>$_POST['user_email'] ,
					'user_pass' =>$_POST['user_pass']

				 );
					$Login->userValidation($fields);
			}
		}
	}
}
 ?>
 <?php ?>
 
<div class="container">
	<div class="row">
		<div class="col-lg-5 mx-auto my-3">
			<div class="">
				<div class="card">
					<div class="card">
						<div class="card-header text-center">
							<h4>Signup Here!</h4>
						</div>
						<div class="card-body">
							<?php 
								if (isset($message)) {
									echo $message;
								}

							 ?>
							<form method="POST">
								<div class="input-group my-3">
									<span class="input-group-text">First Name:</span>
									<input type="text"  name="first_name" value="" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">Last Name:</span>
									<input type="text"  value="" name="last_name" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">User Name:</span>
									<input type="text"  value="" name="user_name" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">Email</span>
									<input type="email"  value="" name="user_email" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">Password</span>
									<input type="password"  name="user_pass" value="" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">Signup</span>
									<input type="submit" name="signup_submit" class="form-control btn btn-primary">
								</div>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include'footer.php'; ?>