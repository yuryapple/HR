<?php
session_start();

    function __autoload ($class)
	{
		require_once  ($class . '.php');
	}

	$idEmployee = $idDepartment = $firstName = $lastName = $dateOfBirthday = $numberOfTel = $eMail = $status = $dateOfHire = $dateOfFire = "";


	$employeesController = new employees();
	$myModel = $employeesController->getModel();

	// Edit user
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		getDataFromPOST();

		if ($idEmployee) {
			updateEmployee();
		} else {
			addNewEmployee();
		}
	}


	function updateEmployee(){
		global  $idEmployee, $idDepartment, $firstName, $lastName, $dateOfBirthday, $numberOfTel, $eMail, $status, $dateOfHire, $dateOfFire;
		global $myModel;

		$result =  $myModel->updateEmployee ($idEmployee, $idDepartment, $firstName, $lastName,
									$dateOfBirthday, $numberOfTel, $eMail, $status, $dateOfHire, $dateOfFire);

		if ($result > 0) {
			$responseDB = array("1", "Employee was updated");
		} else {
			$responseDB = array("2", "Can't update!");
		}
		echo  json_encode($responseDB);
	}


	function addNewEmployee(){
		global  $idEmployee, $idDepartment, $firstName, $lastName, $dateOfBirthday, $numberOfTel, $eMail, $status, $dateOfHire, $dateOfFire;
		global $myModel;

		$result =  $myModel->addNewEmployee ($idDepartment, $firstName, $lastName,
									$dateOfBirthday, $numberOfTel, $eMail, $status, $dateOfHire, $dateOfFire);

		if ($result > 0) {
			$responseDB = array("1", "Employee was added");
		} else {
			$responseDB = array("2", "Can't add employee!");
		}
		echo json_encode($responseDB);
	}


	function getDataFromPOST() {
		global  $idEmployee, $idDepartment, $firstName, $lastName, $dateOfBirthday, $numberOfTel, $eMail, $status, $dateOfHire, $dateOfFire;

		 $idEmployee = prepareField($_POST["idEmployee"]);
		 $idDepartment = prepareField($_POST["idDepartment"]);
		 $firstName = prepareField($_POST["firstName"]);
		 $lastName = prepareField($_POST["lastName"]);
		 $dateOfBirthday = prepareField($_POST["dateOfBirthday"]);
		 $numberOfTel = prepareField($_POST["tel"]);
		 $eMail = prepareField($_POST["eMail"]);
		 $status = prepareField($_POST["status"]);
		 $dateOfHire = prepareField($_POST["dateOfHire"]);
		 $dateOfFire = prepareField($_POST["dateOfFire"]);
		 if ($dateOfFire == "") {
			$dateOfFire = "NULL";
		 }
	}

	function prepareField($field) {
		$field = trim($field);
		$field = stripslashes($field);
		$field = htmlspecialchars($field);
		return $field;
	}