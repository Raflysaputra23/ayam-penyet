<?php 

class Akun extends Controller {

	public function index() {
		$data['user'] = $this->model('Home_model')->getDataById($_SESSION['idUser']);
		$data['judul'] = 'Akun';
		$this->view('templates/header', $data);
		$this->view('akun/index', $data);
		$this->view('templates/footer');

	}

	public function editData() {
		if ($this->model('Akun_model')->editData($_POST) > 0) {
			Flasher::setFlash('Data berhasil diubah', 'success');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'akun');
			exit();
		} else {
			Flasher::setFlash('Data gagal diubah', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'akun');
			exit();
		}
	}
}