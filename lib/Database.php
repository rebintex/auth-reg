<?php 

class Database {
	private $host = DB_HOST;
	private $user = DB_USER;
	private $password = DB_PASSWORD;
	private $dbname = DB_NAME;

	private $db_handler;
	private $error;
	private $statement;

	public function __construct() {
		//set DSN
		$dsn = 'mysql:host='. $this->host .'; dbname='. $this->dbname;
		// Set options

		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

		);
		try {
			$this->db_handler = new PDO($dsn, $this->user, $this->password, $options);

		} catch(PDOException $e) {
			$this->error = $e->getMessage();

		}
	}

	public function query($query) {
		$this->statement = $this->db_handler->prepare($query);
	}

	public function bind($param, $value, $type=null) {
		if(is_null($type)){
			switch(true):
				case is_int($value) :
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value) :
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value) :
					$type = PDO::PARAM_NULL;
					break;
				default :  
					$type = PDO::PARAM_STR;

		endswitch; 
		}
		$this->statement->bindValue($param, $value, $type);
	}

	public function execute(){
		$this->statement->execute();
	}
	public function resultSet(){
		$this->execute();
		return $this->statement->fetchAll(PDO::FETCH_OBJ);
	}	
	public function single(){
		$this->execute();
		return $this->statement->fetch(PDO::FETCH_OBJ);
	}	
}



 ?>