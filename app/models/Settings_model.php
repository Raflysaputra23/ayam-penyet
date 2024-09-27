<?php 

class Settings_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function validasiPassword($data) {
		$password = stripcslashes(htmlspecialchars($data['passwordLama']));
		$idUser = $_SESSION['idUser'];

		$this->db->query('SELECT * FROM users WHERE UserID = :idUser');
		$this->db->bind('idUser', $idUser);
		$this->db->execute();
		
		if (password_verify($password, $this->db->single()['Password'])) {
			$_SESSION['izinUbahPassword'] = 'true';
			header('location:'.Constant::DIRNAME.'settings/ubahPassword');
			exit();
		} else {
			Flasher::setFlash('Password salah', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'settings');
			exit();
		}
	}

	public function changePassword($data) {
		$password = stripcslashes(htmlspecialchars($data['password']));
		$password2 = stripcslashes(htmlspecialchars($data['password2']));
		$idUser = $_SESSION['idUser'];

		if ($password != $password2) {
			Flasher::setFlash('Pastikan password harus sama', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'settings/ubahPassword');
			exit();
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		$this->db->query('UPDATE users SET Password = :password WHERE UserID = :idUser');
		$this->db->bind('password', $password);
		$this->db->bind('idUser', $idUser);
		$this->db->execute();
		return $this->db->rowCount();
	}

}