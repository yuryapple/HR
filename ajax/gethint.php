<?php
session_start();

    function __autoload ($class){
		require_once  ($class . '.php');
	}

    $str = trim($_REQUEST['str']);

	$str = changeString($str);

    $employeesController = new employees();
    $suggestSubjects =  $employeesController->suggestSubjects($str);

    echo $suggestSubjects;




	function changeString ($str) {
		if (is_numeric($str)) {
			$length =  strlen($str);

	        switch ($length) {
				case 1:
				case 2:
				case 3:
					$pattern = "/(\d{1,3})/i";
					$replacement = "(\$1";
					$numberOfTel = preg_replace($pattern, $replacement, $str);
                    break;
                case 4:
				case 5:
				case 6:
					$pattern = "/(\d{3})(\d{1,3})/i";
					$replacement = "(\$1)\$2";
					$numberOfTel = preg_replace($pattern, $replacement, $str);
                    break;
                case 7:
				case 8:
					$pattern = "/(\d{3})(\d{3})(\d{1,2})/i";
					$replacement = "(\$1)\$2-\$3";
					$numberOfTel = preg_replace($pattern, $replacement, $str);
                    break;
                case 9:
				case 10:
					$pattern = "/(\d{3})(\d{3})(\d{2})(\d{1,2})/i";
					$replacement = "(\$1)\$2-\$3-\$4";
					$numberOfTel = preg_replace($pattern, $replacement, $str);
                   break;
               }
			   return $numberOfTel;
          }
	}



?>