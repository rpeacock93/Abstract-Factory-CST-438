<?php 

	
	class gameBoard {

		public $length = 10;

		public $lirht = array (
			array(),array(),array(),array(),array(),
			array(),array(),array(),array(),array()
		);

		public $tile = '&#x2B1C;&nbsp;&nbsp;';

		public $hurkle = '&#x2B1B;&nbsp;&nbsp;';



		function fillBoard() {
			for ($col = 0; $col < $this->length; $col++) {
	        	for ($row = 0; $row < $this->length; $row++) {
	        		$this->lihrt[$row][$col] = $this->tile;
	        	}
	       
	    	}
		}


		function hurkleIn($userRow, $userCol) {

			// Emptys any previous hurkle guess
			$this->fillBoard();

			for ($col = 0; $col < $this->length; $col++) {
	        	for ($row = 0; $row < $this->length; $row++) {
	        		if ($row == ($userRow -1) && $col == ($userCol - 1)) {
	        			$this->lihrt[$row][$col] = $this->hurkle;
	        		}
	        	}
	       
	    	}

		}

		function printBoard() {

			echo '<span id="board"';
			for ($col = 0; $col < $this->length; $col++) {
	        	for ($row = 0; $row < $this->length; $row++) {
	        		 echo $this->lihrt[$row][$col];
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

	$board1->hurkleIn(5,4);

	$board1->printBoard();

	$board1->hurkleIn(10,9);

	$board1->printBoard();



 ?>

