<?php include'includes/headers.php'; ?>
<?php include'includes/navbar.php'; ?>
<?php
include_once("dbCon.php");
$conn =connect();
if(isset($_POST['register'])){
	$name= mysqli_real_escape_string($conn,$_POST['name']);
	$email= mysqli_real_escape_string($conn,$_POST['email']);
	$password= mysqli_real_escape_string($conn,md5($_POST['password']));

	$sql="INSERT INTO `user_info`(`name`, `email`, `password`)
				VALUES ('$name','$email','$password')";
	if($conn->query($sql)){
		$_SESSION['msg'] = "Registration Successful! Sign In to Continue!";
		header('Location:login');
	}
}
?>
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Registration Form</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Register</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form id="registrationForm" method="POST">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control"  name="name" placeholder="Your Name" >
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Your Email"  class="form-control" name="email" >
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="password" placeholder="Type your password"  class="form-control" name="password" >
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="password" placeholder="Confirm password"  class="form-control" name="confirmpassword" >
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="submit-button text-center">
									<button class="btn btn-common" name="register" id="submit" type="submit">Create Account</button>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact -->
	<?php include'includes/contact.php'; ?>
	<?php include'includes/footer.php'; ?>
	<script type="text/javascript">
	$(document).ready(function () {

		$('#registrationForm').validate({
			rules: {
				name: {
					required: true,
				},
				email: {
					required: true,
					email: true,
				},
				password: {
					required: true,
					minlength: 5,
				},
				confirmpassword: {
          equalTo : '[name="password"]',
				},
			},
			messages: {
				name: {
					required: "Please enter your name",
				},
				email: {
					required: "Please enter your email",
					email:"Email address is not valid",
				},
				password: {
					required: "Please enter password",
					minlength:"Password needs to be at least 6 digit",
				},
				confirmpassword: {
					equalTo: "Password doesn't match",
				},
			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
	});
	</script>
