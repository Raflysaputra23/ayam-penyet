<?php 

class Register_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function register($data) {
		$username = htmlspecialchars(stripcslashes($data['username']));
		$namalengkap = htmlspecialchars(stripcslashes($data['namalengkap']));
		$email = htmlspecialchars(stripcslashes($data['email']));
		$notelp = htmlspecialchars(stripcslashes($data['notelp']));
		$password = htmlspecialchars(stripcslashes($data['password']));
		$password2 = htmlspecialchars(stripcslashes($data['password2']));

		$dataUser = $this->getDataById('Username',$username);
		if ($dataUser == true) {
			Flasher::setFlash('<span class="poppins">Username sudah digunakan</span>', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'register');
			exit();
		}

		$cekemail = filter_var($email, FILTER_VALIDATE_EMAIL);
		$cekemail = $this->getDataById('Email', $email);
		if ($cekemail == true) {
			Flasher::setFlash('<span class="poppins">Email sudah terdaftar</span>', 'error');
			Flasher::alert1();
			header('location:'.Constant.'register');
			exit();
		}

		$cektelp = $this->getDataById('notelp', $notelp);
		if ($cektelp == true) {
			Flasher::setFlash('<span class="poppins">NoTelp sudah terdaftar</span>', 'error');
			Flasher::alert1();
			header('location:'.Constant.'register');
			exit();
		}

		if ($password != $password2) {
			Flasher::setFlash('<span class="poppins">Pastikan password keduanya sama</span>', 'error');
			Flasher::alert1();
			header('location:'.Constant::DIRNAME.'register');
			exit();
		}


		$password = password_hash($password, PASSWORD_DEFAULT);

		if (isset($data['role'])) {
			$role = $data['role'];
		} else {
			$role = 'user';
		}

		$this->db->query('INSERT INTO users(Username, NamaLengkap, Email, NoTelp, Password, Role) VALUES (:username, :namalengkap, :email, :notelp, :password, :role)');
		$this->db->bind('username', $username);
		$this->db->bind('namalengkap', $namalengkap);
		$this->db->bind('email', $email);
		$this->db->bind('notelp', $notelp);
		$this->db->bind('password', $password);
		$this->db->bind('role', $role);
		$this->db->execute();
		return $this->db->rowCount();

	}

	public function getDataById($bind, $data) {
		$this->db->query("SELECT * FROM users WHERE $bind = :data");
		$this->db->bind('data', $data);
		$this->db->execute();
		return $this->db->single();
	}
}