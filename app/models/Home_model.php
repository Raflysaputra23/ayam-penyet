<?php 

class Home_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function getDataById($id) {
		$this->db->query('SELECT * FROM users WHERE UserID = :idUser');
		$this->db->bind('idUser', $id);
		$this->db->execute();
		return $this->db->single();
	}
}