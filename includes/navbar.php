<?php
	$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
</head>
<body>

	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item <?= ($activePage == 'index') ? 'active':''; ?> "><a class="nav-link" href="index">Home</a></li>
						<li class="nav-item <?= ($activePage == 'menu') ? 'active':''; ?>"><a class="nav-link" href="menu">Menu</a></li>
						<li class="nav-item <?= ($activePage == 'about') ? 'active':''; ?>"><a class="nav-link" href="about">About</a></li>
						<li class="nav-item <?= ($activePage == 'reservation') ? 'active':''; ?>"><a class="nav-link" href="reservation">Reservation</a></li>
						<li class="nav-item <?= ($activePage == 'contact') ? 'active':''; ?>"><a class="nav-link" href="contact">Contact</a></li>
						<?php
						if(isset($_SESSION['isLoggedIn'])){
						 ?>
							<li><a class="nav-link" href="login"><i class="fa fa-user" ></i> <?=$_SESSION['name']?></a></li>
							<li class="nav-item "><a class="nav-link" href="logout">LogOut</a></li>

					 <?php }else{ ?>
						<li class="nav-item <?= ($activePage == 'login') ? 'active':''; ?>"><a class="nav-link" href="login">Sign In</a></li>
						<li class="nav-item <?= ($activePage == 'register') ? 'active':''; ?>"><a class="nav-link" href="register">Register</a></li>
					<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
