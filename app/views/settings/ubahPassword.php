			<section class="col-10 p-4 poppins overflow-y-auto overflow-x-hidden position-relative" style="height: 90vh; max-height: 90vh;">
				<div class="row">
					<div class="col">
						<div class="col shadow rounded-2 p-3">
							<div class="form-group">
								<form action="<?=Constant::DIRNAME?>settings/changePassword" method="post">
									<div class="form-group mb-2">
										<label for="" class="mb-1">Password Baru</label>
										<input type="text" name="password" class="form-control">
									</div>
									<div class="form-group mb-2">
										<label for="" class="mb-1">Confirm Password Baru</label>
										<input type="text" name="password2" class="form-control">
									</div>
									<button type="submit" class="btn btn-success mt-2">Kirim</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>