<!-- top-bar -->
<nav class="navbar navbar-default mb-xl-5 mb-4">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
			<i class="fas fa-bars"></i>
			</button>
		</div>
		<ul class="top-icons-agileits-w3layouts float-right">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false">
				<i class="far fa-bell"></i>
				<span class="badge">4</span>
				</a>
				<div class="dropdown-menu top-grid-scroll drop-1">
					<h3 class="sub-title-w3-agileits">User notifications</h3>
					<a href="#" class="dropdown-item mt-3">
						<div class="notif-img-agileinfo">
							<img src="images/clone.jpg" class="img-fluid" alt="Responsive image">
						</div>
						<div class="notif-content-wthree">
							<p class="paragraph-agileits-w3layouts py-2">
								<span class="text-diff">John Doe</span> Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.
							</p>
							<h6>4 mins ago</h6>
						</div>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">view all notifications</a>
				</div>
			</li>
			<li class="nav-item dropdown mx-3">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false">
				<i class="fas fa-spinner"></i>
				</a>
				<div class="dropdown-menu top-grid-scroll drop-2">
					<h3 class="sub-title-w3-agileits">Shortcuts</h3>
					<a href="#" class="dropdown-item mt-3">
						<h4>
							<i class="fas fa-chart-pie mr-3"></i>Sed feugiat
						</h4>
					</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false">
				<i class="far fa-user"></i>
				</a>
				<div class="dropdown-menu drop-3">
					<div class="profile d-flex mr-o">
						<div class="profile-l align-self-center">
							<img src="<?= base_url("admin/"); ?>images/profile.jpg" class="img-fluid mb-3" alt="Responsive image">
						</div>
						<div class="profile-r align-self-center">
							<h3 class="sub-title-w3-agileits"><?= $this->session->firstname." ".$this->session->lastname; ?></h3>
							<a href="mailto:<?= $this->session->email; ?>"><?= $this->session->email; ?></a>
						</div>
					</div>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?= base_url("adm190/logout"); ?>">Logout</a>
				</div>
			</li>
		</ul>
	</div>
</nav>