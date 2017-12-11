<?php

class Seacher {

	private $_model, $_pathForPage ;

	function __construct($model, $pathForPage) {
		$this->_model = $model;
		$this->_pathForPage = $pathForPage;
	}

	 public function show() {

		$strPrint  = '<label>Search by :</label> ';

		$mianPath = '"' . $this->_pathForPage . "1&searchBy=" . '"';
		$action = "onselect='";
		$action .= 'document.getElementById("lockButton").setAttribute("class", "lockButton-on"); location = ';
		$action .= "{$mianPath} + this.value;'";

		$strPrint .= '<input list="suggetInput" name="suggetInput"';
		$strPrint .= $action .'>';

		//suggestion values
		$strPrint .= '<datalist id="suggetInput">';
		$strPrint .= '<option value="no suggestion">';
		$strPrint .= '</datalist>';

		$mianPath = '"' . $this->_pathForPage . "1&searchOff=1" . '"';
		$action = "onclick='location = {$mianPath};'";
		$strPrint .= '<button id="lockButton"';
		if (isset($_SESSION["SearchOn"])) {
			$strPrint .= $action .' class="lockButton-on" >';
		} else {
			$strPrint .= $action .' class="lockButton-off" >';
		}


		$strPrint .= '&#128272;</button>';

		echo $strPrint;
	}
}
?>