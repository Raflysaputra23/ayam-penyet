<?php 


class Inbox extends Controller {

	public function index() {
		
		$data['inbox'] = $this->model('Inbox_model')->tampilInbox($_SESSION['idUser']);
		$data['informasi'] = $this->model('Inbox_model')->tampilInformasi();
		$data['akses'] = Permission::akses();
		$data['judul'] = 'Inbox';
		$this->view('templates/header',$data);
		$this->view('inbox/index',$data);
		$this->view('templates/footer');

	}

	public function tambahInbox() {
		$data = json_decode(file_get_contents('php://input'));
		echo json_encode($this->model('Inbox_model')->tambahInbox($data));
	}

	public function tampilInbox() {
		$data = json_decode(file_get_contents('php://input'));
		echo json_encode($this->model('Inbox_model')->tampilInbox($data));
	}

	public function informasi() {
		if ($this->model('Inbox_model')->setInformasi($_POST) > 0) {
			Flasher::setFlash('Pesan berhasil ditambahkan','success');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'inbox');
			exit;
		} else {
			Flasher::setFlash('Pesan gagal ditambahkan','error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'inbox');
			exit;
		}
	}

	public function hapusInformasi($idInformasi) {
		if ($this->model('Inbox_model')->hapusInformasi($idInformasi) > 0) {
			Flasher::setFlash('Informasi berhasil dihapus','success');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'inbox');
			exit;
		} else {
			Flasher::setFlash('Informasi gagal dihapus','error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'inbox');
			exit;
		}
	}
}