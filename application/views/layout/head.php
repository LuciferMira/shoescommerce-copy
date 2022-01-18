<!DOCTYPE html>
<html lang="en">
<head>
	<title>Distro | <?= $title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
					</div>

				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="<?= base_url(); ?>" class="logo">
						<img src="<?= base_url(); ?>assets/images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="<?= base_url(); ?>">Home</a>
							</li>

							<li>
								<a href="<?= base_url('produk'); ?>">Shop</a>
							</li>

							<li>
								<a href="<?= base_url('blog'); ?>">Blog</a>
							</li>

							<li>
								<a href="<?= base_url('about'); ?>">About</a>
							</li>

							<li>
								<a href="<?= base_url('contact'); ?>">Contact</a>
							</li>

							<?php if($this->session->userdata('nama')!= NULL):?>
									<li>
										<a href="#">Account</a>
										<ul class="sub-menu">
											<li><a href="<?= base_url('login/history') ?>">History Transaction</a></li>
											<li><a href="<?= base_url('login/profile') ?>">My Profile</a></li>
											<li><a href="<?= base_url('login/logout') ?>">Logout</a></li>
										</ul>
									</li>
							<?php else: ?>
								<li>
									<a href="<?= base_url('login') ?>">Login</a>
								</li>
							<?php endif; ?>
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11">
							<?php if($this->session->userdata('nama')!= NULL):?>
							<a href="<?= base_url('login/logout') ?>"><i class="zmdi zmdi-walk"></i></a>
						<?php else: ?>
							<a href="<?= base_url('login'); ?>"><i class="zmdi zmdi-sign-in"></i></a>
							<?php endif; ?>
						</div> -->

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart">
                            <a href="<?= base_url('cart'); ?>"><i class="zmdi zmdi-shopping-cart"></i></a>
						</div>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">


				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 js-show-cart">
					<a href="<?= base_url('belanja'); ?>"><i class="zmdi zmdi-shopping-cart"></i></a>
				</div>

			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="<?= base_url(); ?>">Home</a>
				</li>

				<li>
					<a href="<?= base_url('produk'); ?>">Shop</a>
				</li>

				<li>
					<a href="<?= base_url('blog'); ?>">Blog</a>
				</li>

				<li>
					<a href="<?= base_url('about'); ?>">About</a>
				</li>

				<li>
					<a href="<?= base_url('contact'); ?>">Contact</a>
				</li>

				<?php if($this->session->userdata('nama')!= NULL):?>
				<li>
					<a href="#">Account</a>
					<ul class="sub-menu-m">
						<li><a href="<?= base_url('login/history') ?>">History Transaction</a></li>
						<li><a href="<?= base_url('login/profile') ?>">My Profile</a></li>
						<li><a href="<?= base_url('login/logout') ?>">Logout</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>
				<?php else: ?>
					<li>
						<a href="<?= base_url('login') ?>">Login</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="<?= base_url(); ?>assets/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>
