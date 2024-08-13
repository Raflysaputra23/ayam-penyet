<?php 

class Login extends Controller {
	
	public function index() {

		$data['akses'] = Permission::akses2();
		$data['judul'] = 'Login';

		$this->view('templates/header', $data);
		$this->view('login/index');
		$this->view('templates/footer');
	}

	public function masuk() {
		if ($this->model('Login_model')->login($_POST) <= 0) {
			Flasher::setFlash('<span class="poppins">Username/password anda salah!</span>', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'login');
			exit();
		}
	}
	
}