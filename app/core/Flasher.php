<?php 

class Flasher {
	public static function setFlash($pesan, $type) {
		$_SESSION['flash'] = [
			'pesan' => $pesan,
			'type' => $type
		];
	}

	public static function alert1() {
		if (isset($_SESSION['flash'])) {
			$_SESSION['alert'] = "
			<script>
				const Toast = Swal.mixin({
				  toast: true,
				  position: 'top-end',
				  showConfirmButton: false,
				  timer: 3000,
				  timerProgressBar: true,
				  didOpen: (toast) => {
				    toast.onmouseenter = Swal.stopTimer;
				    toast.onmouseleave = Swal.resumeTimer;
				  }
				});
				Toast.fire({
				  icon: '{$_SESSION['flash']['type']}',
				  title: '{$_SESSION['flash']['pesan']}'
				});
			</script>
			";
		}
	}

	public static function alert2() {
		if (isset($_SESSION['flash'])) {
			$_SESSION['alert'] = "
			<script>
				Swal.fire({
					title: '".ucfirst($_SESSION['flash']['type'])."',
					text: '{$_SESSION['flash']['pesan']}',
					icon: '{$_SESSION['flash']['type']}'
				});  	
			</script>
			";
		}
	}

	public static function getFlash() {
		if (isset($_SESSION['flash'])) {
			echo $_SESSION['alert'];
			unset($_SESSION['flash']);
			unset($_SESSION['alert']);
		}
	}
}