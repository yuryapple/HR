<div id="logoTable">
	List employees
</div>

<table id="tableEmpl">
	<tr>
		<th>Name</th>
		<th>Status</th>
		<th>Telephone</th>
		<th>E-Mail</th>
		<th>Depertment</th>
		<th>More</th>
	</tr>
	<?php
		foreach ($employeeLink as $val) {
			$strPrint = '<tr> ';
			$strPrint .= 	'<td style="display:none" >' . $val["idEmployee"] . '</td>';
			$strPrint .=	'<td>' . $val["name"] . '</td>';
			$strPrint .= 	'<td>' . $val["status"] . '</td>';
			$strPrint .= 	'<td>' . $val["numberOfTel"] . '</td>';
			$strPrint .= 	'<td>' . $val["eMail"] . '</td>';
			$strPrint .= 	'<td>' . $val["nameOfDep"] . '</td>';
			$strPrint .=  '<td> <button type="button" class="btn-edit-record">&#128466;</button> </td>';
			$strPrint .= '</tr>';
			echo $strPrint;
		}
	?>
</table>

<div id="footerTableEmpl">
	<button type="button" id="addNew">Add new</button>
	<?php
		$this->_myPaginator->show();
	?>
</div>

<div id="formEmpl" style="display:none"  >
	<p id="formIdEmpl"></p>
</div>
