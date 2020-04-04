<?php include'includes/headers.php'; ?>
<?php include'includes/navbar.php'; ?>

	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Sign in form</h1>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<!-- End All Pages -->
	<?php
	if(isset($_SESSION['msg'])){
	 ?>
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div class="contact-imfo-box text-center">
					<h3 style="font-weight:bold;color:white;"><?=$_SESSION['msg']?></h3>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
	</div>
	<?php }; unset($_SESSION['msg']); ?>

	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Sign In</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form id="loginForm" method="POST" action="loginsave">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" placeholder="Your Email" id="email" class="form-control" name="email" autocomplete="on">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="password" name="password"  class="form-control" autocomplete="on" placeholder="Your Password">
								</div>
								<div class="submit-button text-center">
									<button class="btn btn-common" name="submit" id="submit" type="submit">Sign In</button>
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

		$('#loginForm').validate({
			rules: {
				email: {
					required: true,
					email: true,
				},
				password: {
					required: true,
					minlength: 5,
				},
			},
			messages: {
				email: {
					required: "Please enter your email",
					email:"Email address is not valid",
				},
				password: {
					required: "Please enter password",
					minlength:"Password needs to be at least 6 digit",
				}
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
