<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="/image/favicon.ico">
		<link rel="stylesheet" type="text/css" href="/styles/listEmpl.css">
		<title>Employees</title>
	</head>

	<body>
		<!-- Show header of page -->
		<div class = "page-header">

			<!-- Total user in BD -->
			<div id="totalRecords">
				Total employees
				<?php
					echo  $this->_totalEmployees;
				?>
			</div>

			<!--Show sorter -->
			<div id = "sorterBar">
				<?php
					$this->_mySorter->show();
				 ?>
			</div>

			<!--Show seacher -->
			<div id = "seacherBar">
				<?php
					$this->_mySeacher->show();
				?>
			</div>
		</div>

		<div id="employeesPage">
				<!--AJAX load curren page of employees -->
		</div>

		<script type="text/javascript" src="/javaScript/employeesPage.js"></script>

  </body>
</html>