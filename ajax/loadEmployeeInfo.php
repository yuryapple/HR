<?php
session_start();

    function __autoload ($class){
		require_once  ($class . '.php');
	}

    $idEmpl = trim($_REQUEST['idEmpl']);

    $employeesController = new employees();
    $employeeInfo =  $employeesController->getEmployeeInfoById($idEmpl);

    echo $employeeInfo;
?>
