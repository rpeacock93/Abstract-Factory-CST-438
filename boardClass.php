<?php 

	
	class gameBoard {

		public var $length = 10;

		public $lirht = array (
			array(),array(),array(),array(),array(),
			array(),array(),array(),array(),array()
		);

		public $tile = '&#x2B1C;&nbsp;&nbsp;';

		public $hurkle = '&#x2B1B;&nbsp;&nbsp;';



		function fillBoard() {
			for ($col = 0; $col < $_GLOBAL['length']; $col++) {
	        	for ($row = 0; $row < $_GLOBAL['length']; $row++) {
	        		$lihrt[$row][$col] = $tile;
	        	}
	       
	    	}
		}


		function hurkleIn($userRow, $userCol) {
			for ($col = 0; $col < $_GLOBAL['length']; $col++) {
	        	for ($row = 0; $row < $_GLOBAL['length']; $row++) {
	        		if ($row == ($userRow -1) && $col == ($userCol - 1)) {
	        			$lihrt[$row][$col] = $hurkle;
	        		}
	        	}
	       
	    	}

		}

		function printBoard() {

			echo '<span id="board"';
			for ($col = 0; $col < $_GLOBAL['length']; $col++) {
	        	for ($row = 0; $row < $_GLOBAL['length']; $row++) {
	        		 echo $lihrt[$row][$col];
	        	}

	        	echo "<br>";
	       
	    	}
	    	echo "</span>";

	    	echo "<br>";

		}


	}


	$board1 = new gameBoard;

	$board1->fillBoard();

	$board1->printBoard();

	$board1->hurkleIn(2,4);

	$board1->printBoard();



 ?>

