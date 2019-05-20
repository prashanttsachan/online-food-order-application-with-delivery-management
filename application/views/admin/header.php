<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dashboard | Kathiking</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<meta name="keywords" content="" />
		<script>
			addEventListener("load", function () {
			    setTimeout(hideURLbar, 0);
			}, false);
			
			function hideURLbar() {
			    window.scrollTo(0, 1);
			}
		</script>
		<link href="<?= base_url("admin/"); ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?= base_url("admin/"); ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="<?= base_url("admin/"); ?>css/style4.css">
		<link href="<?= base_url("admin/"); ?>css/fontawesome-all.css" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper">
			<nav id="sidebar">
				<div class="sidebar-header">
					<h1>
						<a href="<?= base_url("adm190"); ?>">Kathiking</a>
					</h1>
					<span>M</span>
				</div>
				<div class="profile-bg"></div>
				<ul class="list-unstyled components">
					<li>
						<a href="<?= base_url("adm190"); ?>">
						<i class="fas fa-th-large"></i>
						Dashboard
						</a>
					</li>
					<li>
						<a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false">
						<i class="fa fa-users"></i>Users<i class="fas fa-angle-down fa-pull-right"></i>
						</a>
						<ul class="collapse list-unstyled" id="pageSubmenu1">
							<li><a href="<?= base_url("adm190/users"); ?>">All Users</a></li>
						</ul>
					</li>
					<li>
						<a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false">
						<i class="fa fa-list"></i>Orders<i class="fas fa-angle-down fa-pull-right"></i>
						</a>
						<ul class="collapse list-unstyled" id="pageSubmenu2">
							<li><a href="<?= base_url("adm190/orders"); ?>">Orders</a></li>
							<li><a href="<?= base_url("adm190/orders?status=delivered"); ?>">Delivered Orders</a></li>
							<li><a href="<?= base_url("adm190/orders?status=cancelled"); ?>">Cancelled Orders</a></li>
						</ul>
					</li>
					<li>
						<a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false">
						<i class="fa fa-folder"></i>Products<i class="fas fa-angle-down fa-pull-right"></i>
						</a>
						<ul class="collapse list-unstyled" id="pageSubmenu3">
							<li><a href="<?= base_url("adm190/manage"); ?>">Product</a></li>
							<li><a href="<?= base_url("adm190/new-product"); ?>">New Product</a></li>
						</ul>
					</li>
					<li>
						<a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false">
						<i class="fa fa-list"></i>
						Category
						<i class="fas fa-angle-down fa-pull-right"></i>
						</a>
						<ul class="collapse list-unstyled" id="pageSubmenu4">
							<li><a href="<?= base_url("adm190/category"); ?>">Category</a></li>
							<li><a href="<?= base_url("adm190/new-category"); ?>">New Category</a></li>
						</ul>
					</li>
				</ul>
			</nav>