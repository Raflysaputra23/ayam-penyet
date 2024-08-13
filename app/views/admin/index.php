	<main class="container" >
		<div class="row justify-content-center mt-4 poppins">
			<div class="col-9 col-md-7 col-lg-5">
				<div class="card p-4 pb-5">
					<form action="<?=Constant::DIRNAME?>register/daftar" method="post" autocomplete="off">
						<h2 class="text-center mb-4 tillana text-shadow text-danger">Admin</h2>
						<div class="form-group position-relative mb-4">
							<input type="text" name="username" id="username" class="form-control p-2 focusLabelTop pe-5" minlength="4" required>
							<label class="position-absolute transition-ease-03s" for="username" style="bottom: .5rem; left: .6rem;">Username</label>
							<p class="position-absolute end-0 font-menu text-danger"></p>
							<i class="fa fa-user position-absolute fs-5" style="bottom: .7rem; right: .7rem;"></i>
						</div>
						<div class="form-group position-relative mb-4">
							<input type="text" name="namalengkap" id="namalengkap" class="form-control p-2 focusLabelTop pe-5" minlength="4" required>
							<label class="position-absolute transition-ease-03s" for="namalengkap" style="bottom: .5rem; left: .6rem;">Nama Lengkap</label>
							<p class="position-absolute end-0 font-menu text-danger"></p>
							<i class="fa fa-user position-absolute fs-5" style="bottom: .7rem; right: .7rem;"></i>

						</div>
						<div class="form-group position-relative mb-4">
							<input type="email" name="email" id="email" class="form-control p-2 focusLabelTop pe-5" minlength="4" required>
							<label class="position-absolute transition-ease-03s" for="email" style="bottom: .5rem; left: .6rem;">Email</label>
							<p class="position-absolute end-0 font-menu text-danger"></p>
							<i class="fa fa-inbox position-absolute fs-5" style="bottom: .7rem; right: .7rem;"></i>

						</div>
						<div class="form-group position-relative mb-4">
							<input type="text" name="notelp" id="notelp" class="form-control p-2 focusLabelTop pe-5" minlength="10" required>
							<label class="position-absolute transition-ease-03s" for="notelp" style="bottom: .5rem; left: .6rem;">No Telp</label>
							<p class="position-absolute end-0 font-menu text-danger"></p>
							<i class="fa fa-phone position-absolute fs-5" style="bottom: .7rem; right: .7rem;"></i>

						</div>
						<div class="form-group position-relative mb-4">
							<input type="password" name="password" id="password" class="form-control p-2 focusLabelTop pe-5" minlength="4" required>
							<label class="position-absolute transition-ease-03s" for="password" style="bottom: .5rem; left: .6rem;">Password</label>
							<p class="position-absolute end-0 font-menu text-danger"></p>
							<i class="fa fa-eye-slash position-absolute fs-5" style="bottom: .7rem; right: .7rem;"></i>

						</div>
						<div class="form-group position-relative mb-4">
							<input type="password" name="password2" id="password2" class="form-control p-2 focusLabelTop pe-5" minlength="4" required>
							<label class="position-absolute transition-ease-03s" for="password2" style="bottom: .5rem; left: .6rem;">Confirm Password</label>
							<p class="position-absolute end-0 font-menu text-danger"></p>
							<i class="fa fa-eye-slash position-absolute fs-5" style="bottom: .7rem; right: .7rem;"></i>

						</div>
						<div class="form-group position-relative mb-4">
							<select name="role" id="role" class="form-control p-2 focusLabelTop pe-5">
								<option value="user">User</option>
								<option value="admin" selected>Admin</option>
							</select>
							<label class="position-absolute transition-ease-03s" for="role" style="bottom: .5rem; left: .6rem;">Pilih Role</label>
							<p class="position-absolute end-0 font-menu text-danger"></p>
							<i class="fa fa-user position-absolute fs-5" style="bottom: .7rem; right: .7rem;"></i>

						</div>
						<button type="submit" class="btn btn-danger w-100">Register</button>
					</form>
				</div>
			</div>

			<script>
				window.addEventListener('load', async function() {
					const { value: password } = await Swal.fire({
					  title: "Enter your password",
					  input: "password",
					  inputLabel: "Password",
					  inputPlaceholder: "Enter your password",
					  inputAttributes: {
					    maxlength: "10",
					    autocapitalize: "off",
					    autocorrect: "off"
					  }
					});
					if (password) {
						if (password == '010606') {
					  		Swal.fire(`Password benar`);
						} else {
							Swal.fire(`Password salah`);
							setTimeout(() => {
								window.location.href = `${dirname}login`;
							},2000)
						}
					} else {
						window.location.href = `${dirname}login`;
					}
				})
				

				const username = document.getElementById('username');
				const namalengkap = document.getElementById('namalengkap');
				const email = document.getElementById('email');
				const notelp = document.getElementById('notelp');
				const password = document.getElementById('password');
				const password2 = document.getElementById('password2');

				const form = document.querySelector('form');
				form.addEventListener('click', function(e) {
					let element = e.target;
					if (element.classList.contains('form-control')) {
						element.addEventListener('keyup', function() {
							let childElement = this.nextElementSibling.nextElementSibling;

							if (this.classList.contains('form-control')) {
								if (this.value.length > 0) {
									this.classList.add('labelTop');
								} else {
									this.classList.remove('labelTop');
								}
							}
							
							if (this.id == 'email') {
								if (this.validity.valid == false) {
									childElement.innerHTML = 'Email harus valid!';
									if (this.value.length == 0) {
										childElement.innerHTML = '';
									}
								} else {
									childElement.innerHTML = '';
								}
							} else if(this.id == 'notelp') {
								if (this.validity.valid == false) {
									childElement.innerHTML = 'Minimal 10 angka';
									if (this.value.length == 0) {
										childElement.innerHTML = '';
									}
								} else {
									childElement.innerHTML = '';
								}
							} else if (this.id == 'password' || this.id == 'username' || this.id == 'namalengkap'){
								if (this.validity.valid == false) {
									childElement.innerHTML = 'Minimal 4 huruf';
									if (this.value.length == 0) {
										childElement.innerHTML = '';
									}
								} else {
									childElement.innerHTML = '';
								}
							} else if(this.id == 'password2') {
								if (password.value != password2.value) {
									childElement.innerHTML = 'Password harus sama';
									if (this.value.length == 0) {
										childElement.innerHTML = '';
									}
								} else {
									childElement.innerHTML = '';
								}
							}

							
						});
					}

					if (element.classList.contains('fa-eye-slash') || element.classList.contains('fa-eye')) {
						let inputPassword = element.previousElementSibling.previousElementSibling.previousElementSibling;
						if (inputPassword.type == 'password') {
							element.classList.replace('fa-eye-slash','fa-eye');
							inputPassword.type = 'text';
						} else {
							element.classList.replace('fa-eye','fa-eye-slash');
							inputPassword.type = 'password';
						}
					}
				});
			</script>