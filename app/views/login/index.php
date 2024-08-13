	<main class="container" >
		<div class="row justify-content-center mt-4 poppins">
			<div class="col-9 col-md-7 col-lg-5">
				<div class="card p-4 pb-5">
					<form action="<?=Constant::DIRNAME?>login/masuk" method="post" autocomplete="off">
						<h2 class="text-center mb-4 tillana text-shadow text-success">Login</h2>
						<div class="form-group position-relative mb-4">
							<input type="text" name="username" id="username" class="form-control focusLabelTop p-2" required>
							<label class="position-absolute transition-ease-03s" for="username" style="bottom: .5rem; left: .6rem;">Username</label>
							<i class="fa fa-user position-absolute fs-5" style="bottom: .7rem; right: .7rem;"></i>
						</div>
						<div class="form-group position-relative mb-3">
							<input type="password" name="password" id="password" class="form-control focusLabelTop p-2" required>
							<label class="position-absolute transition-ease-03s" for="password" style="bottom: .5rem; left: .6rem;">Password</label>
							<i class="fa fa-eye-slash position-absolute fs-5" style="bottom: .7rem; right: .7rem;"></i>

						</div>
						<div class="form-group d-flex align-items-center gap-2 mb-3">
							<input type="checkbox">
							<p class="m-0">Remember me</p>
						</div>
						<button type="submit" class="btn btn-success w-100">Login</button>
					</form>
				</div>
			</div>

			<script>
				let form = document.querySelector('form');
				form.addEventListener('click', function(e) {
					let element = e.target;
					let inputPassword = element.previousElementSibling.previousElementSibling;
					if (element.classList.contains('fa-eye-slash') || element.classList.contains('fa-eye')) {
						if (inputPassword.type == 'password') {
							element.classList.replace('fa-eye-slash', 'fa-eye');
							inputPassword.type = 'text';
						} else {
							element.classList.replace('fa-eye', 'fa-eye-slash');
							inputPassword.type = 'password';
						}
					}
				});	
			</script>