<?php 


class Inbox extends Controller {

	public function index() {
		
		$data['inbox'] = $this->model('Inbox_model')->tampilInbox($_SESSION['idUser']);
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
}