<?php 

class Product_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function tambahProduk($data) {
		$namaproduk = $data['namaproduk'];
		$hargaproduk = $data['hargaproduk'];
		$kategoriproduk = $data['kategoriproduk'];
		$deskripsiproduk = $data['deskripsiproduk'];
		$gambarproduk = ($_FILES['gambarproduk']['error'] <= 0) ? $this->uploadGambar($_FILES['gambarproduk']) : 'logo.png';
		$Id = 1;

		$this->db->query('INSERT INTO produk(NamaProduk, HargaProduk, KategoriProduk, GambarProduk, DeskripsiProduk) VALUES (:namaproduk, :hargaproduk, :kategoriproduk, :gambarproduk, :deskripsiproduk)');
		$this->db->bind('namaproduk', $namaproduk);
		$this->db->bind('hargaproduk', $hargaproduk);
		$this->db->bind('kategoriproduk', $kategoriproduk);
		$this->db->bind('gambarproduk', $gambarproduk);
		$this->db->bind('deskripsiproduk', $deskripsiproduk);
		$this->db->execute();
		return $this->db->rowCount();

	}

	public function uploadGambar($data) {
		$namagambar = $data['name'];
		$sizegambar = $data['size'];
		$errorgambar = $data['error'];
		$tmpgambar = $data['tmp_name'];

		$extensivalid = ['jpg','jpeg','png'];
		$extensigambar = pathinfo($namagambar, PATHINFO_EXTENSION);

		if (!in_array($extensigambar, $extensivalid)) {
			Flasher::setFlash('<span class="poppins">Extensi gambar tidak valid</span>', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		}

		if ($sizegambar > 1000000) {
			Flasher::setFlash('<span class="poppins">Size gambar terlalu besar</span>', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		}

		$namagambarvalid = uniqid().'.'.$extensigambar;

		move_uploaded_file($tmpgambar, 'img/'.$namagambarvalid);
		return $namagambarvalid;
	}

	public function getProdukAll() {
		$this->db->query('SELECT * FROM produk');
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function getProdukByKategori($data) {
		$kategori = $data->kategori;

		$this->db->query('SELECT * FROM produk WHERE KategoriProduk = :kategori');
		$this->db->bind('kategori', $kategori);
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function getProdukById($data) {
		$idProduk = $data->idProduk;

		$this->db->query('SELECT * FROM produk WHERE ProductID = :idProduk');
		$this->db->bind('idProduk', $idProduk);
		$this->db->execute();
		return $this->db->single();
	}

	public function hapusProduk($data) {
		$idProduk = $data;

		try {
			$this->db->query('DELETE FROM produk WHERE ProductID = :idProduk');
			$this->db->bind('idProduk', $idProduk);
			$this->db->execute();
			return $this->db->rowCount();	
		} catch (Exception $e) {
			Flasher::setFlash('Barang tidak bisa dihapus user sedang memesan barang tersebut','error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'product');
			exit();
		}
		
	}

	public function editProduk($data, $idProduk) {
		$namaproduk = $data['namaproduk'];
		$hargaproduk = $data['hargaproduk'];
		$kategoriproduk = $data['kategoriproduk'];
		$jumlahproduk = $data['jumlahproduk'];
		$deskripsiproduk = $data['deskripsiproduk'];
		$gambarproduk = $data['gambarlama'];

		if ($_FILES['gambarproduk']['error'] == 0) {
			$gambarproduk = $this->uploadGambar($_FILES['gambarproduk']);
		}

		$this->db->query('UPDATE produk SET NamaProduk = :namaproduk, HargaProduk = :hargaproduk, KategoriProduk = :kategoriproduk, JumlahProduk = :jumlahproduk, GambarProduk = :gambarproduk, DeskripsiProduk = :deskripsiproduk WHERE ProductID = :idProduk');
		$this->db->bind('namaproduk', $namaproduk);
		$this->db->bind('hargaproduk', $hargaproduk);
		$this->db->bind('kategoriproduk', $kategoriproduk);
		$this->db->bind('jumlahproduk', $jumlahproduk);
		$this->db->bind('gambarproduk', $gambarproduk);
		$this->db->bind('deskripsiproduk', $deskripsiproduk);
		$this->db->bind('idProduk', $idProduk);
		$this->db->execute();
		return $this->db->rowCount();


	}

	public function setShoppingCart($data) {
		$idUser = $data->idUser;
		$idProduk = $data->idProduk;
		$hargaProduk = $data->hargaProduk;
		$quantity = 1;
		$idShopping = $this->generateShoppingCart($idUser);
		$dataProduk = $this->cekShoppingCart($idProduk, $idShopping);
		
		if ($dataProduk != false) {
			$quantity += $dataProduk['quantity'];
			$hargaProduk += $dataProduk['TotalHarga'];

			$this->db->query('UPDATE shopping_cart SET quantity = :quantity, TotalHarga = :hargaProduk WHERE ProductID = :idProduk AND ShoppingID = :idShopping');
			$this->db->bind('quantity', $quantity);
			$this->db->bind('hargaProduk', $hargaProduk);
			$this->db->bind('idProduk', $idProduk);
			$this->db->bind('idShopping', $idShopping);
			$this->db->execute();
		} else {
			$this->db->query('INSERT INTO shopping_cart (ShoppingID, UserID, ProductID, TotalHarga, quantity) VALUES (:idShopping, :idUser, :idProduk, :hargaProduk, :quantity)');
			$this->db->bind('idShopping', $idShopping);
			$this->db->bind('idUser', $idUser);
			$this->db->bind('idProduk', $idProduk);
			$this->db->bind('hargaProduk', $hargaProduk);
			$this->db->bind('quantity', $quantity);
			$this->db->execute();
		}

		return $this->getShoppingCart($data);

	}

	public function cekShoppingCart($idProduk, $idShopping) {
		
		$this->db->query('SELECT * FROM shopping_cart WHERE ShoppingID = :idShopping AND ProductID = :idProduk');
		$this->db->bind('idShopping', $idShopping);
		$this->db->bind('idProduk', $idProduk);
		$this->db->execute();
		return $this->db->single();
	}

	public function getShoppingCart($data) {
		$idShopping = (is_object($data)) ? $this->generateShoppingCart($data->idUser) : $this->generateShoppingCart($data);
		
		$this->db->query('SELECT * FROM shopping_cart join produk WHERE ShoppingID = :idShopping AND shopping_cart.ProductID = produk.ProductID');
		$this->db->bind('idShopping', $idShopping);
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function getTotalHarga($data) {
		$idShopping = (is_object($data)) ? $this->generateShoppingCart($data->idUser) : $this->generateShoppingCart($data);

		$this->db->query('SELECT SUM(TotalHarga) as total FROM shopping_cart WHERE ShoppingID = :idShopping');
		$this->db->bind('idShopping', $idShopping);
		$this->db->execute();
		return $this->db->single();
	}

	public function generateShoppingCart($id) {
		return join(range('A', 'D')).'S'.$id;
	}

	public function minusCart($data) {
		$idProduk = $data->idProduk;
		$idShopping = $data->idShopping;
		$quantity = $data->quantity;
		if ($quantity == 1) {
			$this->db->query('DELETE FROM shopping_cart WHERE ProductID = :idProduk AND ShoppingID = :idShopping');
			$this->db->bind('idProduk', $idProduk);
			$this->db->bind('idShopping', $idShopping);
			$this->db->execute();
			return $this->getShoppingCart($data);
		}
		$hargaProduk = $data->hargaProduk;
		$quantity--;
		$hargaProduk -= $this->getProdukById($data)['HargaProduk'];

		$this->db->query('UPDATE shopping_cart SET quantity = :quantity, TotalHarga = :hargaProduk WHERE ProductID = :idProduk AND ShoppingID = :idShopping');
		$this->db->bind('quantity', $quantity);
		$this->db->bind('hargaProduk', $hargaProduk);
		$this->db->bind('idProduk', $idProduk);
		$this->db->bind('idShopping', $idShopping);
		$this->db->execute();

		return $this->getShoppingCart($data);

	}

	public function plusCart($data) {
		$idProduk = $data->idProduk;
		$idShopping = $data->idShopping;
		$quantity = $data->quantity;
		$hargaProduk = $data->hargaProduk;
		$quantity++;
		$hargaProduk += $this->getProdukById($data)['HargaProduk'];

		$this->db->query('UPDATE shopping_cart SET quantity = :quantity, TotalHarga = :hargaProduk WHERE ProductID = :idProduk AND ShoppingID = :idShopping');
		$this->db->bind('quantity', $quantity);
		$this->db->bind('hargaProduk', $hargaProduk);
		$this->db->bind('idProduk', $idProduk);
		$this->db->bind('idShopping', $idShopping);
		$this->db->execute();

		return $this->getShoppingCart($data);
	}

	public function setTranksaksi($idShopping, $idTranksaksi) {
		$dataProduk = $this->getShoppingCart($_SESSION['idUser']);
		$totalHarga = $this->getTotalHarga($_SESSION['idUser']);

		foreach ($dataProduk as $data) {
			$this->db->query('SELECT * FROM produk WHERE ProductID = :idProduk');
			$this->db->bind('idProduk', $data['ProductID']);
			$this->db->execute();
			 if ($this->db->resultSet()) {
			 	// code...
			 }
		}

		try {
			$this->db->beginTransaction();

			foreach ($dataProduk as $data) {
				$this->db->query('INSERT INTO tranksaksi (TranksaksiID, UserID, ProductID, TotalHarga, quantity) VALUES (:idTranksaksi, :idUser, :idProduk, :totalHarga, :quantity)');
				$this->db->bind('idTranksaksi', $idTranksaksi);
				$this->db->bind('idUser', $data['UserID']);
				$this->db->bind('idProduk', $data['ProductID']);
				$this->db->bind('totalHarga', $data['TotalHarga']);
				$this->db->bind('quantity', $data['quantity']);
				$this->db->execute();
			}

			$this->db->query('INSERT INTO riwayat_tranksaksi (TranksaksiID, UserID, TotalHarga) VALUES (:idTranksaksi, :idUser, :totalHarga)');
			$this->db->bind('idTranksaksi', $idTranksaksi);
			$this->db->bind('idUser', $_SESSION['idUser']);
			$this->db->bind('totalHarga', $totalHarga['total']);
			$this->db->execute();

			$this->db->query('DELETE FROM shopping_cart WHERE ShoppingID = :idShopping');
			$this->db->bind('idShopping', $idShopping);
			$this->db->execute();

			$this->db->commit();
			return $this->db->rowCount();
		} catch (Exception $e) {
			$this->db->rollBack();
		}
		
	}	

	public function setStokProduk($idProduk, $stok) {
		$idStok = ($stok == 1) ? 'ada' : 'habis';

		$this->db->query('UPDATE produk SET StokProduk = :stokProduk WHERE ProductID = :idProduk');
		$this->db->bind('stokProduk', $idStok);
		$this->db->bind('idProduk', $idProduk);

		$this->db->execute();

		return $this->db->rowCount();
	}
	
}