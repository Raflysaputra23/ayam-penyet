			<section class="col-10 col-md-10 mx-auto p-4 poppins overflow-y-auto overflow-x-hidden" style="height: 90vh; max-height: 90vh;">

				<?php if ($_SESSION['role'] == "user"): ?>
				<div class="chatInbox">
					<div class="alert alert-primary d-flex align-items-center p-3" style="height: 5rem;" role="alert">
					  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
						  <symbol id="info-fill" viewBox="0 0 16 16">
						    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
						  </symbol>
						</svg>
					  <svg class="bi me-2" style="width: 25px;" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
					  <div>
					   Jika terjadi kendala saat memesan silahkan kirim pesan pada kolom dibawah ini!
					  </div>
					</div>
					<form action="<?=Constant::DIRNAME?>inbox/informasi" method="post">
						<textarea name="pesan" id="pesan" cols="30" rows="6" class="form-control" style="resize: none;"></textarea>
						<button type="submit" class="btn btn-success mt-2">Submit</button>
					</form>
				</div>
				<?php else: ?>
						<div class="row mb-4">
							<div class="col-8">
								<h4 class="fw-semibold text-success d-flex align-items-center gap-2"><i class="bx bxs-info-circle"></i> Informasi</h4>
							</div>	
						</div>
					<?php if ($data['informasi'] != false): ?>
						<div class="row gap-3 justify-content-center">
					<?php foreach ($data['informasi'] as $info): ?>	
							<div class="col-12 col-md-10 col-lg-5 gx-0">
								<div class="card p-3 shadow" style="border: transparent;">
									<a href="" class="menuEditHapus position-absolute text-black end-0 mt-1 me-2">
									  	<i class="bx bx-menu fs-4" style="transform: scaleX(.2);"></i>
									  </a>
									<div class="position-absolute rounded-2 bg-body-tertiary p-2 d-flex gap-1 d-none" style="top: -3rem; right: -1rem;">
									  	<a href="" class="btn btn-danger btn-sm hapus" data-id-informasi="<?=$info["InformasiID"]?>" data-id-user="<?=$info['SenderID']?>"><i class="bx bx-trash"></i></a>
									</div>
									<div class="d-flex">
										<h5 class="fw-semibold d-flex">By <?=$info['Username']?></h5>
									</div>
									<div class="row">
										<div class="col">
											<div class=""><?=$info['pesan']?></div>
										</div>
									</div>
								</div>
							</div>
					<?php endforeach ?>
						</div>
					<?php else: ?>
						<h2 class="text-center my-5">Tidak ada informasi <i class="bx bx-search"></i></h2>
					<?php endif; ?>
				<?php endif; ?>
				<!-- <div class="card h-100 overflow-y-auto overflow-x-hidden">
					<div class="card-header">
						<div class="row align-items-center">
							<div class="col-3">
								<img src="img/logo.png" alt="" width="100%">
							</div>
							<div class="col-9 gx-0">
								<h5 class="fw-semibold d-flex align-items-center gap-1 fs-5">Admin <i class="bx bxs-badge-check text-primary fs-4"></i></h5>
							</div>
						</div>
					</div>
					<div class="card-body overflow-y-auto overflow-x-hidden">

						<div class="alert alert-info text-center">
							<p class="m-0"><i class='bx bxs-alarm-exclamation fs-5'></i> <small>Jika ada keluhan/hambatan saat pemesanan, bisa tanyakan kepada admin!</small></p>
						</div>

						<?php foreach ($data['inbox'] as $inbox): ?>
							
							<?php if ($inbox['UserID'] == $_SESSION['idUser']): ?>
								<div class="plateChatRight float-end bg-success p-2 mb-2 w-100 position-relative pb-4" style="max-width: 65%;">
									<h6 class="fw-semibold text-white">Anda</h6>
									<p class="m-0 text-white font-menu" style="line-height: 1.4rem;"><?=$inbox['Pesan']?></p>
									<p class="position-absolute text-white end-0 me-2"><small><?=explode(' ',$inbox['WaktuInbox'])[1]?></small></p>
								</div>
							<?php else: ?>
								<div class="plateChatLeft float-start bg-success p-2 mb-2 w-100 position-relative pb-4" style="max-width: 65%;">
									<h6 class="fw-semibold text-white"><?=$inbox['Username']?></h6>
									<p class="m-0 text-white font-menu" style="line-height: 1.4rem;"><?=$inbox['Pesan']?></p>
									<p class="position-absolute text-white end-0 me-2"><small><?=explode(' ',$inbox['WaktuInbox'])[1]?></small></p>
								</div>
							<?php endif; ?>
							
						<?php endforeach ?>
						
					</div>
					<div class="card-footer">
						<div class="input-group">
						  <input type="text" class="form-control" placeholder="Isikan pesan anda..." aria-label="Recipient's username" aria-describedby="button-addon2" value="Halo admin, bisakah saya meminta bantuan?" autofocus>
						  <button class="btn btn-outline-success d-flex" type="button" id="button-addon2" data-id-user="<?=$_SESSION['idUser']?>"><i class="bx bx-send m-auto"></i></button>
						</div>
					</div>		
				</div> -->
			</section>

			<script>
				const menu = document.querySelectorAll('.menuEditHapus');
				menu.forEach((el) => {
					el.addEventListener('click', function(e) {
						e.preventDefault();
						this.nextElementSibling.classList.toggle('d-none');
					})	
				})

				const btnHapus = document.querySelectorAll('.btn-danger');
				btnHapus.forEach((el) => {
					el.addEventListener('click', function(e) {
						e.preventDefault();
						let idUser = this.dataset.idUser;
						let idInformasi = this.dataset.idInformasi;
						
						Swal.fire({
							  title: "Apakah kamu yakin?",
							  text: "ingin menghapus informasi ini",
							  icon: "warning",
							  showCancelButton: true,
							  confirmButtonColor: "#3085d6",
							  cancelButtonColor: "#d33",
							  confirmButtonText: "Iya, hapus"
							}).then( (result) => {
							  if (result.isConfirmed) {
							  	window.location.href = `${dirname}inbox/hapusInformasi/${idInformasi}`;
							  }
							});
					})	
				})
				
				
						
						
				// const cardInbox = document.querySelector('.card');
				// const cardBody = cardInbox.querySelector('.card-body');
				// let input = cardInbox.querySelector('.card-footer .input-group input');
				// let btnInput = input.nextElementSibling;

				// cardInbox.addEventListener('click', async function(e) {
				// 	let element = e.target;


				// });
				
				// input.addEventListener('keyup', function() {
				// 	cekInput();
				// });

				// btnInput.addEventListener('click', async function() {
				// 	let data = {
				// 		idUser: this.dataset.idUser,
				// 		pesan: input.value
				// 	}

				// 	requestAjax(`${dirname}inbox/tambahInbox`, data);
				// 	let response = await requestAjax(`${dirname}inbox/tampilInbox`, data);
				// 	plateInbox(response, data.idUser);
				// 	input.value = '';
				// 	cekInput();
				// });




				// function cekInput() {
				// 	btnInput.setAttribute('disabled','true');
				// 	if (input.value.length == 0) {
				// 		btnInput.setAttribute('disabled','true');
				// 	} else {
				// 		btnInput.removeAttribute('disabled');
				// 	}
					

				// }


				// async function requestAjax(request, data) {
				// 	let response = await fetch(request,{ method: 'POST', header: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) });
				// 	response = await response.json();
				// 	return response;
				// }

				// function plateInbox(elements, idUser) {
				// 	let card = `
				// 		<div class="alert alert-info text-center">
				// 			<p class="m-0"><i class='bx bxs-alarm-exclamation fs-5'></i> <small>Jika ada keluhan/hambatan saat pemesanan, bisa tanyakan kepada admin!</small></p>
				// 		</div>	
				// 	`;
				// 	elements.forEach((el) => {
				// 		if (el.UserID == idUser) {
				// 			card += `
				// 				<div class="plateChatRight float-end bg-success p-2 mb-2 w-100 position-relative pb-4" style="max-width: 65%;">
				// 					<h6 class="fw-semibold text-white">Anda</h6>
				// 					<p class="m-0 text-white font-menu" style="line-height: 1.4rem;">${el.Pesan}</p>
				// 					<p class="position-absolute text-white end-0 me-2"><small>${el.WaktuInbox.split(' ')[1]}</small></p>
				// 				</div>
				// 			`;
				// 		} else {
				// 			card += `
				// 				<div class="plateChatLeft float-start bg-success p-2 mb-2 w-100 position-relative pb-4" style="max-width: 65%;">
				// 					<h6 class="fw-semibold text-white">${el.Username}</h6>
				// 					<p class="m-0 text-white font-menu" style="line-height: 1.4rem;">${el.Pesan}</p>
				// 					<p class="position-absolute text-white end-0 me-2"><small>${el.WaktuInbox.split(' ')[1]}</small></p>
				// 				</div>
				// 			`;
				// 		}
						
				// 	});
				// 	cardBody.innerHTML = card;
				// }

			</script>
