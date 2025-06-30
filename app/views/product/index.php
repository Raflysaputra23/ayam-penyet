			<section class="col-10 p-4 poppins overflow-y-auto overflow-x-hidden position-relative" style="height: 90vh; max-height: 90vh;">
				<div class="row">
					<div class="col-8">
						<h4 class="fw-semibold text-success d-flex align-items-center gap-2"><i class="bx bxl-product-hunt"></i> Product</h4>
					</div>
					<div class="col-4 d-flex justify-content-end">
						<div class="dropdown">
						  <button class="btn btn-success dropdown-toggle shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						    Kategori
						  </button>
						  <ul class="dropdown-menu border-0 shadow mt-2 p-1">
						    <li data-kategori="makanan" data-id-user="<?=$_SESSION['idUser']?>"><a class="dropdown-item hover-menu d-flex align-items-center gap-2 mb-1" data-kategori="makanan" data-id-user="<?=$_SESSION['idUser']?>" href=""><i class="bx bxs-food-menu" data-kategori="makanan" data-id-user="<?=$_SESSION['idUser']?>"></i> Makanan</a></li>
						    <li data-kategori="minuman" data-id-user="<?=$_SESSION['idUser']?>"><a class="dropdown-item hover-menu d-flex align-items-center gap-2 mb-1" data-kategori="minuman" data-id-user="<?=$_SESSION['idUser']?>" href=""><i class="bx bx-drink" data-kategori="minuman" data-id-user="<?=$_SESSION['idUser']?>"></i> Minuman</a></li>
						  </ul>
						</div>
					</div>	
				</div>
				<div id="plateProduk" class="row mt-4">
				<?php if ($data['produk'] != false): ?>
					<?php foreach ($data['produk'] as $produk): ?>
						<div class="col-11 col-md-6 col-lg-4 mb-4">
							<div class="card border-0 shadow position-relative">

							  <?php if ($_SESSION['role'] == 'admin'): ?>
							  <a href="" class="menuEditHapus position-absolute text-black end-0 mt-1" data-id-produk="<?=$produk['ProdukID']?>">
							  	<i class="bx bx-menu fs-4" style="transform: scaleX(.2);"></i>
							  </a>
							  <div class="position-absolute rounded-2 bg-body-tertiary p-2 d-flex gap-1 d-none" style="top: -3rem; right: -2rem;">
							  	<a href="<?=Constant::DIRNAME?>product" data-id-produk="<?=$produk['ProductID']?>" class="btn btn-warning btn-sm edit" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-pencil"></i></a>
							  	<a href="<?=Constant::DIRNAME?>product/hapusProduk/" class="btn btn-danger btn-sm hapus" data-id-produk="<?=$produk['ProductID']?>"><i class="bx bx-trash"></i></a>
							  	<div class="dropdown">
								  <button class="btn btn-success btn-sm shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								   <i class="bx bx-chevron-down"></i>
								  </button>
								  <ul class="dropdown-menu border-0 shadow mt-2 p-1">
								    <li><a href="<?=Constant::DIRNAME?>product/setStokProduk/<?=$produk['ProductID']?>/1" class="dropdown-item hover-menu d-flex align-items-center gap-2 mb-1" data-kategori="makanan" href="">Ada</a></li>
								    <li><a href="<?=Constant::DIRNAME?>product/setStokProduk/<?=$produk['ProductID']?>/0" class="dropdown-item hover-menu d-flex align-items-center gap-2 mb-1" data-kategori="minuman" href="">Habis</a></li>
								  </ul>
								</div>
							  </div>
							  <?php endif ?>

							  <?php if ($produk['StokProduk'] == 'habis'): ?>
							  	<h1 class="border bg-transparent border-danger position-absolute rounded-2 text-danger w-100 text-center mt-5 fw-bold z-3">Habis</h1>
							  <?php endif ?>

							  <img src="<?=Constant::DIRNAME?>img/<?=$produk['GambarProduk']?>" class="mx-auto mt-2 shadow-sm rounded-2" alt="..." width="130" height="140" data-bs-toggle="modal" data-bs-target="#exampleModal" data-gambar-produk="<?=$produk['GambarProduk']?>" data-nama-produk="<?=$produk['NamaProduk']?>" style="<?= ($produk['StokProduk'] == 'habis') ? 'filter: brightness(50%)' : "";?>">
							  <div class="card-body">
							    <h5 class="card-title fw-semibold text-capitalize"><?=$produk['NamaProduk']?></h5>
							    <p class="card-text"><small><?=$produk['DeskripsiProduk']?></small></p>
							  </div>
							  <ul class="list-group list-group-flush">
							    <li class="list-group-item text-capitalize"><i class="bx <?=($produk['KategoriProduk'] == 'minuman') ? 'bx-drink' : 'bxs-food-menu'?>"></i> <?=$produk['KategoriProduk']?></li>
							    <li class="list-group-item"><i class="bx bx-time-five"></i> <?=explode(' ',$produk['WaktuProduksi'])[0]?></li>
							    <li class="list-group-item"><i class="bx bx-purchase-tag-alt"></i> Rp. <?=number_format($produk['HargaProduk'],0,'.','.')?></li>
							  </ul>
							  <div class="card-body text-center">
							    <a href="#" class="btn btn-danger cart <?=($produk['StokProduk'] == 'habis') ? 'disabled' : ''?>" data-nama-produk="<?=$produk['NamaProduk']?>" data-harga-produk="<?=$produk['HargaProduk']?>" data-gambar-produk="<?=$produk['GambarProduk']?>" data-id-produk="<?=$produk['ProductID']?>" data-id-user="<?=$_SESSION['idUser']?>"><i class="bx bx-cart-add fs-5"></i></a>

							  </div>
							</div>
						</div>
					<?php endforeach ?>
				<?php else: ?>
					<h2 class="text-center mt-5">Produk Not Found <i class="bx bx-search fs-2"></i></h2>
				<?php endif; ?>
				
				</div>

				<!-- MODAL PRODUK -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="Modal produk" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h1 class="modal-title fs-5" id="judulModal">Tambah Produk</h1>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				      <div class="modal-body">
				       
				      </div>
				    </div>
				  </div>
				</div>

				<!-- OFF CANVAS CART -->
				<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
				  <div class="offcanvas-header">
				    <h5 class="offcanvas-title fw-semibold" id="offcanvasRightLabel">Shopping Cart</h5>
				    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				  </div>
				  <div class="offcanvas-body position-relative overflow-x-hidden overflow-y-auto">

				  	<?php if ($data['cart'] != false): ?>
				  	<?php foreach ($data['cart'] as $cart): ?>
				  		
				    <div class="card mb-3 shadow border-0" style="height: 4.5rem;">
				    	<div class="row">
				    		<div class="col-3">
				    			<img src="<?=Constant::DIRNAME?>img/<?=$cart['GambarProduk']?>" alt="" class="rounded-2" width="100%" height="72">
				    		</div>
				    		<div class="col-5 px-0">
				    			<p class="fw-semibold m-0"><?=$cart['NamaProduk']?></p>
				    			<p class="text-secondary m-0">Rp. <?=number_format($cart['TotalHarga'],0,'.','.')?></p>
				    		</div>
				    		<div class="col-4 d-flex align-items-center pe-4">
				    			<a href="" class="btn btn-danger btn-sm" data-id-produk="<?=$cart['ProductID']?>" data-id-shopping="<?=$cart['ShoppingID']?>" data-id-user="<?=$cart['UserID']?>" data-harga-produk="<?=$cart['TotalHarga']?>" data-quantity="<?=$cart['quantity']?>"><i class="bx bx-minus"></i></a>
				    			<p class="m-auto"><?=$cart['quantity']?></p>
				    			<a href="" class="btn btn-success btn-sm" data-id-produk="<?=$cart['ProductID']?>"data-id-shopping="<?=$cart['ShoppingID']?>" data-id-user="<?=$cart['UserID']?>" data-harga-produk="<?=$cart['TotalHarga']?>" data-quantity="<?=$cart['quantity']?>"><i class="bx bx-plus"></i></a>
				    		</div>
				    	</div>
				    </div>

				    <?php endforeach ?>
				    <?php else: ?>
						<h4 class="text-center mt-5">Cart is Empty <i class="bx bx-search fs-4"></i></h4>
				    <?php endif; ?>

				    <div class="w-100 position-absolute bottom-0 start-0 end-0 px-3 py-2 rounded-2 shadow">
				    	<div class="row align-items-center">
					    	<div class="col-8">
						    	<p class="m-0 fw-semibold">Total Harga</p>
						    	<p class="m-0">Rp. <?= number_format($data['totalHarga']['total'] == null ? 0 : $data['totalHarga']['total'],0,'.','.')?></p>
					    	</div>
					    	<div class="col-4">
					    		<button class="btn btn-primary btn-buy" <?=($data['cart'] == false) ? 'disabled' : '';?> onClick="btnBuy(event)" data-id-user="<?=$_SESSION['idUser']?>">Pesan</button>		
					    	</div>
				    	</div>
				    </div>

				  </div>
				</div>		

			</section>

			<script>
				const modalBody = document.querySelector('.modal-body');
				const modalFooter = document.querySelector('.modal-footer');
				const modalHeader = document.querySelector('.modal-header');
				const canvasBody = document.querySelector('.offcanvas-body');
				const quantityCart = document.querySelector("#btn-shopping-cart").nextElementSibling
				const role = document.querySelector('#role').dataset.user;


				window.addEventListener('load', () => {
					localStorage.setItem('quantityCart', quantityCart.innerHTML);
					if (parseInt(localStorage.getItem('quantityCart'))) {
						quantityCart.classList.replace('d-none','d-block');
					} else {
						quantityCart.classList.replace('d-block','d-none');
					}
				});

				modalBody.addEventListener('change', function(e) {
					let element = e.target;
					if (element.type == 'file' || element.classList.contains('bx-camera')) {
						if (element.classList.contains('bx-camera')) {
							element = element.previousElementSibling;
						}
						let file = element.files[0];
						let reader = new FileReader();
						reader.onload = function(e) {
							if (this.readyState == 2) {
								let img = document.getElementById('plateGambar');
								img.src = this.result;
							}
						}
						reader.readAsDataURL(file);
					}
				});


				const plateProduks = document.getElementById('plateProduk');
				plateProduks.addEventListener('click', async function(e) {
					let element = e.target;
					if (element.tagName == 'IMG') {
						let gambarProduk = element.dataset.gambarProduk;
						let namaProduk = element.dataset.namaProduk;

						modalHeader.querySelector('h1').innerHTML = namaProduk;

						modalBody.innerHTML = `
							 <div class="row justify-content-center">
					        	<div class="col-12 text-center">
					        		<img id="gambarProduk" class="rounded-3 shadow ratio ratio-1x1" src="img/${gambarProduk}" alt="">
					        	</div>
					        </div>
						`;
					}

					if (element.classList.contains('bx-menu') || element.classList.contains('menuEditHapus')) {
						e.preventDefault();
						let el = element;
						if (element.classList.contains('bx-menu')) {
							el = element.parentElement;
						}
						el.nextElementSibling.classList.toggle('d-none');
					}

					if (element.classList.contains('bx-trash') || element.classList.contains('hapus')) {
						e.preventDefault();
						let el = element;
						if (element.classList.contains('bx-trash')) {
							el = element.parentElement;
						}
						let data = {
							idProduk: el.dataset.idProduk
						}

						Swal.fire({
						  title: "Apakah kamu yakin?",
						  text: "ingin menghapus produk ini",
						  icon: "warning",
						  showCancelButton: true,
						  confirmButtonColor: "#3085d6",
						  cancelButtonColor: "#d33",
						  confirmButtonText: "Iya, hapus"
						}).then( (result) => {
						  if (result.isConfirmed) {
						  	window.location.href = `${el.href}${data.idProduk}`;
						  }
						});
					}

					if (element.classList.contains('bx-pencil') || element.classList.contains('edit')) {
						e.preventDefault();
						let el = element;
						if (element.classList.contains('bx-pencil')) {
							el = element.parentElement;
						}
						let data = {
							idProduk: el.dataset.idProduk
						};

						let response = await requestAjax(`${dirname}product/getProdukById`, data);

						modalHeader.querySelector('h1').innerHTML = 'Edit Produk';

						modalBody.innerHTML = `
						<form action="${dirname}product/editProduk/${data.idProduk}" method="post" enctype="multipart/form-data" autocomplete="off">
							<input type="hidden" name="gambarlama" id="" value="${response.GambarProduk}">
							<div class="row justify-content-center">	

					        	<div class="col-7 col-lg-4 mb-5 text-center position-relative">
					        		<img id="plateGambar" src="img/${response.GambarProduk}" class="rounded-3 shadow border" alt="" style="width: 100%; height: 14.4rem;">
					        		<div class="border rounded-circle bg-success position-absolute end-0 bottom-0" style="width: 3rem; height: 3rem;">
					        			<input type="file" name="gambarproduk" id="gambarproduk" class="w-100 h-100 opacity-0 position-relative z-3">
					        			<i class="bx bxs-camera fs-4 position-absolute start-50 top-50 translate-middle text-white"></i>
					        		</div>
					        	</div>

					        	<div class="col-12 col-lg-6 mb-3">
					        			<div class="form-group mb-3">
					        				<label for="namaproduk" class="mb-1">Nama Produk</label>
					        				<input type="text" name="namaproduk" id="namaproduk" value="${response.NamaProduk}" class="form-control" required>
					        			</div>
						        			<div class="form-group mb-3">
						        				<label for="hargaproduk" class="mb-1">Harga Produk</label>
						        				<input type="number" name="hargaproduk" min="0" id="hargaproduk" value="${response.HargaProduk}" class="form-control"required>
						        			</div>
					        			<div class="form-group mb-3 position-relative">
					        				<label for="kategoriproduk" class="mb-1">Kategori Produk</label>
					        				<select name="kategoriproduk" id="kategoriproduk" class="form-control">
					        					<option value="" disabled>Pilih Kategori</option>
					        					${(response.KategoriProduk == 'makanan') ? 
					        						`<option value="makanan">Makanan</option>
					        						 <option value="minuman">Minuman</option>` :
					        						`<option value="minuman">Minuman</option>
					        						 <option value="makanan">Makanan</option>`
					        					}
					        					
					        				</select>
					        				<i class="bx bx-chevron-down position-absolute fs-4" style="right: .5rem; bottom: .4rem;"></i>
					        			</div>
					        	</div>
					        	<div class="col-12 col-lg-10">
					        		<div class="form-group">
						        		<label for="deskripsiproduk" class="mb-1">Deskripsi</label>
						        		<textarea name="deskripsiproduk" id="deskripsiproduk" maxlength="70" cols="10" rows="4" style="resize: none;" class="form-control">${response.DeskripsiProduk}</textarea>	
					        		</div>
					        	</div>

					        </div>
					        <div class="modal-footer mt-4">
						        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-success"><i class="bx bx-plus"></i></button>
					     	</div>

					    </form>
						`;
					}

					if (element.classList.contains('cart') || element.classList.contains('bx-cart-add')) {
						let elementCart = element;
						if (element.classList.contains('bx-cart-add')) {
							elementCart = element.parentElement;
						}

						let data = {
							idUser: elementCart.dataset.idUser,
							idProduk: elementCart.dataset.idProduk,
							hargaProduk: elementCart.dataset.hargaProduk
						}

						let response = await requestAjax(`${dirname}product/getCart`, data);
						let totalHarga = await requestAjax(`${dirname}product/getTotalHarga`, data);
						plateCart(response, totalHarga, data.idUser);
						if (response.length) {
							quantityCart.classList.replace('d-none','d-block');
							quantityCart.innerHTML = response.length;
						}


					}
				});


				const menuKategori = document.querySelector('.dropdown-menu');
				menuKategori.addEventListener('click', async (e) => {
					let element = e.target;
					if (element.classList.contains('dropdown-item') || element.classList.contains('bx')) {
						e.preventDefault();
						let data = { kategori: element.dataset.kategori, idUser: element.dataset.idUser };
						plateProduk(await getProdukByKategori(data), data.idUser);

					}

				});

				const tambahProduk = document.getElementById('tambah-produk');
				tambahProduk.addEventListener('click', function() {

					modalHeader.querySelector('h1').innerHTML = 'Tambah Produk';

					modalBody.innerHTML = `
						<form action="${dirname}product/tambahProduk" method="post" enctype="multipart/form-data" autocomplete="off">
							<input type="hidden" name="gambarlama" id="">
							<div class="row justify-content-center">	

					        	<div class="col-7 col-lg-4 mb-5 text-center position-relative">
					        		<img id="plateGambar" src="img/logo.png" class="rounded-3 shadow border" alt="" style="width: 100%; height: 14.4rem;">
					        		<div class="border rounded-circle bg-success position-absolute end-0 bottom-0" style="width: 3rem; height: 3rem;">
					        			<input type="file" name="gambarproduk" id="gambarproduk" class="w-100 h-100 opacity-0 position-relative z-3">
					        			<i class="bx bxs-camera fs-4 position-absolute start-50 top-50 translate-middle text-white"></i>
					        		</div>
					        	</div>

					        	<div class="col-12 col-lg-6 mb-3">
					        			<div class="form-group mb-3">
					        				<label for="namaproduk" class="mb-1">Nama Produk</label>
					        				<input type="text" name="namaproduk" id="namaproduk" class="form-control" required>
					        			</div>
						        			<div class="form-group mb-3">
						        				<label for="hargaproduk" class="mb-1">Harga Produk</label>
						        				<input type="number" min="0" name="hargaproduk" id="hargaproduk" class="form-control"required>
						        			</div>
					        			<div class="form-group mb-3 position-relative">
					        				<label for="kategoriproduk" class="mb-1">Kategori Produk</label>
					        				<select name="kategoriproduk" id="kategoriproduk" class="form-control">
					        					<option value="" disabled>Pilih Kategori</option>
					        					<option value="makanan">Makanan</option>
					        					<option value="minuman">Minuman</option>
					        				</select>
					        				<i class="bx bx-chevron-down position-absolute fs-4" style="right: .5rem; bottom: .4rem;"></i>
					        			</div>
					        	</div>
					        	<div class="col-12 col-lg-10">
					        		<div class="form-group">
						        		<label for="deskripsiproduk" class="mb-1">Deskripsi</label>
						        		<textarea name="deskripsiproduk" id="deskripsiproduk" maxlength="70" cols="10" rows="4" style="resize: none;" class="form-control"></textarea>	
					        		</div>
					        	</div>

					        </div>
					        <div class="modal-footer mt-4">
						        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-success"><i class="bx bx-plus"></i></button>
					     	</div>

					    </form>
					`;
				});

				canvasBody.addEventListener('click', async function(e) {
					let element = e.target;
					if (element.tagName = 'A' && element.classList.contains('btn-success') || element.classList.contains('bx-plus')) {
						e.preventDefault();
						if (element.classList.contains('bx-plus')) {
							element = element.parentElement;
						}
						data = {
							idUser: element.dataset.idUser,
							idShopping: element.dataset.idShopping,
							idProduk: element.dataset.idProduk,
							hargaProduk: element.dataset.hargaProduk,
							quantity: element.dataset.quantity
						}

						let response  = await requestAjax(`${dirname}product/plusCart`, data);
						let totalHarga = await requestAjax(`${dirname}product/getTotalHarga`, data);
						plateCart(response, totalHarga, data.idUser);
					}

					if (element.tagName = 'A' && element.classList.contains('btn-danger') || element.classList.contains('bx-minus')) {
						e.preventDefault();
						if (element.classList.contains('bx-minus')) {
							element = element.parentElement;
						}
						data = {
							idUser: element.dataset.idUser,
							idShopping: element.dataset.idShopping,
							idProduk: element.dataset.idProduk,
							hargaProduk: element.dataset.hargaProduk,
							quantity: element.dataset.quantity
						}


						let response  = await requestAjax(`${dirname}product/minusCart`, data);
						let totalHarga = await requestAjax(`${dirname}product/getTotalHarga`, data);
						plateCart(response, totalHarga, data.idUser);
						if (response.length) {
							quantityCart.innerHTML = response.length;
						} else {
							quantityCart.innerHTML = response.length;
							quantityCart.classList.replace('d-block','d-none');
						}
	
					}
				});









				async function requestAjax(path, data) {
					let response = await fetch(path,{ method: 'POST', header: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) });
					response = await response.json();
					return response;
				}



				async function getProdukByKategori(data) {
					let response = await fetch(`${dirname}product/getProdukByKategori`,{ method: 'POST', header: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) });
					response = await response.json();
					return response;
				}

				function plateProduk(data, idUser) {
					let element = '';
					if (data != false) {
						data.forEach((produk) => {
							element += `
								<div class="col-11 col-md-6 col-lg-4 mb-4">
									<div class="card border-0 shadow">

									${(role == 'admin') ?
									  `<a href="" class="menuEditHapus position-absolute text-black end-0 mt-1" data-id-produk="${produk.ProductID}">
									  	<i class="bx bx-menu fs-4" style="transform: scaleX(.2);"></i>
									  </a>
									  <div class="position-absolute rounded-2 bg-body-tertiary p-2 d-flex gap-1 d-none" style="top: -3rem; right: -2rem;">
									  	<a href="${dirname}product/editProduk" data-id-produk="${produk.ProductID}" class="btn btn-warning btn-sm edit" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-pencil"></i></a>
									  	<a href="${dirname}product/hapusProduk/" class="btn btn-danger btn-sm hapus" data-id-produk="${produk.ProductID}"><i class="bx bx-trash"></i></a>
									  	<div class="dropdown">
										  <button class="btn btn-success btn-sm shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										   <i class="bx bx-chevron-down"></i>
										  </button>
										  <ul class="dropdown-menu border-0 shadow mt-2 p-1">
										    <li><a href="${dirname}/product/setStokProduk/${produk.ProductID}/1" class="dropdown-item hover-menu d-flex align-items-center gap-2 mb-1" data-kategori="makanan" href="">Ada</a></li>
										    <li><a href="${dirname}/product/setStokProduk/${produk.ProductID}/2" class="dropdown-item hover-menu d-flex align-items-center gap-2 mb-1" data-kategori="minuman" href="">Habis</a></li>
										  </ul>
										</div>
									  </div>`
									:''}
									  
									  <img src="img/${produk.GambarProduk}" class="mx-auto mt-2 shadow-sm rounded-2" alt="..." width="130" height="140" data-bs-toggle="modal" data-bs-target="#exampleModal" data-gambar-produk="${produk.GambarProduk}" data-nama-produk="${produk.NamaProduk}">
									  <div class="card-body">
									    <h5 class="card-title fw-semibold text-capitalize">${produk.NamaProduk}</h5>
									    <p class="card-text"><small>${produk.DeskripsiProduk}</small></p>
									  </div>
									  <ul class="list-group list-group-flush">
									    <li class="list-group-item text-capitalize"><i class="bx ${(produk.KategoriProduk == 'minuman') ? 'bx-drink' : 'bxs-food-menu'}"></i> ${produk.KategoriProduk}</li>
									    <li class="list-group-item"><i class="bx bx-time-five"></i> ${produk.WaktuProduksi.split(' ')[0]}</li>
									    <li class="list-group-item"><i class="bx bx-purchase-tag-alt"></i> Rp. ${numberFormat(produk.HargaProduk,0,'.','.')}</li>
									  </ul>
									  <div class="card-body text-center">
									    <a href="#" class="btn btn-danger cart" data-nama-produk="${produk.NamaProduk}" data-harga-produk="${produk.HargaProduk}" data-gambar-produk="${produk.GambarProduk}" data-id-produk="${produk.ProductID}" data-id-user="${idUser}"><i class="bx bx-cart-add fs-5"></i></a>
									  </div>
									</div>
								</div>
							`;
						});
						plateProduks.innerHTML = element;
					} else{
						plateProduks.innerHTML = `<h2 class="text-center mt-5">Produk Not Found <i class="bx bx-search fs-2"></i></h2>`;
					}
				}	

				function plateCart(data, totalHarga, idUser) {
					let element = '';
					if (data != false) {
						element = `
							<div class="w-100 position-absolute bottom-0 start-0 end-0 px-3 py-2 rounded-2 shadow">
						    	<div class="row align-items-center">
							    	<div class="col-8">
								    	<p class="m-0 fw-semibold">Total Harga</p>
								    	<p class="m-0">Rp. ${numberFormat(totalHarga.total,0,'.','.')}</p>
							    	</div>
							    	<div class="col-4">
						    			<button type="button" class="btn btn-primary btn-buy" ${(data == false) ? 'disabled' : ''} data-id-user="${idUser}" onClick="btnBuy(event)">Pesan</button>
							    	</div>
						    	</div>
						    </div>
						`;
						data.forEach(el => {
							element += `
								<div class="card mb-3 shadow border-0" style="height: 4.5rem;">
							    	<div class="row">
							    		<div class="col-3">
							    			<img src="${dirname}img/${el.GambarProduk}" alt="" class="rounded-2" width="100%" height="72">
							    		</div>
							    		<div class="col-5 px-0">
							    			<p class="fw-semibold m-0">${el.NamaProduk}</p>
							    			<p class="text-secondary m-0">Rp. ${numberFormat(el.TotalHarga,0,'.','.')}</p>
							    		</div>
							    		<div class="col-4 d-flex align-items-center pe-4">
							    			<a href="" class="btn btn-danger btn-sm" data-id-produk="${el.ProductID}" data-id-shopping="${el.ShoppingID}" data-id-user="${el.UserID}" data-harga-produk="${el.TotalHarga}" data-quantity="${el.quantity}"><i class="bx bx-minus"></i></a>
							    			<p class="m-auto">${el.quantity}</p>
							    			<a href="" class="btn btn-success btn-sm" data-id-produk="${el.ProductID}" data-id-shopping="${el.ShoppingID}" data-id-user="${el.UserID}" data-harga-produk="${el.TotalHarga}" data-quantity="${el.quantity}"><i class="bx bx-plus"></i></a>
							    		</div>
							    	</div>
							    </div>
							`;
						});
					} else {
						element += `<div class="w-100 position-absolute bottom-0 start-0 end-0 px-3 py-2 rounded-2 shadow">
								    	<div class="row align-items-center">
									    	<div class="col-8">
										    	<p class="m-0 fw-semibold">Total Harga</p>
										    	<p class="m-0">Rp. 0</p>
									    	</div>
									    	<div class="col-4">
									    		<form action="">
								    				<button type="submit" class="btn btn-primary" disabled>Pesan</button>
								    			</form>	
									    	</div>
								    	</div>
								    </div>`
						element += '<h4 class="text-center mt-5">Cart is Empty <i class="bx bx-search fs-4"></i></h4>'
					}
					
					canvasBody.innerHTML = element;
				}

				


				window.addEventListener('load', function() {
					rowProduk();

				});

				window.addEventListener('resize', function() {
					rowProduk();
				});

				function rowProduk() {
					if (window.innerWidth <= 766) {
						document.getElementById('plateProduk').classList.add('justify-content-center');
					} else if(window.innerWidth >= 767) {
						document.getElementById('plateProduk').classList.remove('justify-content-center');
					}
				};

				function numberFormat(number, decimals, dec_point, thousands_sep) {
				    number = number || 0;
				    decimals = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
				    dec_point = dec_point || '.';
				    thousands_sep = thousands_sep || ',';

				    const sign = number < 0 ? '-' : '';
				    const absNumber = Math.abs(+number || 0).toFixed(decimals);
				    const intPart = String(parseInt(absNumber, 10));
				    const j = (intPart.length > 3) ? intPart.length % 3 : 0;

				    const formattedNumber = sign +
				        (j ? intPart.substr(0, j) + thousands_sep : '') +
				        intPart.substr(j).replace(/(\d{3})(?=\d)/g, '$1' + thousands_sep) +
				        (decimals ? dec_point + Math.abs(number - intPart).toFixed(decimals).slice(2) : '');

				    return formattedNumber;
				}

				async function btnBuy(e) {
					let data = {
						idUser: e.target.dataset.idUser
					}
					

					data["totalHarga"] = await requestAjax(`${dirname}product/getTotalHarga`, data);
					data["dataProduk"] = await requestAjax(`${dirname}product/getProdukCart`, data);
					data["dataUser"] = await requestAjax(`${dirname}product/getDataUser`, data);
					data.dataProduk.forEach((el, key) => {
						data.dataProduk[key].id = parseInt(el.ProductID);
						data.dataProduk[key].name = el.NamaProduk;
						data.dataProduk[key].price = parseInt(el.HargaProduk);
						data.dataProduk[key].quantity = parseInt(data.dataProduk[key].quantity)
					});
						
					let token = await fetch(`${dirname}gateaway.php`,{ method: 'POST', header: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) });
					token = await token.text();
					
					window.snap.pay(token, {
						onSuccess: (result) => {
							localStorage.setItem('quantityCart',0);
							window.location.href = `${dirname}product/setTranksaksi/${data.dataProduk[0]["ShoppingID"]}/${result.order_id}`;
						},
						onPending: (result) => {
							swetAlertMixin('error',`Menunggu pembayaran`);
							result.finish_redirect_url = "";
						},
						onClose: (result) => {
							swetAlertMixin('error',`Pembayaran gagal`);
							// 
							console.log(result)
						}
					});

					
					
				}

				// function formatMessage(dataProduk,totalHarga, user) {
				// 	return `
				// 	Data Customer
				// 	Nama : ${user.Username}
				// 	Email : ${user.Email}
				// 	NoTelp : ${user.NoTelp}

				// 	Data Pesanan
				// 	${dataProduk.map(el => `${el.NamaProduk}: Rp.${numberFormat(el.HargaProduk,0,'.','.')} \n`)}

				// 	Total Harga 
				// 	Rp.${numberFormat(totalHarga.total,0,'.','.')}
				// 	`
				// }

				function swetAlertMixin(type, title) {

					const Toast = Swal.mixin({
					  toast: true,
					  position: 'top-end',
					  showConfirmButton: false,
					  timer: 3000,
					  timerProgressBar: true,
					  didOpen: (toast) => {
					    toast.onmouseenter = Swal.stopTimer;
					    toast.onmouseleave = Swal.resumeTimer;
					  }
					});
					Toast.fire({
					  icon: type,
					  title: title
					});
			
				}
			</script>