<?php 

class Register extends Controller {
	
	public function index() {

		$data['akses'] = Permission::akses2();
		$data['judul'] = 'Register';

		$this->view('templates/header', $data);
		$this->view('register/index');
		$this->view('templates/footer');
	}

	public function daftar() {
		if ($this->model('Register_model')->register($_POST) > 0) {
			Flasher::setFlash('<span class="poppins">Register berhasil</span>', 'success');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'login');
			exit();
		} else {
			Flasher::setFlash('<span class="poppins">Register gagal</span>', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'register');
			exit();
		}
	}
	
}