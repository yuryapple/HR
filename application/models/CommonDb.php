<?php
class commonDb {
	private $con;
	private $databaseName;
	private $host;
	private $user;
	private $password;

	public function __construct() {
		ReadConfig::getInstance();
		$this->databaseName = ReadConfig::getValue ('dataBase');
		$this->host = ReadConfig::getValue ('host');
		$this->user = ReadConfig::getValue ('user');
		$this->password = ReadConfig::getValue ('password');


		$this->con = mysqli_connect($this->host, $this->user, $this->password, $this->databaseName);
	}

	protected function query($query) {

		return mysqli_query($this->con, $query);
	}


	protected function show($tableName, $whereCond = "") {
		$query = "SHOW FIELDS FROM " . $tableName;
		$query.= $whereCond;
		$result = $this->query($query);
		return $result;
	}

	protected function select($selectCond, $tableName, $whereCond, $orderField = 'notField', $groupField ='notField' , $limit = 'notNumber') {
		$query = "SELECT " . $selectCond;
		$query .= " FROM " . $tableName .  " WHERE ";
		$query.= $whereCond;

		if ($groupField != 'notField') {
			$query.= " GROUP BY $groupField";
		}

		if ($orderField != 'notField') {
			$query.= " ORDER BY $orderField";
		}

		if ($limit != 'notNumber') {
			$query.= " LIMIT $limit";
		}

		$result = $this->query($query); //result is (false or resourse)
		if (!$result) {
			return false;
		}
		elseif (mysqli_num_rows($result) == 0) {
			return 0;
		} else {
			return $result;
		}
	}

	protected function update ($tableName, $fields, $whereCond) {
		$query = "UPDATE " . $tableName .  " SET " ;
		$query.= $fields . ' WHERE ' . $whereCond;
		$this->query($query);
		return mysqli_affected_rows($this->con);
	}

	protected function delete ($tableName, $whereCond) {
		$query = "DELETE FROM " . $tableName ;
		$query.= " WHERE" . $whereCond;
		$this->query($query);
		return mysqli_affected_rows($this->con);
	}

	protected function insert ($tableName, $fields, $value) {
		$query = "INSERT INTO " . $tableName ;
		$query.=" (" . $fields . ") ";
		$query.= "VALUES (" . $value . ")";
		$this->query($query);
		return mysqli_affected_rows($this->con);
	}

	//id last add record
	protected function getId ()	{
		return mysqli_insert_id();
	}

	function __destruct() {
		if (is_resource($this->con)) {
			mysqli_close($this->con);
		}
	}

	// Prepare and use mysqli_real_escape_string
	function strForTable($value) {
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}

		if (!is_numeric($value) AND !($value == "NULL")) {
			$value = "'" . mysqli_real_escape_string($this->con, $value) . "'";
		}
		return $value;
	}

}
?>