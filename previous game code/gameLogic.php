<?php 

// global variables
$hint;



// Resets selected session variables
function Reset_All (){
	$_SESSION['intHurkleX'] = 0;
	$_SESSION['intHurkleY'] = 0;
	$_SESSION['intPlayerMoves'] = 7;
	$_SESSION['boolGameOver'] = false;
}
	// Begins new session
	session_start();
	
	/*Initialize variables*/
	if(!isset($_SESSION['intPlayerWins'])) {
		$_SESSION['intPlayerWins'] = 0;
	}
	if(!isset($_SESSION['intPlayerLoses'])) {
		$_SESSION['intPlayerLoses'] = 0;
	}
	if(!isset($_SESSION['intPlayerMoves'])) {
		$_SESSION['intPlayerMoves'] = 7;
	}
	if(!isset($_SESSION['boolGameOver'])) {
		$_SESSION['boolGameOver'] = false;
	}
	
	/*Set Hurkle location*/
	if(!isset($_SESSION['intHurkleX'])) {
		$_SESSION['intHurkleX'] = rand(1,10);
	}
	if(!isset($_SESSION['intHurkleY'])) {
		$_SESSION['intHurkleY'] = rand(1,10);
	}
	if ($_SESSION['intHurkleX'] == 0) {
		$_SESSION['intHurkleX'] = rand(1,10);
	}
	if ($_SESSION['intHurkleY'] == 0) {
		$_SESSION['intHurkleY'] = rand(1,10);
	}

// Draws the hurkle gameboard
function drawLihrt() {
	$arrlength = 10;

	// Creates empty 10 by 10 array
	$lihrt = array 
	(
		array(),array(),array(),array(),array(),
		array(),array(),array(),array(),array()
	);
	
	// Encapsulates board into css board id
	echo "<span id='board'>";

	// For Loop to fill and echo out contents of array board
	for ($col = 0; $col < $arrlength; $col++) {
	        for ($row = 0; $row < $arrlength; $row++) {

	        	// Checks if Post is empty and if user guesses match the right iteration 
	        	if (!empty($_POST['guessX']) && $row == ($_POST["guessX"] -1) && $col == ($_POST["guessY"] - 1)) {

	        		// user guess location is arrived and special hurkle entity is added with two spaces
	        		echo $lihrt[$row][$col] = "<span id='hurkle'>&#x2B1B;&nbsp;&nbsp;</span>";

	        	}
	        	else {

	        		// Every non hurkle piece for the board 
	        		echo $lihrt[$row][$col] = '&#x2B1C;&nbsp;&nbsp;';
	        	}
	        }
	        echo "<br>";
	    }
	    // ending of gameboard encapsulation
	    echo "</span>";

	    echo "<br>";

	}


function getGuess() {

	// Stores users post value guess
	$guessX = $_POST["guessX"];
	$guessY = $_POST["guessY"];


	// Displays users guess
	echo '<span class="output"> Your guess: ', '( ', $_POST["guessY"], ' , ', $_POST["guessX"], ' ) </span><br>' ;
	// For testing this displays the actual hurkle location
	echo '<span class="output"> Hide: ( '.$_SESSION['intHurkleY'].' , '.$_SESSION['intHurkleX'].' ) </span><br>';
	// Displays hint message
	echo '<span class="output"> Hint: '.$GLOBALS['hint'].'</span><br>';

}

function giveHint()	{

	// Checks for winning condition
	if(($_POST["guessX"] == $_SESSION['intHurkleX']) && ($_POST["guessY"] == $_SESSION['intHurkleY'])) {
		// winning hint message
		$GLOBALS['hint'] = "You Win!";
		// Player wins is incremented
		$_SESSION['intPlayerWins']++;
		// This can be a game status condition that can help us, not currently being used
		$_SESSION['boolGameOver'] = true;
		Reset_All();
	}
	else {
		// Checks if player moves have not reached 0
		if ($_SESSION['intPlayerMoves'] > 0) {

			// Coordinate Comparison Conditions
			if ($_POST["guessX"] == $_SESSION['intHurkleX']) {
				
				if ($_POST["guessY"] > $_SESSION['intHurkleY']) {
					
					$GLOBALS['hint'] = "Go North";
				}
				else if ($_POST["guessY"] < $_SESSION['intHurkleY']) {
					
					$GLOBALS['hint'] = "Go South";
				}
			}
			else if ($_POST["guessY"] == $_SESSION['intHurkleY']) {
				
				if ($_POST["guessX"] < $_SESSION['intHurkleX']) {
					
					$GLOBALS['hint'] = "Go East";
				}
				else if ($_POST["guessX"] > $_SESSION['intHurkleX']) {
					
					$GLOBALS['hint'] = "Go West";
				}
			}
			else if ($_POST["guessY"] < $_SESSION['intHurkleY']) {
				
				if ($_POST["guessX"] < $_SESSION['intHurkleX']) {
					
					$GLOBALS['hint'] = "Go Southeast";
				}
				
				else if ($_POST["guessX"] > $_SESSION['intHurkleX']) {
					
					$GLOBALS['hint'] = "Go Southwest";
				}
			}
			else if ($_POST["guessY"] > $_SESSION['intHurkleY']) {
				
				if ($_POST["guessX"] <$_SESSION['intHurkleX']) {
					
					$GLOBALS['hint'] = "Go Northeast";
				}
				
				else if ($_POST["guessX"] > $_SESSION['intHurkleX']) {
					
					$GLOBALS['hint'] = "Go Northwest";
				}
			}
			// Not sure if it needs this last else
			else {
				$GLOBALS['hint'] = "Error?";
			}

		}
		// Player has ran out of moves and now loses
		else {
			// Losing hint message displayed
			$GLOBALS['hint'] = "You Lose!";
			// User loses incremented
			$_SESSION['intPlayerLoses']++;
			// This can be a game status condition that can help us, not currently being used
			$_SESSION['boolGameOver'] = true;
			Reset_All();
		}

		

	}

}



 ?>