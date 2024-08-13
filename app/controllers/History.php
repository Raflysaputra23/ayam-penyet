<?php 

class History extends Controller {

	public function index() {

		$data['history'] = $this->model('History_model')->getHistory($_SESSION['idUser']);
		$data['idTranksaksi'] = $this->model('History_model')->getIdTranksaksi($_SESSION['idUser']);
		$data['akses'] = Permission::akses();
		$data['judul'] = 'History';
		$this->view('templates/header',$data);
		$this->view('history/index', $data);
		$this->view('templates/footer');

	}

	public function getHistoryByOrder() {
		$data = json_decode(file_get_contents('php://input'));
		echo json_encode($this->model('History_model')->getHistoryByOrder($data));
	}

	public function getHistory() {
		$data = json_decode(file_get_contents('php://input'));
		echo json_encode($this->model('History_model')->getHistory($data));
	}
}