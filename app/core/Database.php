<?php 

class Database {
	private $DBNAME = Constant::DBNAME,
			$DBHOST = Constant::DBHOST,
			$DBUSER = Constant::DBUSER,
			$DBPASS = "";

	private $DBH,
			$STMT;

	public function __construct() {
		$dsn = "mysql:host={$this->DBHOST};dbname={$this->DBNAME};";
		$options = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try {
			$this->DBH = new PDO($dsn, $this->DBUSER, $this->DBPASS, $options);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function __destruct() {
		$this->DBH = null;
	}

	public function query($query) {
		$this->STMT = $this->DBH->prepare($query);
	}

	public function bind($bind, $param, $type = null) {
		if ($type == null) {
			switch (true) {
				case is_int($param):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($param):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($param):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		$this->STMT->bindValue($bind, $param, $type);
		}
	}

	public function execute() {
		$this->STMT->execute();
	}

	public function single() {
		$this->execute();
		return $this->STMT->fetch(PDO::FETCH_ASSOC);
	}

	public function resultSet() {
		$this->execute();
		return $this->STMT->fetchAll(PDO::FETCH_ASSOC);
	}

	public function rowCount() {
		return $this->STMT->rowCount();
	}

	public function beginTransaction() {
		$this->DBH->beginTransaction();
	}

	public function commit() {
		$this->DBH->commit();
	}
	
	public function rollBack() {
		$this->DBH->rollBack();
	}
}