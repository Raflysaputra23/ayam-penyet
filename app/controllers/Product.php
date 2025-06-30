<?php 

class Product extends Controller {
	
	public function index() {
		
		$data['totalHarga'] = $this->model('Product_model')->getTotalHarga($_SESSION['idUser']);
		$data['cart'] = $this->model('Product_model')->getShoppingCart($_SESSION['idUser']);
		$data['produk'] = $this->model('Product_model')->getProdukAll();
		$data['akses'] = Permission::akses();
		$data['judul'] = 'Product';

		$this->view('templates/header', $data);
		$this->view('product/index',$data);
		$this->view('templates/footer');
	}
	
	public function tambahProduk() {
		if ($this->model('Product_model')->tambahProduk($_POST) > 0) {
			Flasher::setFlash('<span class="poppins">Produk berhasil ditambahkan</span>', 'success');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		} else {
			Flasher::setFlash('<span class="poppins">Produk gagal ditambahkan</span>', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		}
	}

	public function getProdukByKategori() {
		$data = json_decode(file_get_contents('php://input'));
		echo json_encode($this->model('Product_model')->getProdukByKategori($data));

	}

	public function hapusProduk($id) {
		if ($this->model('Product_model')->hapusProduk($id) > 0) {
			Flasher::setFlash('Produk berhasil dihapus', 'success');
			Flasher::alert2();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		} else {
			Flasher::setFlash('Produk gagal dihapus', 'error');
			Flasher::alert2();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		}
	}

	public function editProduk($id) {
		if ($this->model('Product_model')->editProduk($_POST, $id) > 0) {
			Flasher::setFlash('Produk berhasil diedit', 'success');
			Flasher::alert2();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		} else {
			Flasher::setFlash('Produk gagal diedit', 'error');
			Flasher::alert2();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		}
	}

	public function getProdukAll() {
		echo json_encode($this->model('Product_model')->getProdukAll());
	}

	public function getProdukById() {
		$data = json_decode(file_get_contents('php://input'));
		echo json_encode($this->model('Product_model')->getProdukById($data));
	}

	public function getCart() {
		$data = json_decode(file_get_contents('php://input'));
		echo json_encode($this->model('Product_model')->setShoppingCart($data));
	}

	public function getTotalHarga() {
		$data = json_decode(file_get_contents('php://input'));
		echo json_encode($this->model('Product_model')->getTotalHarga($data));
	}

	public function plusCart() {
		$data = json_decode(file_get_contents('php://input'));
		echo json_encode($this->model('Product_model')->plusCart($data));
	}

	public function minusCart() {
		$data = json_decode(file_get_contents('php://input'));
		echo json_encode($this->model('Product_model')->minusCart($data));
	}

	public function setTranksaksi($idShopping, $idTranksaksi) {
		if ($this->model('Product_model')->setTranksaksi($idShopping, $idTranksaksi) > 0) {
			Flasher::setFlash('Tranksaksi Berhasil', 'success');
			Flasher::alert2();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		} else {
			Flasher::setFlash('Tranksaksi Gagal', 'error');
			Flasher::alert2();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		}
	}

	public function getProdukCart() {
		$data = json_decode(file_get_contents('php://input'));
		echo json_encode($this->model('Product_model')->getShoppingCart($data));
	}

	public function getDataUser() {
		// $data = json_decode(file_get_contents('php://input'));
		echo json_encode($this->model('Home_model')->getDataById($_SESSION['idUser']));
	}

	public function setStokProduk($idProduk, $stok) {
		if ($this->model('Product_model')->setStokProduk($idProduk, $stok) > 0) {
			Flasher::setFlash('Stok berhasil diubah', 'success');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		} else {
			Flasher::setFlash('Stok gagal diubah', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		}
	}

}