<?php 

class Home extends Controller {
	
	public function index() {
		$data['akses'] = Permission::akses();
		$data['user'] = $this->model('Home_model')->getDataById($_SESSION['idUser']);
		$data['judul'] = 'Home';
		$data['produk'] = $this->model('Product_model')->getProdukAll();
		$data['cart'] = $this->model('Product_model')->getShoppingCart($_SESSION['idUser']);
		$data['history'] = $this->model('History_model')->getIdTranksaksi($_SESSION['idUser']);

		$this->view('templates/header', $data);
		$this->view('home/index',$data);
		$this->view('templates/footer');
	}

	public function logout() {
		session_start();
		session_destroy();
		session_unset();
		unset($_SESSION);
		if (isset($_COOKIE)) {
			setcookie('idUser','',time() - 60, '/');
			setcookie('idValid','',time() - 60, '/');
		}
		header('location:'.Constant::DIRNAME.'login');
		exit();
	}
	
}