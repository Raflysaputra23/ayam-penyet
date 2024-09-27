			<section class="col-10 p-4 poppins overflow-y-auto overflow-x-hidden" style="height: 90vh; max-height: 90vh;">
				<div class="row">
					<div class="col">
						<h4 class="fw-semibold text-success d-flex align-items-center gap-2"><i class="bx bxs-dashboard"></i> Dashboard</h4>
					</div>
				</div>
				<div class="row mt-4">

					<div class="col-12 col-md-6 mb-3">
						<div class="card border-0 shadow">

							<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="width: 100%;">
							  <div class="carousel-indicators">
							    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2"></button>
							    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3"></button>
							  </div>
							  <div class="carousel-inner rounded-2 border overflow-hidden shadow-md" style="height: 250px;">
							    <div class="carousel-item active">
							      <img src="img/ayampenyet1.jpg" class="d-block w-100 " alt="...">
							    </div>
							    <div class="carousel-item">
							      <img src="img/ayampenyet2.jpg" class="d-block w-100" alt="...">
							    </div>
							    <div class="carousel-item">
							      <img src="img/ayampenyet3.jpeg" class="d-block w-100" alt="...">
							    </div>
							  </div>
							  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
							    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="visually-hidden">Previous</span>
							  </button>
							  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="visually-hidden">Next</span>
							  </button>
							</div>
							
						</div>
					</div>

					<div class="col-12 col-md-6 mb-3">
						<div class="card border-0 shadow">

							<div id="carouselExampleInterval2" class="carousel slide" data-bs-ride="carousel" style="width: 100%;">
							  <div class="carousel-indicators">
							    <button type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							    <button type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide-to="1" aria-label="Slide 2"></button>
							    <button type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide-to="2" aria-label="Slide 3"></button>
							  </div>
							  <div class="carousel-inner rounded-2 border overflow-hidden shadow-md" style="height: 250px;">
							    <div class="carousel-item active">
							      <img src="img/minuman1.jpg" class="d-block w-100 " alt="...">
							    </div>
							    <div class="carousel-item">
							      <img src="img/minuman2.jpg" class="d-block w-100" alt="...">
							    </div>
							    <div class="carousel-item">
							      <img src="img/esjeruk.jpg" class="d-block w-100" alt="..." style="object-position: 0px -50px;">
							    </div>
							  </div>
							  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide="prev">
							    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="visually-hidden">Previous</span>
							  </button>
							  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="visually-hidden">Next</span>
							  </button>
							</div>
							
						</div>
					</div>

					<div class="col-12">
						<div class="row">
							<div class="col-12 col-md-6 mb-3">
								
								<div class="card p-3 border-0 shadow">

									<div class="row">
										<div class="col-7">
											<h5 class="fw-semibold m-0">Product</h5>
											<p class="mb-2"><small class="text-secondary">Makanan</small></p>
											<a href="<?=Constant::DIRNAME?>product" class="btn btn-outline-success btn-sm px-3">Lihat</a>
										</div>
										<div class="col-5 position-relative">
											<h5 class="position-absolute start-50 top-50 translate-middle bg-success text-white px-3 py-2 rounded-2"><?=count($data['produk'])?></h5>
										</div>
									</div>
									
								</div>

							</div>
							<div class="col-12 col-md-6 mb-3">
								
								<div class="card p-3 border-0 shadow">

									<div class="row">
										<div class="col-7">
											<h5 class="fw-semibold m-0">History</h5>
											<p class="mb-2"><small class="text-secondary">Riwayat</small></p>
											<a href="<?=Constant::DIRNAME?>history" class="btn btn-outline-primary btn-sm px-3">Lihat</a>
										</div>
										<div class="col-5 position-relative">
											<h5 class="position-absolute start-50 top-50 translate-middle bg-primary text-white py-2 px-3 rounded-2"><?=count($data['history'])?></h5>
										</div>
									</div>

								</div>

							</div>
							<div class="col-12 col-md-6 mb-3">

								<div class="card p-3 border-0 shadow">

									<div class="row">
										<div class="col-7">
											<h5 class="fw-semibold m-0">Shopping</h5>
											<p class="mb-2"><small class="text-secondary">Keranjang</small></p>
											<a href="<?=Constant::DIRNAME?>product" class="btn btn-outline-danger btn-sm px-3">Lihat</a>
										</div>
										<div class="col-5 position-relative">
											<h5 class="position-absolute start-50 top-50 translate-middle bg-danger text-white py-2 px-3 rounded-2"><?=count($data['cart'])?></h5>
										</div>
									</div>

								</div>

							</div>
							<div class="col-12 col-md-6 mb-3">
								
								<div class="card p-3 border-0 shadow">

									<div class="row">
										<div class="col-7">
											<h5 class="fw-semibold m-0">Inbox</h5>
											<p class="mb-2"><small class="text-secondary">Chat admin</small></p>
											<a href="<?=Constant::DIRNAME?>inbox" class="btn btn-outline-warning btn-sm px-3">Chat</a>
										</div>
										<div class="col-5 position-relative">
											<h5 class="position-absolute start-50 top-50 translate-middle bg-warning text-white py-2 px-3 rounded-2"><i class="bx bxs-message-dots"></i></h5>
										</div>
									</div>

								</div>

							</div>
						</div>
					</div>






					<!-- <div class="col-12 col-md-6 col-lg-4 mb-4">
						<div class="card p-3 border-0 shadow">

							<div class="row">
								<div class="col-7">
									<h5 class="fw-semibold m-0">Product</h5>
									<p class="mb-2"><small class="text-secondary">Makanan</small></p>
									<a href="<?=Constant::DIRNAME?>product" class="btn btn-outline-success btn-sm px-3">Lihat</a>
								</div>
								<div class="col-5 position-relative">
									<h5 class="position-absolute start-50 top-50 translate-middle bg-success text-white px-3 py-2 rounded-2">5</h5>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 mb-4">
						<div class="card p-3 border-0 shadow">

							<div class="row">
								<div class="col-7">
									<h5 class="fw-semibold m-0">History</h5>
									<p class="mb-2"><small class="text-secondary">Riwayat</small></p>
									<a href="" class="btn btn-outline-primary btn-sm px-3">Lihat</a>
								</div>
								<div class="col-5 position-relative">
									<h5 class="position-absolute start-50 top-50 translate-middle bg-primary text-white py-2 px-3 rounded-2">5</h5>
								</div>
							</div>

						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 mb-4">
						<div class="card p-3 border-0 shadow">

							<div class="row">
								<div class="col-7">
									<h5 class="fw-semibold m-0">Shopping</h5>
									<p class="mb-2"><small class="text-secondary">Keranjang</small></p>
									<a href="" class="btn btn-outline-danger btn-sm px-3">Lihat</a>
								</div>
								<div class="col-5 position-relative">
									<h5 class="position-absolute start-50 top-50 translate-middle bg-danger text-white py-2 px-3 rounded-2">5</h5>
								</div>
							</div>

						</div>
					</div> -->

				</div>
				
			</section>