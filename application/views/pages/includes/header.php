<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Kathiking</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);
		
		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="<?php echo base_url('cdn/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo base_url('cdn/css/fontawesome-all.min.css'); ?>" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url('cdn/css/shop.css'); ?>" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('cdn/css/jquery-ui1.css'); ?>">
	<link href="<?php echo base_url('cdn/css/style.css'); ?>" rel='stylesheet' type='text/css' media="all">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('cdn/css/checkout.css'); ?>">
	<link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
</head>
<body>
	<!--headder-->
	<div class="header-outs" id="home">
		<div class="header-bar">
			<div class="info-top-grid">
				<div class="info-contact-agile">
					<ul>
						<li>
							<span class="fas fa-phone-volume"></span>
							<p>+(000)123 4565 32</p>
						</li>
						<li>
							<span class="fas fa-envelope"></span>
							<p><a href="mailto:info@example.com">info@kathiking.com</a></p>
						</li>
						<li>
						</li>
					</ul>
				</div>
			</div>
			<div class="container-fluid">
				<div class="hedder-up row">
					<div class="col-lg-3 col-md-3 logo-head">
						<h1><a class="navbar-brand" href="<?php echo base_url(); ?>">Kathiking</a></h1>
					</div>
					<div class="col-lg-4 col-md-3 right-side-cart">
                      <div class="cart-icons">
                         <ul>
                            <li>
                               <span class="far fa-heart"></span>
                            </li>
                            <?php if (!$this->session->logged_in): ?>
                            <li>
                               <button type="button" data-toggle="modal" data-target="#exampleModal"> <span class="far fa-user"></span></button>
                            </li>
                            <?php endif; ?>
                            <li class="toyscart toyscart2 cart cart box_1">
                                <a href="<?= base_url("cart"); ?>" class="top_toys_cart">
                                  <span class="fas fa-cart-arrow-down"></span>
                                  </a>
                            </li>
                         </ul>
                      </div>
                   </div>
					<!--div class="col-lg-5 col-md-6 search-right">
						<form class="form-inline my-lg-0">
							<input class="form-control mr-sm-2" type="search" placeholder="Search">
							<button class="btn" type="submit">Search</button>
						</form>
					</div -->
				</div>
			</div>
			<nav class="navbar navbar-expand-lg navbar-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ">
						<li class="nav-item ">
							<a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Information
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="nav-link" href="<?= base_url("about"); ?>">About</a>
								<a class="nav-link " href="<?= base_url("contact"); ?>">Contact</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Menu
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php foreach ($category as $row): ?>
								<a class="nav-link menu" data="<?= $row->id; ?>" href="#"><?= $row->name; ?></a>
								<?php endforeach; ?>
							</div>
						</li>
						<?php if (!$this->session->logged_in): ?>
						<li class="nav-item">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="nav-link">Log-in</a>
						</li>
						<?php else: ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							My Account
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							    <a class="nav-link" href="<?= base_url("orders"); ?>">My Orders</a>
								<a class="nav-link" href="<?= base_url("profile"); ?>">My Profile</a>
								<a class="nav-link" href="<?= base_url("editprofile"); ?>">Password</a>
								<a class="nav-link " href="<?= base_url("logout"); ?>">Log-out</a>
							</div>
						</li>
						<?php endif; ?>
						<?php if ($this->session->role == 'A'): ?>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Manage
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							    <a class="nav-link" href="<?= base_url("all-orders"); ?>">Orders</a>
							</div>
						</li>
                        <?php endif; ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class="inner_page-banner one-img"></div>