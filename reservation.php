<?php include'includes/headers.php'; ?>
<?php include'includes/navbar.php'; ?>

	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Reservation</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start Reservation -->
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Reservation</h2>
						<p>Reservation is only for premium tables</p>
					</div>
				</div>
			</div>
			<?php
			if(!isset($_SESSION['isLoggedIn'])){
			 ?>
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4">
						<div class="contact-imfo-box text-center">
							<h3 style="font-weight:bold;color:white;">Please Login for reservation</h3>
						</div>
					</div>
					<div class="col-lg-4"></div>
				</div>
			</div>
		<?php }else{ ?>

			<?php
			if(isset($_SESSION['data'])){
			 ?>
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<div class="contact-imfo-box text-center">
							<h3 style="font-weight:bold;color:white;">This date and time has already been taken!</h3>
						</div>
					</div>
					<div class="col-lg-3"></div>
				</div>
			</div>
			<?php }; ?>

			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form id="resForm" method="POST" action="reservation_controller">
							<input type="hidden" name="amount" id="hid_amount" value="<?php if(isset($_SESSION['data'])){ echo $_SESSION['data']['amount'];} ?>">
							<div class="row">
								<div class="col-md-12">
									<h3>Book a table </h3>
									<div class="col-md-12">
										<div class="form-group">
											<input id="datepicker" class="form-control" name="date" type="text" placeholder="Select reservation date" value="<?php if(isset($_SESSION['data'])){ echo $_SESSION['data']['date'];} ?>" >
										</div>
									</div>
									<?php if(isset($_SESSION['data'])){?>
										<h3 style="color:red;">Try selecting another time</h3>
									<?php } else{ ?>
										<h3>Select Time</h3>
									<?php } ?>
									<div class="col-md-12">
										<div class="form-group">
											<select class=" form-control" name="time" id="time" >
											  <option disabled selected>Select Time</option>
												<?php
													for ($i=8; $i < 21; $i++) {
												 ?>
											  <option value="<?php if($i>=12){
													 			$j = ($i-12);
																	if($j == 0){
																		echo '12 PM';
																	}else{
																		echo $j.' PM'; }
																}else{
																		echo $i.' AM';
															}
													?>">
												<?php if($i>=12){
													 			$j = ($i-12);
																	if($j == 0){
																		echo '12 PM';
																	}else{
																		echo $j.' PM'; }
																}else{
																		echo $i.' AM';
															}
													?></option>
											<?php } ?>
											</select>
										</div>
									</div>

									<div class="col-md-12">
										<small style="color:red;">*Per person ৳500 </small>
										<div class="form-group">
											<select class=" form-control" id="person" onchange="payAmount();" name="person"  >
											  <option disabled selected>Select Person</option>
											  <option <?php if((isset($_SESSION['data'])) && ($_SESSION['data']['person'] == 1)) echo"selected"; ?> value="1">1</option>
											  <option <?php if((isset($_SESSION['data'])) && ($_SESSION['data']['person'] == 2)) echo"selected"; ?>  value="2">2</option>
											  <option <?php if((isset($_SESSION['data'])) && ($_SESSION['data']['person'] == 3)) echo"selected"; ?>   value="3">3</option>
											  <option <?php if((isset($_SESSION['data'])) && ($_SESSION['data']['person'] == 4)) echo"selected"; ?>  value="4">4</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<h3>You have to Pay</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" disabled id="amount" class="form-control" value="<?php if(isset($_SESSION['data'])){ echo $_SESSION['data']['amount'];} ?>">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<h3>Contact Details</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Your Number" id="phone" autocomplete="on" class="form-control" name="phone" value="<?php if(isset($_SESSION['data'])){ echo $_SESSION['data']['phone'];} ?>" >
											<div class="help-block with-errors"></div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" name="reserve" id="submit" type="submit">Book Table</button>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php }?>
		</div>
	</div>
	<!-- End Reservation -->

	<?php include'includes/contact.php'; ?>
	<?php include'includes/footer.php'; ?>
	<script type="text/javascript">
	$(document).ready(function () {

		$('#resForm').validate({
			rules: {
				date: {
					required: true,
				},
				time: {
					required: true,
				},
				person: {
					required: true,
				},
				phone: {
					required: true,
					number:true,
					minlength:6
				},
			},
			messages: {
				date: {
					required: "Please enter your email",
				},
				time: {
					required: "Please enter password",
				},
				person: {
					required: "Please enter password",
				},
				phone: {
					required: "Please enter password",
					number:"Phone number must be digit",
					minlength:"Number at least 11 digit"
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

	function payAmount(){
    let person = $("#person").val();
    let amount = person*500;
    $("#amount").val("৳"+amount);
    $("#hid_amount").val(amount);
  }
	</script>
