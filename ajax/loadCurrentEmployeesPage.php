<?php
session_start();

    function __autoload ($class){
		require_once  ($class . '.php');
	}

    $page = trim($_REQUEST['page']);

    $employeesController = new employees();
    $bodyPage =  $employeesController->listEmployeesOnCurrentPage($page);

    echo $bodyPage;
?>