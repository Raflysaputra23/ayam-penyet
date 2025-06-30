<?php 

class Settings extends Controller {
	public function index() {

		$data['judul'] = 'Settings';
		$this->view('templates/header', $data);
		$this->view('settings/index', $data);
		$this->view('templates/footer');

	}

	public function ubahPassword() {
		$data['izinAkses'] = Permission::izinUbahPassword();
		$data['judul'] = 'Ubah Password';
		$this->view('templates/header', $data);
		$this->view('settings/ubahPassword', $data);
		$this->view('templates/footer');
	}

	public function validasiPassword() {
		$this->model('Settings_model')->validasiPassword($_POST);
	}

	public function changePassword() {
		if ($this->model('Settings_model')->changePassword($_POST) > 0) {
			unset($_SESSION['izinUbahPassword']);
			Flasher::setFlash('Password berhasil diganti', 'success');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'settings');
			exit();
		} else {
			Flasher::setFlash('Password sudah digunakan', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'settings');
			exit();
		}
	}
}