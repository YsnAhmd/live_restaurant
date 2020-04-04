<?php include'includes/headers.php'; ?>
<?php include'includes/navbar.php'; ?>
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Contact</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<?php
	if(isset($_SESSION['msg'])){
	 ?>
 </br>
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
						<h2>Contact</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form id="contactForm" action="contactController" method="POST">
						<div class="row">
							<?php if(!isset($_SESSION['isLoggedIn'])){ ?>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Your Email" id="email" class="form-control" name="email">
								</div>
							</div>
						<?php }else{ ?>
							<input type="hidden" name="name" value="<?php if(isset($_SESSION['isLoggedIn'])){echo $_SESSION['name'];}?>">
							<input type="hidden" name="email" value="<?php if(isset($_SESSION['isLoggedIn'])){echo $_SESSION['email'];}?>">

						<?php } ?>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" id="message" placeholder="Your Message" rows="4" name="message"></textarea>
								</div>
								<div class="submit-button text-center">
									<button class="btn btn-common" name="send" id="submit" type="submit">Send Message</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
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

		$('#contactForm').validate({
			rules: {
				<?php if(!isset($_SESSION['isLoggedIn'])){ ?>
				name: {
					required: true,
				},
				email: {
					required: true,
					email: true,
				},
				<?php } ?>
				message: {
					required: true,
				},
			},
			messages: {
				<?php if(!isset($_SESSION['isLoggedIn'])){ ?>
				name: {
					required: "Please enter your name",
				},
				email: {
					required: "Please enter your email",
					email:"Email address is not valid",
				},
				<?php } ?>
				message: {
					required: "Please provide your message",
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
