<?php 

class History_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function getHistory($data) {
		$idUser = (is_object($data)) ? $data->idUser : $data;

		$this->db->query('SELECT * FROM riwayat_tranksaksi join tranksaksi join produk WHERE riwayat_tranksaksi.UserID = :idUser AND riwayat_tranksaksi.TranksaksiID = tranksaksi.TranksaksiID AND tranksaksi.ProductID = produk.ProductID');
		$this->db->bind('idUser', $idUser);
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function getIdTranksaksi($idUser) {
		$this->db->query('SELECT * FROM riwayat_tranksaksi WHERE UserID = :idUser ORDER BY HistoryID DESC');
		$this->db->bind('idUser', $idUser);
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function getHistoryByOrder($data) {
		$order = $data->order;
		$idUser = $data->idUser;

		$this->db->query("SELECT * FROM riwayat_tranksaksi WHERE UserID = :idUser ORDER BY HistoryID $order");
		$this->db->bind('idUser', $idUser);
		$this->db->execute();
		return $this->db->resultSet();
	}

}