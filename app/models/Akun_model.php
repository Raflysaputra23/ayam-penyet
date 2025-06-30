<?php 

class Akun_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function editData($data) {
		$username = stripcslashes(htmlspecialchars($data['username']));
		$namalengkap = stripcslashes(htmlspecialchars($data['namalengkap']));
		$email = stripcslashes(htmlspecialchars($data['email']));
		$notelp = stripcslashes(htmlspecialchars($data['notelp']));
		$idUser = $_SESSION['idUser'];


		try {
			$this->db->query('UPDATE users SET Username = :username, NamaLengkap = :namalengkap, Email = :email, NoTelp = :notelp WHERE UserID = :idUser');
			$this->db->bind('username', $username);
			$this->db->bind('namalengkap', $namalengkap);
			$this->db->bind('email', $email);
			$this->db->bind('notelp', $notelp);
			$this->db->bind('idUser', $idUser);
			$this->db->execute();
			return $this->db->rowCount();	
		} catch (Exception $e) {
			Flasher::setFlash("Data sudah terdaftar","error");
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'akun');
			exit();
		}
		

	}

	public function getDataUser($key, $value) {
		$this->db->query("SELECT * FROM users WHERE $key  = :value");
		$this->db->bind('value', $value);
		$this->db->execute();
		return $this->db->single();
	}
}