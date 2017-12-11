<?php

class Employees extends AbstractController implements InterfaceController {

	//Main	window
	 protected  $_myEmployeesModel, $_mydepertmentsModel,  $_totalEmployees, $_mySorter, $_mySeacher;

	//AJAX page for employees
     private static  $_pathForPage = '/Employees/showMainWindow/?page=';
	protected  $_currentPage, $_myPaginator;

	function __construct() {
		//Get initial param from config.txt
		ReadConfig::getInstance();
		$this->_perPage = ReadConfig::getValue ('per_page');

		$this->_myEmployeesModel = new employeesModel();
		$this->_mydepertmentsModel = new depertmentsModel();
		$this->setOrderBy();
		$this->setSeacherBy();


		$this->_mySorter = new Sorter($this->_myEmployeesModel, self::$_pathForPage);
		$this->_mySeacher = new Seacher($this->_myEmployeesModel, self::$_pathForPage);
		$this->totalEmployeesInBD();
	}

	public function showMainWindow() {
		$mc = FrontController::getInstance();
		ob_start();

		// Template of main window
	     include 'application/views/employeesMainView.php';
		$documentHTML = ob_get_clean();
		$mc->setBoby($documentHTML);
	}

	public function getModel() {
		return $this->_myEmployeesModel;
	}

	public function listEmployeesOnCurrentPage($currentPage = 1) {
		$this->_currentPage = $this->calculateCurrentPage ($currentPage, $this->_totalEmployees);
          $this->_myPaginator = new Paginator(self::$_pathForPage, $this->_currentPage, $this->_totalEmployees);

		$listEmployees = $this->_myEmployeesModel->getEmployeesOnCurrentPage($this->_currentPage);
		// Prepare array of links for users
		while ($row = mysqli_fetch_assoc($listEmployees)) {
			$key = $row["idEmployee"];
			$employeeLink["$key"]["idEmployee"]= $row["idEmployee"];
			$employeeLink["$key"]["name"]= $row["firstName"] . ' ' . $row["lastName"];
			$employeeLink["$key"]["numberOfTel"]= $row["telephone"];
			$employeeLink["$key"]["eMail"]= $row["eMail"];
			$employeeLink["$key"]["status"]= $row["status"];
			$employeeLink["$key"]["nameOfDep"]= $row["nameOfDep"];
		}

		ob_start();

		// Show result of work
		include 'application/views/employeesView.php';
		$documentHTML = ob_get_clean();

		return $documentHTML;
	}

	public function getEmployeeInfoById($idEmpl) {
		if ($idEmpl != "NEW_EMPL") {
			$emplInfo = $this->_myEmployeesModel->getEmployeeInform($idEmpl);
			$employeeInfo = mysqli_fetch_array($emplInfo, MYSQLI_ASSOC);
		} else {
			$employeeInfo = $this->prepareForNewEmpl();
		}

		$allDepartaments = $this->_mydepertmentsModel->totalDepartments();
		while ($row = mysqli_fetch_assoc($allDepartaments)) {
			$key = $row["idDepartment"];
			$departamentsList["$key"] = $row["nameOfDep"];
		}

		$employeeEnumStatus = $this->_myEmployeesModel->getAllEnumValue();

		ob_start();

		// Show result of work
		include 'application/views/employeeForm.php';
		$documentHTML = ob_get_clean();

		return $documentHTML;
	}

	public function suggestSubjects($str) {
		$find   = '(';
		$pos = strpos($str, $find);

		if ($pos === 0) {
			$listSuggested = $this->_myEmployeesModel->suggestNumberOfPhone($str);
		} else {
			$listSuggested = $this->_myEmployeesModel->suggestName($str);
		}

		//	$listSuggested has type -- mysqli_result OR int
		if (!is_int($listSuggested)) {
			while ($row = mysqli_fetch_array($listSuggested, MYSQLI_NUM)) {
				$arraySugges[] = implode (" " , $row);
			}
			$hint =	implode ("," , $arraySugges);
		} else {
			$hint = "no suggestion";
		}
		return $hint;
	}

	private function prepareForNewEmpl() {
		$listFields = $this->_myEmployeesModel->getAllFieldsName();
		$employeeInfo = array_flip($listFields);

		foreach ($employeeInfo as $key => $value) {
			$employeeInfo[$key] = "";
		}

		//Method  myEmployeesModel->getAllFieldsName don't retrieve KEY fields So we need add it
		$employeeInfo[idEmployee] = "";
		return $employeeInfo;
	}

	private function setOrderBy() {
		$order = trim($_REQUEST['orderBy']);
		if (!empty($order)){
			$tableName = $this->_myEmployeesModel->getTableName();
			$_SESSION[$tableName] = $order;
		}
	}

	private function setSeacherBy() {
		$search = trim($_REQUEST["searchBy"]);
		$searchOff= trim($_REQUEST["searchOff"]);
		if (!empty($search)){
			$search  = str_replace(" ", "','", $search);
			$_SESSION["SearchOn"] = $search;
		} elseif (!empty($searchOff))  {
			unset($_SESSION["SearchOn"]);
		}
	}

	private function totalEmployeesInBD() {
		// How many Employees in BD
		$allEmployees = $this->_myEmployeesModel->totalEmployees();
		$this->_totalEmployees = mysqli_num_rows($allEmployees);
	}
}
?>