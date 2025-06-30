<?php 

class Permission {
	public static function akses() {
		if (empty($_SESSION['idUser'])) {
			header('location:'.Constant::DIRNAME.'login');
			exit();
		} else if(isset($_COOKIE['idUser'])){
			if ($_COOKIE['idUser'] == $_COOKIE['idValid']) {
				$_SESSION['idUser'] = $_COOKIE['idUser'];
				header('location:'.Constant::DIRNAME);
				exit();
			}
		}
	}

	public static function akses2() {
		if (isset($_SESSION['idUser'])) {
			header('location:'.Constant::DIRNAME);
			exit();
		}
	}

	public static function izinUbahPassword() {
		if (empty($_SESSION['izinUbahPassword'])) {
			header('location:'.Constant::DIRNAME);
			exit();
		}
	}
}