			<section class="col-10 col-md-7 mx-auto col-lg-5 p-4 poppins overflow-y-auto overflow-x-hidden" style="height: 90vh; max-height: 90vh;">
				<div class="card h-100 overflow-y-auto overflow-x-hidden">
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
									<h6 class="fw-semibold text-white"><?=$inbox['Username']?></h6>
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
				</div>
			</section>

			<script>

				const cardInbox = document.querySelector('.card');
				const cardBody = cardInbox.querySelector('.card-body');
				let input = cardInbox.querySelector('.card-footer .input-group input');
				let btnInput = input.nextElementSibling;

				cardInbox.addEventListener('click', async function(e) {
					let element = e.target;


				});
				
				input.addEventListener('keyup', function() {
					cekInput();
				});

				btnInput.addEventListener('click', async function() {
					let data = {
						idUser: this.dataset.idUser,
						pesan: input.value
					}

					requestAjax(`${dirname}inbox/tambahInbox`, data);
					let response = await requestAjax(`${dirname}inbox/tampilInbox`, data);
					plateInbox(response, data.idUser);
					input.value = '';
					cekInput();
				});




				function cekInput() {
					btnInput.setAttribute('disabled','true');
					if (input.value.length == 0) {
						btnInput.setAttribute('disabled','true');
					} else {
						btnInput.removeAttribute('disabled');
					}
					

				}


				async function requestAjax(request, data) {
					let response = await fetch(request,{ method: 'POST', header: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) });
					response = await response.json();
					return response;
				}

				function plateInbox(elements, idUser) {
					let card = `
						<div class="alert alert-info text-center">
							<p class="m-0"><i class='bx bxs-alarm-exclamation fs-5'></i> <small>Jika ada keluhan/hambatan saat pemesanan, bisa tanyakan kepada admin!</small></p>
						</div>	
					`;
					elements.forEach((el) => {
						if (el.UserID == idUser) {
							card += `
								<div class="plateChatRight float-end bg-success p-2 mb-2 w-100 position-relative pb-4" style="max-width: 65%;">
									<h6 class="fw-semibold text-white">${el.Username}</h6>
									<p class="m-0 text-white font-menu" style="line-height: 1.4rem;">${el.Pesan}</p>
									<p class="position-absolute text-white end-0 me-2"><small>${el.WaktuInbox.split(' ')[1]}</small></p>
								</div>
							`;
						} else {
							card += `
								<div class="plateChatLeft float-start bg-success p-2 mb-2 w-100 position-relative pb-4" style="max-width: 65%;">
									<h6 class="fw-semibold text-white">${el.Username}</h6>
									<p class="m-0 text-white font-menu" style="line-height: 1.4rem;">${el.Pesan}</p>
									<p class="position-absolute text-white end-0 me-2"><small>${el.WaktuInbox.split(' ')[1]}</small></p>
								</div>
							`;
						}
						
					});
					cardBody.innerHTML = card;
				}

			</script>
