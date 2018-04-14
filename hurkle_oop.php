<?php

	class characterClass {
		/*
		Each object of class Character can have an X position, a Y position, and a score.
		The X and Y positions can be set randomly, or they can be set by an external source.
		*/
		public $intXPos = 0;
		public $intYPos = 0;
		public $intScore = 0;
		public $intMoves = 0;
		
		#Functions for setting values within class object.
		public function setXPos($intNewXPos){
			$this->intXPos = $intNewXPos;
		}
		public function setYPos($intNewYPos){
			$this->intYPos = $intNewYPos;
		}
		public function setScore($intNewScore){
			$this->intScore = $intNewScore;
		}
		public function setMoves($intNewMoves){
			$this->intMoves = $intNewMoves;
		}
	#Functions for returning values from within class object.
		public function getXPos(){
			return $this->intXPos;
		}
		public function getYPos(){
			return $this->intYPos;
		}
		public function getScore(){
			return $this->intScore;
		}
		public function getMoves(){
			return $this->intMoves;
		}
		#Set a random position.
		public function setRandomPos(){
			$this->intXPos = rand(1,10);
			$this->intYPos = rand(1,10);
		}
		#Reset the position to baseline.
		public function resetPos() {
			$this->intXPos = 0;
			$this->intYPos = 0;
			$this->intMoves = 0;
		}
		#Reset the score to baseline.
		public function resetScore() {
			$this->intScore = 0;
		}
		
	}
	
	function Draw_Table(){
	
		$intYCounter = 0;
		$intXCounter = 0;
		$intHurkleXDistance = 0;
		$intHurkleYDistance = 0;
		$intPlayerX = $_SESSION['objPlayer']->getXPos();
		$intPlayerY = $_SESSION['objPlayer']->getYPos();
		$intHurkleX = $_SESSION['objHurkle']->getXPos();
		$intHurkleY = $_SESSION['objHurkle']->getYPos();
		
		if (($intHurkleX == $intPlayerX) and ($intHurkleY == $intPlayerY)) {
			if (($intPlayerX != 0) and ($intPlayerY != 0)) {
				echo "You've found the Hurkle!  </br>";
			}
		} else {
			echo "You hear the Hurkle somewhere ";
			$intHurkleYDistance = abs($intHurkleY - $intPlayerY);
			$intHurkleXDistance = abs($intHurkleX - $intPlayerX);
			if (($intHurkleXDistance > 6) or ($intHurkleYDistance > 6)) {
				echo "far";
			} elseif (($intHurkleXDistance < 3) and ($intHurkleYDistance < 3)) {
				echo "very close";
			}
			echo " to the ";
			if ($intHurkleY > $intPlayerY) {
				echo "south";
			} elseif ($intHurkleY < $intPlayerY) {
				echo "north";
			}
			if ($intHurkleX < $intPlayerX) {
				echo "west";
			} elseif ($intHurkleX > $intPlayerX) {
				echo "east";
			}
			echo " of you.</br></br>";
		}
	
		echo "</br><table id=\"table1\" border=\"1\">";
		for ($intYCounter=0; $intYCounter<=10; $intYCounter++) {
			echo "<tr>";
			for ($intXCounter=0; $intXCounter<=10; $intXCounter++) {
				if (($intYCounter == 0) or ($intXCounter == 0)) {
					echo "<td align=\"center\" class=\"forest\">", print_r($intXCounter,1), "</td>";
				} elseif (($intXCounter == $intPlayerX) and ($intYCounter == $intPlayerY)) {
					echo "<td align=\"center\" class=\"player1\">0</td>";
				} else {
					echo "<td align=\"center\" class=\"farmland\">;</td>";
				}
				if ($intXCounter == 10) {
					echo "</tr>";
				}
			}
		}
		echo "</table></br>";
		
		echo "</br>";
		# echo "</br>Hurkle X: ", $_SESSION['objHurkle']->getXPos();
		# echo "</br>Hurkle Y: ", $_SESSION['objHurkle']->getYPos();
		echo "</br>Player X: ", $_SESSION['objPlayer']->getXPos();
		echo "</br>Player Y: ", $_SESSION['objPlayer']->getYPos();
		echo "</br>Player Score: ", $_SESSION['objPlayer']->getScore();
		echo "</br>Player Moves: ", $_SESSION['objPlayer']->getMoves();
		echo "</br>Player Moves Remaining: ", 7 - $_SESSION['objPlayer']->getMoves();
		echo "</br></br>";
		
	}
	function Reset_All(){
		$_SESSION['objHurkle']->resetPos();
		$_SESSION['objPlayer']->resetPos();
	}

	session_start();
	
	/*Initialize Player*/
	if(!isset($_SESSION['objPlayer'])) {
		$_SESSION['objPlayer'] = new characterClass;
	}
	
	/*Initialize Hurkle*/
	if(!isset($_SESSION['objHurkle'])) {
		$_SESSION['objHurkle'] = new characterClass;
	}
	if (($_SESSION['objHurkle']->getXPos() == 0) or ($_SESSION['objHurkle']->getYPos() == 0)){
		$_SESSION['objHurkle']->setRandomPos();
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link type="text/css" rel="stylesheet" href="Brooks_CST336_Assignment3.css">
	<meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>CST438, Abstract Factory</title>
  <meta name="description" content="">
  <meta name="author" content="B. Brooks">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div id="wrapHome">
	<h1>Find the Hurkle!</h1>
	<p>The Hurkle is a happy little beast that lives on the planet Lirht and likes to play Hide and Seek.  Lihrt is a flat world divided into 10 rows and columns.  Can you find where the Hurkle is hiding in less than 7 guesses?</p>
	<form method="get">
		Enter Player's X coordinate (1-10): <input type="text" name="varPlayerX"></br>
		Enter Player's Y coordinate (1-10): <input type="text" name="varPlayerY"></br>
		</br></br>
		<input type="submit" name="Play" value="Look for the Hurkle!">
		<input type="submit" name="Refresh" value="Refresh">
		<input type="submit" name="Reset" value="Reset All">
	</form>
	</br></br>

	<?php

    if (isset($_GET['Reset'])) {
        # Reset was clicked
		Reset_All();
		$_SESSION['objPlayer']->setScore(0);
		Draw_Table();
    } elseif (isset($_GET['Refresh'])) {
		Draw_Table();
	} else {
		/*Populate starting position for player*/
		if (isset($_GET['varPlayerX'])) {
			if (is_numeric($_GET['varPlayerX'])){
				$_SESSION['objPlayer']->setXPos(intval($_GET['varPlayerX']));
				if (($_SESSION['objPlayer']->getXPos() < 1) or ($_SESSION['objPlayer']->getXPos() > 10)) {
					echo "Player X position values must be between 1 and 10; setting to default (0).</br></br>";
					$_SESSION['objPlayer']->setXPos(0);
				} 
			} else {
				echo "Player X: Entries must be numeric; setting to default (0).</br></br>";
				$_SESSION['objPlayer']->setXPos(0);
			}
		}
		if (isset($_GET['varPlayerY'])) {
			if (is_numeric($_GET['varPlayerY'])){
				$_SESSION['objPlayer']->setYPos(intval($_GET['varPlayerY']));
				if (($_SESSION['objPlayer']->getYPos() < 1) or ($_SESSION['objPlayer']->getYPos() > 10)) {
					echo "Player Y position values must be between 1 and 10; setting to default (0).</br></br>";
					$_SESSION['objPlayer']->setYPos(0);
				} 
			} else {
				echo "Player Y: Entries must be numeric; setting to default (0).</br></br>";
				$_SESSION['objPlayer']->setYPos(0);
			}
		}
		$intPlayerX = $_SESSION['objPlayer']->getXPos();
		$intPlayerY = $_SESSION['objPlayer']->getYPos();
		$intHurkleX = $_SESSION['objHurkle']->getXPos();
		$intHurkleY = $_SESSION['objHurkle']->getYPos();
		
		if (($_SESSION['objPlayer']->getXPos() != 0) and ($_SESSION['objPlayer']->getYPos() != 0)) {
			$_SESSION['objPlayer']->setMoves($_SESSION['objPlayer']->getMoves() + 1);
		}

		if (($_SESSION['objHurkle']->getXPos() == $_SESSION['objPlayer']->getXPos()) and ($_SESSION['objHurkle']->getYPos() == $_SESSION['objPlayer']->getYPos())) {
			if (($_SESSION['objPlayer']->getXPos() != 0) and ($_SESSION['objPlayer']->getYPos() != 0)) {
				echo "You've found the Hurkle!  </br>";
			}
			Reset_All();
			$_SESSION['objPlayer']->setScore($_SESSION['objPlayer']->getScore() + 1);
		}

		if ($_SESSION['objPlayer']->getMoves() >= 7) {
			echo "You didn't find the Hurkle!  Try again!</br>";
			Reset_All();
		}

		Draw_Table();
		
	}
	?>
	</br></br>
  </div>
</body>
</html>
