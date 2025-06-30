			<section class="col-10 p-4 poppins overflow-y-auto overflow-x-hidden" style="height: 90vh; max-height: 90vh;">
				<div class="row">
					<div class="col-8">
						<h4 class="fw-semibold text-success d-flex align-items-center gap-2"><i class="bx bx-history"></i> History</h4>
					</div>
					<div class="col-4 text-end">
						<button type="submit" class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-sort"></i></button>
						<ul class="dropdown-menu border-0 shadow mt-2 p-1">
						   <li class="btnTerlama" data-order="ASC" data-id-user="<?=$_SESSION['idUser']?>"><a class="dropdown-item hover-menu d-flex align-items-center gap-2 mb-1" data-order="DESC" data-id-user="<?=$_SESSION['idUser']?>" href="#"><i class="bx bxs-time" data-order="DESC" data-id-user="<?=$_SESSION['idUser']?>"></i> Terlama</a></li>
						   <li class="btnTerbaru" data-order="DESC" data-id-user="<?=$_SESSION['idUser']?>"><a class="dropdown-item hover-menu d-flex align-items-center gap-2 mb-1" data-order="ASC" data-id-user="<?=$_SESSION['idUser']?>" href="#"><i class="bx bxs-time-five" data-order="ASC" data-id-user="<?=$_SESSION['idUser']?>"></i> Terbaru</a></li>
						</ul>
					</div>
				</div>

				<div id="plateHistory" class="row mt-4">

				<?php if ($data['idTranksaksi'] != false): ?>
				<?php foreach ($data['idTranksaksi'] as $history): ?>
				
					<div class="col-10 col-md-6 col-lg-5 mb-4">
						<div class="card p-2">
							<div class="text-center">
								<h5 class="m-0 fw-bold tillana text-success">Ayam penyet</h5>
								<h5 class="m-0 fw-bold tillana text-success">Sambal ijo</h5>
							</div>
							<p class="mt-3 m-0 text-secondary font-menu lh-1"><small>Order ID : <?=$history['TranksaksiID']?></small></p>
							<p class="m-0 text-secondary font-menu"><small>Waktu Tranksaksi : <?=$history['WaktuHistory']?></small></p>
							<hr class="m-0 mb-3">
							<div class="row">

								<?php foreach ($data['history'] as $dataHistory): ?>
									<?php if ($dataHistory['TranksaksiID'] == $history['TranksaksiID']): ?>
							
								<div class="col-4">
									<p class="font-menu"><?=$dataHistory['NamaProduk']?></p>
								</div>
								<div class="col-3">
									<p class="font-menu"><?=$dataHistory['quantity']?></p>
								</div>
								<div class="col-5">
									<p class="font-menu">Rp.<?=number_format($dataHistory['TotalHarga'],0,'.','.')?></p>
								</div>

									<?php endif ?>
								<?php endforeach ?>
								<div class="col-7">
									<p class="font-menu">Total Harga :</p>
								</div>
								<div class="col-5">
									<p class="font-menu">Rp.<?=number_format($history['TotalHarga'],0,'.','.')?></p>
								</div>

	

							</div>
							<hr class="m-0">
							<p class="mt-2 m-0 font-menu">Call Center :</p>
							<p class="font-menu m-0">085333369015</p>
							<h5 class="fw-bold font-menu m-0 text-center mt-4">Terimakasih sudah berbelanja</h5>
							<h5 class="fw-bold font-menu m-0 text-center">Ditoko kami</h5>
						</div>
					</div>

				<?php endforeach ?>
				<?php else: ?>
					<h2 class="text-center mt-5">History Not Found <i class="bx bx-search fs-2"></i></h2>
				<?php endif; ?>

				</div>		
			</section>

			<script>
				window.addEventListener('load', function() {
					rowHistory();
				});

				window.addEventListener('resize', function() {
					rowHistory();
				});

				function rowHistory() {
					if (window.innerWidth <= 766) {
						document.getElementById('plateHistory').classList.add('justify-content-center');
					} else if(window.innerWidth >= 767) {
						document.getElementById('plateHistory').classList.remove('justify-content-center');
					}
				};

				btnTerlama = document.querySelector('.btnTerlama');
				btnTerlama.addEventListener('click', async function(e) {
					e.preventDefault();

					data = {
						order: this.dataset.order,
						idUser: this.dataset.idUser
					}

					let dataId = await requestAjax(`${dirname}history/getHistoryByOrder`, data);
					let dataProduk = await requestAjax(`${dirname}history/getHistory`, data);

					plateHistory(dataId, dataProduk);
				});

				btnTerbaru = document.querySelector('.btnTerbaru');
				btnTerbaru.addEventListener('click', async function(e) {
					e.preventDefault();

					data = {
						order: this.dataset.order,
						idUser: this.dataset.idUser
					}

					let dataId = await requestAjax(`${dirname}history/getHistoryByOrder`, data);
					let dataProduk = await requestAjax(`${dirname}history/getHistory`, data);

					plateHistory(dataId, dataProduk);
				})

				async function requestAjax(path, data) {
					let response = await fetch(path,{ method: 'POST', header: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) });
					response = await response.json();
					return response;
				}

				function plateHistory(dataId, dataProduk) {
					let element = '';

					if (dataId != false) {
					dataId.forEach((el) => {
						element += `
							<div class="col-10 col-md-6 col-lg-5 mb-4">
								<div class="card p-2">
									<div class="text-center">
										<h5 class="m-0 fw-bold tillana text-success">Ayam penyet</h5>
										<h5 class="m-0 fw-bold tillana text-success">Sambal ijo</h5>
									</div>
									<p class="mt-3 m-0 text-secondary font-menu lh-1"><small>Order ID : ${el.TranksaksiID}</small></p>
									<p class="m-0 text-secondary font-menu"><small>Waktu Tranksaksi : ${el.WaktuHistory}</small></p>
									<hr class="m-0 mb-3">
									<div class="row">
										
										${plateProduk(dataProduk, el.TranksaksiID)}
											
										<div class="col-7">
											<p class="font-menu">Total Harga :</p>
										</div>
										<div class="col-5">
											<p class="font-menu">Rp.${numberFormat(el.TotalHarga,0,'.','.')}</p>
										</div>

			

									</div>
									<hr class="m-0">
									<p class="mt-2 m-0 font-menu">Call Center :</p>
									<p class="font-menu m-0">085333369015</p>
									<h5 class="fw-bold font-menu m-0 text-center mt-4">Terimakasih sudah berbelanja</h5>
									<h5 class="fw-bold font-menu m-0 text-center">Ditoko kami</h5>
								</div>
							</div>
						`;
					});
				} else {
					element += `<h2 class="text-center mt-5">History Not Found <i class="bx bx-search fs-2"></i></h2>`;
				}
					document.getElementById('plateHistory').innerHTML = element;
				}



				function plateProduk(dataProduk, idTranksaksi) {
					let element = '';
					dataProduk.forEach((el) => {
						if (el.TranksaksiID == idTranksaksi) {
							element += `
								<div class="col-4">
									<p class="font-menu">${el.NamaProduk}</p>
								</div>
								<div class="col-3">
									<p class="font-menu">${el.quantity}</p>
								</div>
								<div class="col-5">
									<p class="font-menu">Rp.${numberFormat(el.TotalHarga,0,'.','.')}</p>
								</div>
							`;
						}
					});
					return element;
				}


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
			</script>