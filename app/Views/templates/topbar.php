


	<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="<?php if($_SESSION['profile_pic']){ echo base_url().'/uploads/'.$_SESSION['profile_pic'];}else{ echo base_url().'/public/img/avatars/avatar.jpg';} ?>" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">Hello, <?= $_SESSION['first_name']; ?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="<?= site_url('admin/profile') ?>"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
							
								<a class="dropdown-item" href="<?= base_url(); ?>/logout">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>


			
			<main class="content">
				<div class="container-fluid p-0">