<?php include'includes/headers.php'; ?>
<?php include'includes/navbar.php'; ?>


	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Regular Menu</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Regular Menu</h2>
						<p>This is our regular menu</p>
					</div>
				</div>
			</div>

			<div class="row inner-menu-box">
				<div class="col-4">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">All</a>
						<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">BreakFast</a>
						<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Lunch</</a>
						<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Dinner</a>
					</div>
				</div>

				<div class="col-8">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
								<?php
								include_once("dbCon.php");
								$conn =connect();
								$sql="SELECT * FROM `regular_menu_details` Order By item_name ASC";
								$result = $conn->query($sql);
								foreach ($result as $value) {
								?>
								<div class="col-lg-6 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="images/<?=$value['item_image']?>" height="220px" width="400px"  alt="Image">
										<div class="why-text">
											<h4><?=$value['item_name']?></h4>
											<div class="row">
												<div class="col-6">
													<h4>৳<?=$value['item_price']?></h4>
												</div>
												<div class="col-6">
													<h4 class="pull-right" ><?=$value['item_type']?></h4>
												</div>

											</div>

											<div class="star-rating mt-1 mb-1">
												<?php
												$it_id = $value['id'];
												$sql = "SELECT SUM(RATING)/COUNT(rating) as avgRating, COUNT(rating) as totalRating FROM ratings_reviews WHERE item_id = '$it_id'";
												$result = $conn->query($sql);
												$ratings = mysqli_fetch_assoc($result);
												$rating = $ratings['avgRating'];
												for ($x = 1; $x <= 5; $x++) {
												?>
												<span class="fa fa-star" data-rating="1" style="font-size:20px;<?php if($x <= $rating) { ?>color:yellow;<?php } ?>"></span>
												<?php
													}
												?>
												 <small style="color:white;" >[ <?=$ratings['totalRating'];?> ratings ]</small>
											</div>

										</div>
									</div>
									<div class=" text-center mb-4">
										<a class="btn btn-lg btn-circle btn-outline-new-white col-lg-6" href="menu-details?item-id=<?=$value['id']?>">View Reviews</a>
									</div>
								</div>
							<?php } ?>
							</div>
						</div>

						<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
							<div class="row">
								<?php

								$sql="SELECT * FROM `regular_menu_details` WHERE item_type='BreakFast' Order By item_name ASC";
								$result = $conn->query($sql);
								foreach ($result as $value) {
								?>
								<div class="col-lg-6 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="images/<?=$value['item_image']?>" height="220px" width="400px"  alt="Image">
										<div class="why-text">
											<h4><?=$value['item_name']?></h4>
											<div class="row">
												<div class="col-6">
													<h4>৳<?=$value['item_price']?></h4>
												</div>
												<div class="col-6">
													<h4 class="pull-right" ><?=$value['item_type']?></h4>
												</div>

											</div>

											<div class="star-rating mt-1 mb-1">
												<?php
												$rating = 2;
												for ($x = 1; $x <= 5; $x++) {
												?>
												<span class="fa fa-star" data-rating="1" style="font-size:20px;<?php if($x <= $rating) { ?>color:yellow;<?php } ?>"></span>
												<?php
													}
												?>
												 <small style="color:white;" >[ 2 ratings ]</small>
											</div>

										</div>
									</div>
									<div class=" text-center mb-4">
										<a class="btn btn-lg btn-circle btn-outline-new-white col-lg-6" href="menu-details?item-id=<?=$value['id']?>">View Reviews</a>
									</div>
								</div>
							<?php } ?>
							</div>

						</div>
						<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
							<div class="row">
								<?php

								$sql="SELECT * FROM `regular_menu_details` WHERE item_type='Lunch' Order By item_name ASC";
								$result = $conn->query($sql);
								foreach ($result as $value) {
								?>
								<div class="col-lg-6 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="images/<?=$value['item_image']?>" height="220px" width="400px"  alt="Image">
										<div class="why-text">
											<h4><?=$value['item_name']?></h4>
											<div class="row">
												<div class="col-6">
													<h4>৳<?=$value['item_price']?></h4>
												</div>
												<div class="col-6">
													<h4 class="pull-right" ><?=$value['item_type']?></h4>
												</div>

											</div>

											<div class="star-rating mt-1 mb-1">
												<?php
												$rating = 2;
												for ($x = 1; $x <= 5; $x++) {
												?>
												<span class="fa fa-star" data-rating="1" style="font-size:20px;<?php if($x <= $rating) { ?>color:yellow;<?php } ?>"></span>
												<?php
													}
												?>
												 <small style="color:white;" >[ 2 ratings ]</small>
											</div>

										</div>
									</div>
									<div class=" text-center mb-4">
										<a class="btn btn-lg btn-circle btn-outline-new-white col-lg-6" href="menu-details?item-id=<?=$value['id']?>">View Reviews</a>
									</div>
								</div>
							<?php } ?>


							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
							<div class="row">

								<?php

								$sql="SELECT * FROM `regular_menu_details` WHERE item_type='Dinner' Order By item_name ASC";
								$result = $conn->query($sql);
								foreach ($result as $value) {
								?>
								<div class="col-lg-6 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="images/<?=$value['item_image']?>" height="220px" width="400px"  alt="Image">
										<div class="why-text">
											<h4><?=$value['item_name']?></h4>
											<div class="row">
												<div class="col-6">
													<h4>৳<?=$value['item_price']?></h4>
												</div>
												<div class="col-6">
													<h4 class="pull-right" ><?=$value['item_type']?></h4>
												</div>

											</div>

											<div class="star-rating mt-1 mb-1">
												<?php
												$rating = 2;
												for ($x = 1; $x <= 5; $x++) {
												?>
												<span class="fa fa-star" data-rating="1" style="font-size:20px;<?php if($x <= $rating) { ?>color:yellow;<?php } ?>"></span>
												<?php
													}
												?>
												 <small style="color:white;" >[ 2 ratings ]</small>
											</div>

										</div>
									</div>
									<div class=" text-center mb-4">
										<a class="btn btn-lg btn-circle btn-outline-new-white col-lg-6" href="menu-details?item-id=<?=$value['id']?>">View Reviews</a>
									</div>
								</div>
							<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Menu -->

	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						" If you're not the one cooking, stay out of the way and compliment the chef. "
					</p>
					<span class="lead">Michael Strahan</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->

	<?php include'includes/contact.php'; ?>
	<?php include'includes/footer.php'; ?>
