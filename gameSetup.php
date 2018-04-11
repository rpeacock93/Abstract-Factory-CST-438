<?php 



function createLihrt() {
	$arrlength = 10;

	$lihrt = array 
	(
		array(),array(),array(),array(),array(),
		array(),array(),array(),array(),array()
	);

	echo "<span id='board'>";

	for ($row = 0; $row < $arrlength; $row++) {
	        for ($col = 0; $col < $arrlength; $col++) {

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

function hidHurkle() {

	$xCoord = rand(1, 10);
	$yCoord = rand(1, 10);

}

function getGuess() {

	$guessX = $_POST["guessX"];
	$guessY = $_POST["guessY"];


	echo '<span class="output"> Your guess: ', '( ', $_POST["guessX"], ' , ', $_POST["guessY"], ' ) </span><br>' ;
	echo '<span class="output"> Hint: </span>' ;

}	




 ?>