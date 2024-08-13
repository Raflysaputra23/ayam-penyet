<?php 

class Admin extends Controller {


	public function index() {
		// $data['akses'] = Permission::akses();
		$data['judul'] = 'Admin';

		$this->view('templates/header', $data);
		$this->view('admin/index', $data);
		$this->view('templates/footer');	
	}
	
}