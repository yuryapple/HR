<?php

class Sorter {

	private $_model, $_fields, $_pathForPage ;

	function __construct($model, $pathForPage) {
		$this->_model = $model;
		$this->_pathForPage = $pathForPage;
		$this->getFieldsName();
		$this->setFieldNameForOrderToSesion();
	}

	private function getFieldsName() {
		$this->_fields = Array();
		$listFields = $this->_model->getAllFieldsName();
		$this->_fields = $listFields;
	}


	 public function show()
	{
		$tableName =  $this->_model->getTableName();

		$strPrint  = '<label for="sel1">Order by :</label> ';
		$strPrint .= '<select class="form-control" id="sel1" onchange="location = this.value;" >';

		foreach ($this->_fields as $item)
		{
			if ($_SESSION[$tableName] == $item ) {
				$strPrint .= ' <option  selected value = "' .  $this->_pathForPage .    '1&orderBy=' . $item   . '">' .  $item . '</option>';
			} else {
				$strPrint .= ' <option  value = "' .  $this->_pathForPage .    '1&orderBy=' . $item   . '">' .  $item . '</option>';
			}

		}
		$strPrint .= ' </select>';
		echo $strPrint;
	}

	private function setFieldNameForOrderToSesion()
	{
		$tableName =  $this->_model->getTableName();

		if (!isset($_SESSION[$tableName])) {
			$_SESSION[$tableName] = $this->_fields[0];
		}
	}
}
?>