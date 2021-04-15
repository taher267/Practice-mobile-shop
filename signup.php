<?php include_once("header.php");
//print_r($Login->CanLogin());
 ?>
 <?php ?>
 
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
						
								<div class="input-group my-3">
									<span class="input-group-text">First Name:</span>
									<input type="text" required value="" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">First Name:</span>
									<input type="text" required value="" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">User Name:</span>
									<input type="text" required value="" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">Email</span>
									<input type="email" required value="" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">Password</span>
									<input type="password" required value="" class="form-control">
								</div>
								<div class="input-group my-3">
									<span class="input-group-text">Signup</span>
									<input type="submit" class="form-control btn btn-primary">
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</main>
<!-- start #footer -->
<footer id="footer" class="bg-dark text-white py-5">
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-12">
			<h4 class="font-rubik font-size-20">Mobile Shopee</h4>
			<p class="font-size-14 font-rale text-white-50">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.</p>
		</div>
		<div class="col-lg-4 col-12">
			<h4 class="font-rubik font-size-20">Newslatter</h4>
			<form class="form-row">
				<div class="col">
					<input type="text" class="form-control" placeholder="Email *">
				</div>
				<div class="col">
					<button type="submit" class="btn btn-primary mb-2">Subscribe</button>
				</div>
			</form>
		</div>
		<div class="col-lg-2 col-12">
			<h4 class="font-rubik font-size-20">Information</h4>
			<div class="d-flex flex-column flex-wrap">
				<a href="#" class="font-rale font-size-14 text-white-50 pb-1">About Us</a>
				<a href="#" class="font-rale font-size-14 text-white-50 pb-1">Delivery Information</a>
				<a href="#" class="font-rale font-size-14 text-white-50 pb-1">Privacy Policy</a>
				<a href="#" class="font-rale font-size-14 text-white-50 pb-1">Terms & Conditions</a>
			</div>
		</div>
		<div class="col-lg-2 col-12">
			<h4 class="font-rubik font-size-20">Account</h4>
			<div class="d-flex flex-column flex-wrap">
				<a href="#" class="font-rale font-size-14 text-white-50 pb-1">My Account</a>
				<a href="#" class="font-rale font-size-14 text-white-50 pb-1">Order History</a>
				<a href="#" class="font-rale font-size-14 text-white-50 pb-1">Wish List</a>
				<a href="#" class="font-rale font-size-14 text-white-50 pb-1">Newslatters</a>
			</div>
		</div>
	</div>
</div>
</footer>
<div class="copyright text-center bg-dark text-white py-2">
<p class="font-rale font-size-14">&copy; Copyrights 2020. Desing By <a href="#" class="color-second">Daily Tuition</a></p>
</div>
<!-- !start #footer -->
<script src="<?php echo $url;?>assets/js/jquery-3.6.0.slim.min.js"></script>
<script src="<?php echo $url;?>assets/js/popper.min.js"></script>
<script src="<?php echo $url;?>assets/js/bootstrap.min.js"></script>
<!-- Owl Carousel Js file -->
<script src="<?php echo $url;?>assets/js/owl.carousel.min.js"></script>
<!--  isotope plugin cdn  -->
<script src="<?php echo $url;?>assets/js/isotope.pkgd.min.js"></script>
<!-- Custom Javascript -->
<script src="<?php echo $url;?>index.js"></script>
</body>
</html>