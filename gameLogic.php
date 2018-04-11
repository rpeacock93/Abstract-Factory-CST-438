<?php 

$hint;

$GLOBALS['xCoord'] = 4;
$GLOBALS['yCoord'] = 5;



function blankLihrt() {
	$arrlength = 10;

	$lihrt = array 
	(
		array(),array(),array(),array(),array(),
		array(),array(),array(),array(),array()
	);

	echo "<span id='board'>";

	for ($col = 0; $col < $arrlength; $col++) {
	        for ($row = 0; $row < $arrlength; $row++) {
	        	echo $lihrt[$row][$col] = '&#x2B1C;&nbsp;&nbsp;';
	        }
	        echo "<br>";
	    }
	    echo "</span>";

	    echo "<br>";

	}

function createLihrt() {
	$arrlength = 10;

	$lihrt = array 
	(
		array(),array(),array(),array(),array(),
		array(),array(),array(),array(),array()
	);

	echo "<span id='board'>";

	for ($col = 0; $col < $arrlength; $col++) {
	        for ($row = 0; $row < $arrlength; $row++) {

	        	if ($row == ($_POST["guessX"] -1) && $col == ($_POST["guessY"] - 1)) {

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

function hideHurkle() {

	// Hard Code Test
	// $GLOBALS['xCoord'] = 3;
	// $GLOBALS['yCoord'] = 5;

	$GLOBALS['xCoord'] = rand(1, 10);
	$GLOBALS['yCoord'] = rand(1, 10);

}

function getGuess() {

	$guessX = $_POST["guessX"];
	$guessY = $_POST["guessY"];

	giveHint();


	echo '<span class="output"> Your guess: ', '( ', $_POST["guessY"], ' , ', $_POST["guessX"], ' ) </span><br>' ;
	echo '<span class="output"> Hide: ( '.$GLOBALS['yCoord'].' , '.$GLOBALS['xCoord'].' ) </span><br>';
	echo '<span class="output"> Hint: '.$GLOBALS['hint'].'</span>';

}

function giveHint()	{

	if(($_POST["guessX"] == $GLOBALS['xCoord']) && ($_POST["guessY"] == $GLOBALS['yCoord'])) {
		$GLOBALS['hint'] = "You Win!";
	}
	else {
		if ($_POST["guessX"] == $GLOBALS['xCoord']) {
			
			if ($_POST["guessY"] > $GLOBALS['yCoord']) {
				
				$GLOBALS['hint'] = "Go North";
			}
			else if ($_POST["guessY"] < $GLOBALS['yCoord']) {
				
				$GLOBALS['hint'] = "Go South";
			}
		}
		else if ($_POST["guessY"] == $GLOBALS['yCoord']) {
			
			if ($_POST["guessX"] < $GLOBALS['xCoord']) {
				
				$GLOBALS['hint'] = "Go East";
			}
			else if ($_POST["guessX"] > $GLOBALS['xCoord']) {
				
				$GLOBALS['hint'] = "Go West";
			}
		}
		else if ($_POST["guessY"] < $GLOBALS['yCoord']) {
			
			if ($_POST["guessX"] < $GLOBALS['xCoord']) {
				
				$GLOBALS['hint'] = "Go Southeast";
			}
			
			else if ($_POST["guessX"] > $GLOBALS['xCoord']) {
				
				$GLOBALS['hint'] = "Go Southwest";
			}
		}
		else if ($_POST["guessY"] > $GLOBALS['yCoord']) {
			
			if ($_POST["guessX"] <$GLOBALS['xCoord']) {
				
				$GLOBALS['hint'] = "Go Northeast";
			}
			
			else if ($_POST["guessX"] > $GLOBALS['xCoord']) {
				
				$GLOBALS['hint'] = "Go Northwest";
			}
		}
		else {
			$GLOBALS['hint'] = "Not sure";
		}

	}

}




 ?>