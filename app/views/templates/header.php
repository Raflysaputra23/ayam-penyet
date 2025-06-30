<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$data['judul']?></title>
	<link rel="icon" href="<?=Constant::DIRNAME?>img/logo.png">

	<!-- BOOTSTRAP CSS -->
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	 <!-- FONTAWESOME -->
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

	 <!-- BOX ICONS -->
	 <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	 <!-- FONTS GOOGLE -->
	 <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&family=Poppins:wght@300&family=Tillana&display=swap" rel="stylesheet">

	<!-- GATEAWAY MIDTRANS -->
	<script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-VrbmyPm5-CG2dSEb"></script>

	<!-- SWEETALERT -->
	<script src="
	https://cdn.jsdelivr.net/npm/sweetalert2@11.12.1/dist/sweetalert2.all.min.js
	"></script>
	<link href="
	https://cdn.jsdelivr.net/npm/sweetalert2@11.12.1/dist/sweetalert2.min.css
	" rel="stylesheet">

	 <!-- MYSTYLE CSS -->
	 <style>
	 	<?= require_once 'css/style.css';?>
	 </style>

</head>
<body>
	<!-- ALERT -->
	<?=Flasher::getFlash()?>

	<!-- NAVBAR -->
	<nav class="navbar navbar-expand-lg bg-body-tertiary widthWeb mx-auto" style="height: 10vh; max-height: 10vh;">
	  <div class="container tillana px-4 position-relative">
	  	<div class="d-flex align-items-center gap-1">
		  	 <a class="navbar-brand d-flex align-items-center gap-2 text-shadow text-success fs-4" href="#">
		     	 <img src="<?=Constant::DIRNAME?>img/logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
		      Ayam <small class="text-warning fs-4">penyet</small>
		     </a>
			<!-- <div class="jadwal-operasi bg-danger p-1 px-2 rounded-2 text-white text-center mt-5"></div> -->
		     <!-- <div class="jam-digital bg-primary p-1 px-2 rounded-2 text-white"></div> -->
	     </div>

	     <div class="d-flex align-items-center">

	     	<?php if ($data['judul'] == 'Product'): ?>
	     		
	     	<div class="position-relative">
	     		<a id="btn-shopping-cart" href="" class="text-black text-decoration-none d-flex align-items-center me-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
		      		<i class="bx bx-cart fs-4 text-danger"></i>
		      	</a>
		      	<p class="position-absolute rounded-circle d-flex justify-content-center align-items-center bg-danger text-white d-block" style="width: 1.2rem; height: 1.2rem; font-size: 12px; top: -6px; right: 2px;"><?=(isset($data["cart"])) ? count($data['cart']) : ''?></p>
	     	</div>

	     	<?php endif ?>

	     	<div class="position-relative">
		     	<a id="btn-profile" href="" class="text-black text-decoration-none d-flex align-items-center">
			        <i class="bx bx-user fs-4"></i>
			        <i class="bx bx-chevron-down fs-4"></i>
		        </a>	
		        <!-- SIDEBAR PROFILE -->
			  	<div class="position-absolute end-0 rounded-2 bg-body-tertiary arrow-top p-2 d-none hideSidebar z-3"  style="width: 10rem; top: 70px;">

			  		<?php if ($data['judul'] != 'Login' && $data['judul'] != 'Register'): ?>
						<div class="row gx-0 font-menu poppins">
							<div class="row gx-0 mb-2 align-items-center">
								<div class="col-3">
									<img src="img/logo.png" alt="" width="100%">
								</div>
								<div class="col-9 px-2">
									<p class="fw-semibold font-menu m-0 text-break">
										<?=$_SESSION['username']?>
									</p>
								</div>
							</div>
							<hr class="m-0 my-2">
							<a href="<?=Constant::DIRNAME?>akun" class="text-black rounded-1 p-2 d-flex align-items-center gap-2 hover-menu"><i class="bx bx-user fs-5"></i> Akun</a>
							<a href="<?=Constant::DIRNAME?>settings" class="text-black rounded-1 p-2 d-flex align-items-center gap-2 hover-menu"><i class="bx bx-cog fs-5"></i> Settings</a>
							<hr class="m-0 my-2">
							<a href="<?=Constant::DIRNAME?>home/logout" class="text-black rounded-1 p-2 d-flex align-items-center gap-2 hover-logout"><i class="bx bx-log-out fs-5"></i> Logout</a>
						</div>
					<?php else: ?>
						<div class="row gx-0 font-menu poppins">
							<a href="<?=Constant::DIRNAME?>login" class="text-black rounded-1 p-2 d-flex align-items-center gap-2 hover-menu"><i class="bx bx-log-in fs-5"></i> Login</a>
							<a href="<?=Constant::DIRNAME?>register" class="text-black rounded-1 p-2 d-flex align-items-center gap-2 hover-logout"><i class="bx bx-registered fs-5"></i> Register</a>
						</div>
					<?php endif; ?>

			  	</div>
			  	<!-- END SIDEBAR PROFILE -->
	     	</div>
	      	
	     </div>
	  </div>
	</nav>
	<!-- END NAVBAR -->

	
	<?php if ($data['judul'] != 'Login' && $data['judul'] != 'Register' && $data['judul'] != 'Admin'): ?>
	<!-- MAIN -->
	<main class="container poppins overflow-hidden position-relative" style="height: 90vh; max-height: 90vh;">

		<div class="row">

			<!-- ASIDE -->
			<aside class="col-2 p-3 bg-body-tertiary position-relative transition-ease-03s" style="height: 90vh; max-height: 90vh;">
				
				<!-- TOOGLE ASIDE -->
				<button id="toggle-menu" type="button" class="btn btn-success btn-sm position-absolute z-3 d-flex" style="right: -15px; top: 70%;">
					<i class="bx bx-chevrons-right fs-5"></i>
				</button>

				<!-- ASIDE MENU -->
				<div id="menu-aside" class="row mt-1 font-menu">
					<a id="dashboard" href="<?=Constant::DIRNAME?>" class="p-2 px-3 text-black d-flex align-items-center gap-2 hover-menu transition-ease-03s <?=($data['judul'] == 'Home') ? 'active-menu' : '' ?>"><i class="bx bxs-dashboard fs-5"></i> <p class="m-0">Dashboard</p></a>
					<a id="product" href="<?=Constant::DIRNAME?>product" class="p-2 px-3 text-black d-flex align-items-center gap-2 hover-menu transition-ease-03s <?=($data['judul'] == 'Product') ? 'active-menu' : '' ?>"><i class="bx bxl-product-hunt fs-5"></i> <p class="m-0">Product</p></a>
					<a id="inbox" href="<?=Constant::DIRNAME?>inbox" class="p-2 px-3 text-black d-flex align-items-center gap-2 hover-menu transition-ease-03s <?=($data['judul'] == 'Inbox') ? 'active-menu' : '' ?>"><i class="bx bx-message-dots fs-5"></i> <p class="m-0">Inbox</p></a>
					<a id="history" href="<?=Constant::DIRNAME?>history" class="p-2 px-3 text-black d-flex align-items-center gap-2 hover-menu transition-ease-03s <?=($data['judul'] == 'History') ? 'active-menu' : '' ?>"><i class="bx bx-history fs-5"></i> <p class="m-0">History</p></a>
					<a id="tambah-produk" href="" class="p-2 px-3 text-black d-flex align-items-center gap-2 hover-menu transition-ease-03s <?=($data['judul'] != 'Product' || $_SESSION['role'] != 'admin') ? 'd-none' : 'active'?>" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-plus fs-5"></i> <p class="m-0">Tambah</p></a>
					<a id="role" href="#" title="admin" data-user="<?=$_SESSION['role']?>" class="text-white bg-success text-center py-2 rounded-2 text-capitalize my-2 <?=($_SESSION['role'] != 'admin') ? 'd-none' : '';?>"><i class="bx bx-user fs-5"></i><p class="position-absolute"></p></a>
				</div>
				<!-- END ASIDE MENU -->

				<!-- ASIDE FOOTER -->
				<p class="mb-2 position-absolute text-center bottom-0 mb-4 oswald start-0 end-0">
					<small class="text-secondary">&copy Copyright by Rafly</small>
				</p>
				<!-- ASIDE FOOTER -->
			</aside>
			<!-- END ASIDE -->
	<?php endif; ?>
		
	
