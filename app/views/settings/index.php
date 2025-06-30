			<section class="col-10 p-4 poppins overflow-y-auto overflow-x-hidden position-relative" style="height: 90vh; max-height: 90vh;">
				<div class="row">
					<div class="col">
						<a id="btnShowBox" class="p-2 px-3 text-black d-flex align-items-center gap-2 hover-menu transition-ease-03s"><i class="bx bx-message-dots fs-5"></i> Ubah Password</a>
						<div id="boxPass" class="row gx-0 mt-2 shadow overflow-hidden active" style="height: 0px;">
							<div class="col shadow rounded-2 p-3">
								<div class="form-group">
									<form action="<?=Constant::DIRNAME?>settings/validasiPassword" method="post">
										<label for="" class="mb-1">Masukkan Password Lama</label>
										<input type="text" name="passwordLama" class="form-control">
										<button type="submit" class="btn btn-success mt-2">Kirim</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<script>
				const boxPass = document.getElementById('boxPass');
				const btnShowBox = document.getElementById('btnShowBox');
				let heightBox = boxPass.scrollHeight;
				boxPass.style.transition = 'all 5s ease-in-out';

				btnShowBox.addEventListener('click', function(e) {
					e.preventDefault();
					if (boxPass.classList.contains('active')) {
						boxPass.classList.replace('active','unactive');
						boxPass.style.height = 0;
						boxPass.style.overflow = 'hidden';
						boxPass.style.transition = `height 400ms ease-in-out`;
						setTimeout(() => {
							boxPass.style.height = `${heightBox}px`;
						}, 10)	
					} else {
						boxPass.classList.replace('unactive','active');
						boxPass.style.height = `${heightBox}px`;
						boxPass.style.overflow = 'hidden';
						boxPass.style.transition = `height 400ms ease-in-out`;
						setTimeout(() => {
							boxPass.style.height = `0`;
						}, 10)
					}	
				});

				
				




			</script>