<?php
class employeesModel extends commonDb {
	private $_perPage;
	private static $_tableName = 'Employees';

	function __construct() {
		parent::__construct();
	 	ReadConfig::getInstance();
		$this->_perPage = ReadConfig::getValue ('per_page');
	}

    public function getTableName() {
		return self::$_tableName;
	}

	public function getEmployeesOnCurrentPage($page = 1, $whereCond = '1') {
		$selectCond = 'L.* , R.nameOfDep';
		$_tablesJoin =  self::$_tableName  . " AS L LEFT JOIN  Departments AS R ON  L.idDepartment = R.idDepartment ";

	    $numberOfFirstRecorOnCurrentPage = (($page - 1) * $this->_perPage);
		if (isset($_SESSION["SearchOn"])) {
			$whereCond = "(`firstName` IN ('{$_SESSION["SearchOn"]}') AND `lastName` IN ('{$_SESSION["SearchOn"]}'))	OR
						  (`telephone` IN ('{$_SESSION["SearchOn"]}') AND `lastName` IN ('{$_SESSION["SearchOn"]}'))";
		}


		$orderField =  (isset($_SESSION[self::$_tableName])) ? $_SESSION[self::$_tableName] : "";
		$groupField = "notField";
		$limit = " " . $numberOfFirstRecorOnCurrentPage . " , " . $this->_perPage;

		$allEmployeesOnCurrentPage = $this->select($selectCond, $_tablesJoin, $whereCond, $orderField ,$groupField , $limit );
		return $allEmployeesOnCurrentPage;
	}

	public function getEmployeeInform ($idEmployee) {
		$selectCond = '*';
		$_tablesJoin =  self::$_tableName;
		$whereCond = 'idEmployee = ' . $idEmployee ;
		$employeeInform = $this->select($selectCond ,$_tablesJoin , $whereCond);
		return $employeeInform;
	}


	public function updateEmployee ($idEmployee, $idDepartment, $firstName, $lastName,
									$dateOfBirthday, $numberOfTel, $eMail, $status, $dateOfHire, $dateOfFire) {
		$fields = "idDepartment = {$this->strForTable($idDepartment)}, firstName = {$this->strForTable($firstName)},
					lastName = {$this->strForTable($lastName)}, dateOfBirthday =  {$this->strForTable($dateOfBirthday)},
					telephone = {$this->strForTable($numberOfTel)}, eMail = {$this->strForTable($eMail)},
					status = {$this->strForTable($status)}, dateOfHire = {$this->strForTable($dateOfHire)},
					dateOfFire =  {$this->strForTable($dateOfFire)}";
		$whereCond = 'idEmployee = ' . $idEmployee ;
		$numUpdateRecords = $this->update(self::$_tableName, $fields, $whereCond );
		return $numUpdateRecords;
	}

	public function  addNewEmployee($idDepartment, $firstName, $lastName,
									$dateOfBirthday, $numberOfTel, $eMail, $status, $dateOfHire, $dateOfFire) {
		$fields = "idDepartment, firstName, lastName, dateOfBirthday, telephone, eMail, status, dateOfHire,  dateOfFire";

		 $value = "{$this->strForTable($idDepartment)}, {$this->strForTable($firstName)},
					{$this->strForTable($lastName)},  {$this->strForTable($dateOfBirthday)},
					{$this->strForTable($numberOfTel)}, {$this->strForTable($eMail)},
					{$this->strForTable($status)},  {$this->strForTable($dateOfHire)},
					 {$this->strForTable($dateOfFire)}";

		$res = $this->insert(self::$_tableName, $fields, $value);
		return $res;
	}

	public function totalEmployees() {
		$selectCond = '*';
		$_tablesJoin =  self::$_tableName;
		$whereCond = '1';
		if (isset($_SESSION["SearchOn"])) {
			$whereCond = "(`firstName` IN ('{$_SESSION["SearchOn"]}') AND `lastName` IN ('{$_SESSION["SearchOn"]}'))	OR
						  (`telephone` IN ('{$_SESSION["SearchOn"]}') AND `lastName` IN ('{$_SESSION["SearchOn"]}'))";
		}

		$totalEmployees = $this->select($selectCond ,$_tablesJoin , $whereCond);
		return $totalEmployees;
	}

	public function suggestName($str) {
		$selectCond = " firstName , lastName ";
		$_tablesJoin =  self::$_tableName;
		$whereCond = " (firstName LIKE '{$str}%') OR (lastName LIKE '{$str}%')";
		$suggestSubjects = $this->select($selectCond ,$_tablesJoin , $whereCond);
		return $suggestSubjects;
	}


	public function suggestNumberOfPhone($str) {
		$selectCond = "telephone , lastName ";
		$_tablesJoin =  self::$_tableName;
		$whereCond = " telephone LIKE '{$str}%' ";

		$suggestSubjects = $this->select($selectCond ,$_tablesJoin , $whereCond);
		return $suggestSubjects;
	}


	public function getAllFieldsName() {
		$listOfFieldsTable  =  $this->show(self::$_tableName);

		$fields = Array();

		while ($row = mysqli_fetch_assoc($listOfFieldsTable)) {
			if ($row["Key"]  != "PRI") {
		   	$fields[] = $row["Field"];
		   }
		}

		return $fields;
	}

	public function getAllEnumValue() {
		$whereCond = ' WHERE Field = "status"';
		$listOfFieldsTable  =  $this->show(self::$_tableName, $whereCond);

		$row = mysqli_fetch_assoc($listOfFieldsTable);

		$type = $row["Type"];
		preg_match("/enum\('(.*)'\)$/", $type, $matches);

		// Incorect array (start from index 0)
		$statusEmpl = explode("','", $matches[1]);

		// Corect array (start from index 1)
		array_unshift($statusEmpl, "Enum start from index1");
		unset($statusEmpl[0]);

		return $statusEmpl;
	}

}

?>