
<?php include'includes/headers.php'; ?>
<?php include'includes/navbar.php'; ?>
<?php
include_once("dbCon.php");
$conn =connect();
$item_id = $_GET['item-id'];
$sql="SELECT * FROM `regular_menu_details` WHERE id = '$item_id'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
	$user_id = $_SESSION['id'];
	$rating = $_POST['rating'];
	$review = $_POST['review'];
	$today = date('d-m-Y');
	$sql = "INSERT INTO `ratings_reviews`(`user_id`, `rating`, `review`, `item_id`,`created_date`)
	        VALUES ('$user_id','$rating','$review','$item_id','$today')";
	if($conn->query($sql)){
		echo '<script>alert("Review And Rating Submitted!!!");window.location.href = "http://localhost/live_restaurant/menu-details?item-id='.$item_id.'"; </script>';
	}
}
?>
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Menu Details</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start blog details -->
	<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Menu Details</h2>
						<p>Details description with reviews and ratings</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-12">
					<div class="blog-inner-details-page">
						<div class="blog-inner-box">
							<div class="text-center">
								<img class="img-fluid" src="images/<?=$row['item_image']?>" alt="">
							</div>
							<div class="inner-blog-detail details-page">
								<h3><?=$row['item_name']?></h3>
								<ul>
									<li><i class="zmdi zmdi-account"></i>Price : <span><?=$row['item_price']?> tk</span></li>
								</ul>
								<blockquote>
									<p><?=$row['item_description']?></p>
								</blockquote>
								</div>
						</div>


						<div class="blog-comment-box">
							<h3>Reviews</h3>
							<hr>
							<div class="comment-item">
								<?php
								$item_id = $_GET['item-id'];
								$sql="SELECT * FROM `ratings_reviews` as r, user_info as u WHERE r.user_id = u.id AND item_id = '$item_id' Order By created_date DESC";
								//echo $sql;exit;
								$result = $conn->query($sql);
								foreach ($result as $value) {
								 ?>
								<div class="">
									<div class="pull-left">
										<h4><?=$value['name']?></h4>
									</div>
									<div class="pull-right">
										<i class="fa fa-clock-o" aria-hidden="true"></i>Date : <span><?=$value['created_date']?></span>
									</div>
									<div class="des-l">
										<p><?=$value['review']?></p>
									</div>
									<div class="star-rating mt-1 mb-1">
										<?php
										$rating = $value['rating'];
										for ($x = 1; $x <= 5; $x++) {
										?>
										<span class="fa fa-star" data-rating="1" style="font-size:20px;<?php if($x <= $rating) { ?>color:green;<?php } ?>"></span>
										<?php
											}
										?>
										 <small style="color:Black;" >[ given by the user ]</small>
									</div>
								</div>
								<hr>
							<?php } ?>

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
										<h3 style="font-weight:bold;color:white;">Please Login to give review</h3>
									</div>
								</div>
								<div class="col-lg-4"></div>
							</div>
						</div>
					<?php }else{ ?>


						<div class="comment-respond-box">
							<h3>Leave your review: </h3>
							<div class="comment-respond-form">
								<form id="commentrespondform" class="comment-form-respond row" method="post">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<label for="">Give your Rating :</label>
										<div class="form-group">
											<select class="form-control" name="rating">
												<option selected="true" disabled="disabled">Select a rating</option>
												<option value="5">Fantastic 😀</option>
												<option value="4">Great 😊</option>
												<option value="3">Good 🙂</option>
												<option value="2">Poor 😟</option>
												<option value="1">Terrible 😞</option>
											</select>
										</div>
										<label for="" >Give your Review :</label>
										<div class="form-group">
											<textarea class="form-control" name="review" rows="4" cols="80" placeholder="type something about our food"></textarea>
										</div>
									</div>

								</label>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<button type="submit" name="submit" class="btn btn-submit">Submit Reviews</button>
									</div>
								</form>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End details -->

	<?php include'includes/contact.php'; ?>
	<?php include'includes/footer.php'; ?>
