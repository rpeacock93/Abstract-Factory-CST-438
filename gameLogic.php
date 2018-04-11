<?php 

// global variables
$hint;

// hard coding global hurkle coordinates
// $_SESSION['intHurkleX'] = 4;
// $_SESSION['intHurkleY'] = 5;

function Reset_All (){
	$_SESSION['intHurkleX'] = 0;
	$_SESSION['intHurkleY'] = 0;
	$_SESSION['intPlayerMoves'] = 7;
	$_SESSION['boolPlayerWin'] = false;
}

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
	if(!isset($_SESSION['intPlayerWin'])) {
		$_SESSION['intPlayerWin'] = false;
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

function drawLihrt() {
	$arrlength = 10;

	$lihrt = array 
	(
		array(),array(),array(),array(),array(),
		array(),array(),array(),array(),array()
	);
	

	echo "<span id='board'>";

	for ($col = 0; $col < $arrlength; $col++) {
	        for ($row = 0; $row < $arrlength; $row++) {

	        	if (!empty($_POST['guessX']) && $row == ($_POST["guessX"] -1) && $col == ($_POST["guessY"] - 1)) {

	        		echo $lihrt[$row][$col] = "<span id='hurkle'>&#x2B1B;&nbsp;&nbsp;</span>";

	        	}
	        	else {

	        		echo $lihrt[$row][$col] = '&#x2B1C;&nbsp;&nbsp;';
	        	}
	        }
	        echo "<br>";
	    }
	    echo "</span>";

	    echo "<br>";

	}


function getGuess() {

	$guessX = $_POST["guessX"];
	$guessY = $_POST["guessY"];


	echo '<span class="output"> Your guess: ', '( ', $_POST["guessY"], ' , ', $_POST["guessX"], ' ) </span><br>' ;
	echo '<span class="output"> Hide: ( '.$_SESSION['intHurkleY'].' , '.$_SESSION['intHurkleX'].' ) </span><br>';
	echo '<span class="output"> Hint: '.$GLOBALS['hint'].'</span><br>';

}

function giveHint()	{

	if(($_POST["guessX"] == $_SESSION['intHurkleX']) && ($_POST["guessY"] == $_SESSION['intHurkleY'])) {
		$GLOBALS['hint'] = "You Win!";
		$_SESSION['intPlayerWins']++;
	}
	else {
		if ($_SESSION['intPlayerMoves'] > 0) {
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
			else {
				$GLOBALS['hint'] = "Error?";
			}

		}
		else {
			$GLOBALS['hint'] = "You Lose!";
			$_SESSION['intPlayerLoses']++;
			Reset_All();
		}

		

	}

}



 ?>