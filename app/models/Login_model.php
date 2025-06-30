<?php 

class Login_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function login($data) {
		$username = htmlspecialchars(stripcslashes($data['username']));
		$password = htmlspecialchars(stripcslashes($data['password']));

		$dataUser = $this->getDataById('Username',$username);
		if ($dataUser == false) {
			Flasher::setFlash('<span class="poppins">Username/password anda salah!</span>', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME);
			exit();
		}

		// INIT ROOM CHAT
		if ($this->cekRoomInbox($dataUser) == false) {
			if ($this->initRoomInbox($dataUser) == false) {
				Flasher::setFlash('<span class="poppins">Login gagal!</span>', 'error');
				Flasher::alert1();
				header('location:'.Constant::DIRNAME);
				exit();
			}
		}
		
		if (!password_verify($password, $dataUser['Password'])) {
			Flasher::setFlash('<span class="poppins">Username/password anda salah!</span>', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME);
			exit();
		} else {
			if (isset($data['check'])) {
				setcookie('idUser',$dataUser['UserID'], time() + 60);
				setcookie('idValid',password_hash($dataUser['UserID'], PASSWORD_DEFAULT), time() + 60);
			}
			Flasher::setFlash('<span class="poppins">Login berhasil</span>', 'success');
			Flasher::alert1();
			$_SESSION['idUser'] = $dataUser['UserID'];
			$_SESSION['username'] = $dataUser['Username'];
			$_SESSION['role'] = $dataUser['Role'];
			header('location:'.Constant::DIRNAME);
			exit();
		}

	}

	public function getDataById($bind, $data) {
		$this->db->query("SELECT * FROM users WHERE $bind = :data");
		$this->db->bind('data', $data);
		$this->db->execute();
		return $this->db->single();

	}

	public function initRoomInbox($data) {
		$numberUniq = join($this->generateNumberUniq(1, 5, 10));
		$idRoom = "A4067{$numberUniq}";
		$idUser = $data['UserID'];
		var_dump($idRoom);

		$this->db->query('INSERT INTO room_inbox (RoomID, UserID) VALUES (:idRoom, :idUser)');
		$this->db->bind('idRoom', $idRoom);
		$this->db->bind('idUser', $idUser);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function cekRoomInbox($data) {
		$idUser = $data['UserID'];

		$this->db->query('SELECT * FROM room_inbox WHERE UserID = :idUser');
		$this->db->bind('idUser', $idUser);
		$this->db->execute();
		return $this->db->single();
	}

	public function generateNumberUniq($min, $max, $quantity) {
		$numbers = range($min, $max);
		shuffle($numbers);

		return array_slice($numbers, 0, $quantity);
	}
}