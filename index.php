<?php
session_start();

function __autoload ($class) {
	require_once ($class.'.php');
}

	$front = FrontController::getInstance();
	$front->route();
	echo $front->getBody();
?>