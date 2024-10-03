<?php 

class Inbox_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function tambahInbox($data) {
		$idRoom = $this->getRoomInbox($data->idUser)['RoomID'];
		$idUser = $data->idUser;
		$pesan = $data->pesan;

		$this->db->query('INSERT INTO inbox (InboxID, SenderID, Pesan) VALUES (:idRoom, :idUser, :pesan)');
		$this->db->bind('idRoom', $idRoom);
		$this->db->bind('idUser', $idUser);
		$this->db->bind('pesan', $pesan);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function tampilInbox($data) {
		if (is_object($data)) {
			$idRoom = $this->getRoomInbox($data->idUser)['RoomID'];
		} else {
			$idRoom = $this->getRoomInbox($data)['RoomID'];
		}
		

		$this->db->query('SELECT * FROM inbox join users WHERE InboxID = :idRoom AND SenderID = users.UserID');
		$this->db->bind('idRoom', $idRoom);
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function getRoomInbox($idUser) {
		$this->db->query('SELECT * FROM room_inbox WHERE UserID = :idUser');
		$this->db->bind('idUser', $idUser);
		$this->db->execute();
		return $this->db->single();
	}

	public function setInformasi($data) {
		$idUser = $_SESSION['idUser'];
		$pesan = $data["pesan"];

		$this->db->query('INSERT INTO informasi(SenderID, pesan) VALUES (:idUser, :pesan)');
		$this->db->bind('idUser', $idUser);
		$this->db->bind('pesan', $pesan);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function tampilInformasi() {
		$this->db->query('SELECT * FROM informasi join users WHERE informasi.SenderID = users.UserID');
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function hapusInformasi($idInformasi) {
		$this->db->query('DELETE FROM informasi WHERE InformasiID = :idInformasi');
		$this->db->bind('idInformasi',$idInformasi);
		$this->db->execute();
		return $this->db->rowCount();
	}
}