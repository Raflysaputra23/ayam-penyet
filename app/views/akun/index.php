			<section class="col-10 p-4 poppins overflow-y-auto overflow-x-hidden position-relative" style="height: 90vh; max-height: 90vh;">
				<div class="row justify-content-center">
					<div class="col-12 col-md-8 col-lg-9">
						<form action="<?=Constant::DIRNAME?>akun/editData" method="post">
						
							<div class="form-group mb-2">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control" value="<?=$data['user']['Username']?>">
							</div>
							<div class="form-group mb-2">
								<label for="username">Nama Lengkap</label>
								<input type="text" name="namalengkap" class="form-control" value="<?=$data['user']['NamaLengkap']?>">
							</div>
							<div class="form-group mb-2">
								<label for="username">Email</label>
								<input type="text" name="email" class="form-control" value="<?=$data['user']['Email']?>">
							</div>
							<div class="form-group mb-2">
								<label for="username">No. Telp</label>
								<input type="text" name="notelp" class="form-control" value="<?=$data['user']['NoTelp']?>">
							</div>
							<div class="form-group mt-1">
								<button id="btn-save" type="submit" class="btn btn-success" disabled><i class="bx bx-save"></i> Simpan</button>
							</div>

						</form>
					</div>
				</div>
			</section>

			<script>
				const btnSave = document.getElementById('btn-save');
				const input = document.querySelectorAll('.form-control');

				window.addEventListener('load', function() {
					inputEdit();
				});

				function inputEdit() {
					input.forEach((el) => {
						el.addEventListener('keyup', function() {
							btnSave.removeAttribute('disabled');
						});
					});
				}
			</script>