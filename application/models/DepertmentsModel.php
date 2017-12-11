<?php
class depertmentsModel extends commonDb {
	private $_perPage;
	private static $_tableName = 'Departments';

	function __construct() {
		parent::__construct();
	}

    public function getTableName() {
		return self::$_tableName;
	}

	public function totalDepartments() {
		$selectCond = '*';
		$_tablesJoin =  self::$_tableName;
		$whereCond = '1';
		$totalDepartments = $this->select($selectCond ,$_tablesJoin , $whereCond);
		return $totalDepartments;
	}
}
?>