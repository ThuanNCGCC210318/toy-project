<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>

	<path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
	<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
	<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
	<path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>


	<title>Y&T TOYS-SHOP</title>
</head>
<body>
	<!--navbar-->

	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<div class="container-fluid">
			<a href="index.php" class="navbar-brand bi bi-house-door-fill">HOME</a> 
				<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nsup">
					<span class="navbar-toggler-icon"></span>
				</button>
			<div class="collapse navbar-collapse" id="navsup">
					<div class="navbar-nav">
						<a href="cart.php" class="nav-link bi bi-cart">Cart</a>
						<div class="dropdown">
							<a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Management</a>
							<div class="dropdown-menu">
									<a href="Productadd.php" class="dropdown-item">Add Product</a>
								</div>	
						</div>
					</div>
					<div class="navbar-nav ms-auto">	
						<?php
						if (session_status() == PHP_SESSION_NONE) {
							session_start();
							}
						if(isset($_SESSION['user_name'])):
						?>
							<a href="#" class="nav-link bi bi-file-person">Welcom, <?=$_SESSION['user_name']?></a>
							<a href="logout.php" class="nav-link bi bi-box-arrow-right">Logout</a>
						<?php
						else:
						?>
							<a href="login.php" class="nav-link bi bi-box-arrow-right">Login</a>
							<a href="register.php" class="nav-link">Register</a>
						<?php
						endif
						?>
					</div>
			</div>
			
		</div>
	</nav>

	<section class="text-center py-lg-5 container" style="background-image:url(https://media.istockphoto.com/photos/kid-toys-background-copy-space-for-text-picture-id1124735481); 
	background-repeat: no-repeat; background-size: 100% 100%; ">
		<div class="row py-lg-5">
			<div class="col-lg-6 col-md-8 mx-auto">
				<h1 class="font-weight-bolder text-blue">Y&T TOYS-SHOP</h1>
				<p class="text-white"></p>
			</div>		
		</div>
	</section>
	<div class="b-example-divider"></div>