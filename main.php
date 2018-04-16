<?php

	include('boardClass.php');
	include('characterClass.php');
	include('gameClass.php');

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
	/* Initialize game board*/
	if(!isset($_SESSION['objBoard'])) {
		$_SESSION['objBoard'] = new boardClass;
	}
	/* Initialize game board*/
	if(!isset($_SESSION['objGame'])) {
		$_SESSION['objGame'] = new gameClass;
	}

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link type="text/css" rel="stylesheet" href="style.css">
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
	<p>The Hurkle is a happy little beast that lives on the planet Lirht and likes to play Hide and Seek.  
	   Lihrt is a flat world divided into 10 rows and columns.  Can you find where the Hurkle is hiding in less than 7 guesses?</p>
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
		# Draw the board.
		$_SESSION['objBoard']->Draw_Table($_SESSION['objPlayer']->getXPos(), $_SESSION['objPlayer']->getYPos(), 
		                                  $_SESSION['objHurkle']->getXPos(), $_SESSION['objHurkle']->getYPos(), 
										  $_SESSION['objPlayer']->getScore(), $_SESSION['objPlayer']->getMoves());
    } elseif (isset($_GET['Refresh'])) {
		$_SESSION['objBoard']->Draw_Table($_SESSION['objPlayer']->getXPos(), $_SESSION['objPlayer']->getYPos(), 
		                                  $_SESSION['objHurkle']->getXPos(), $_SESSION['objHurkle']->getYPos(), 
										  $_SESSION['objPlayer']->getScore(), $_SESSION['objPlayer']->getMoves());
	} else {
		# Populate and validate player position
		if (isset($_GET['varPlayerX'])) {
			if (is_numeric($_GET['varPlayerX'])){
				$_SESSION['objPlayer']->setXPos($_SESSION['objGame']->evaluatePosition(intval($_GET['varPlayerX'])));
			} else {
				echo "Player X: Entries must be numeric; setting to default (0).</br></br>";
				$_SESSION['objPlayer']->setXPos(0);
			}
		}
		if (isset($_GET['varPlayerY'])) {
			if (is_numeric($_GET['varPlayerY'])){
				$_SESSION['objPlayer']->setYPos($_SESSION['objGame']->evaluatePosition(intval($_GET['varPlayerY'])));
			} else {
				echo "Player Y: Entries must be numeric; setting to default (0).</br></br>";
				$_SESSION['objPlayer']->setYPos(0);
			}
		}
		
		# Evaluate move; if it is a Refresh, do not increment the move counter.
		$_SESSION['objPlayer']->setMoves($_SESSION['objGame']->evaluateMoves($_SESSION['objPlayer']->getMoves(),
		                                                                     $_SESSION['objPlayer']->getXPos(),
																			 $_SESSION['objPlayer']->getYPos()));


		# Evaluate if the player has won or lost the game.
		if ($_SESSION['objGame']->evaluateWinLoss($_SESSION['objPlayer']->getXPos(),
												  $_SESSION['objPlayer']->getYPos(),
												  $_SESSION['objHurkle']->getXPos(),
												  $_SESSION['objHurkle']->getYPos(),
												  $_SESSION['objPlayer']->getMoves()) == 1){
			$_SESSION['objPlayer']->setScore($_SESSION['objPlayer']->getScore() + 1);
			echo "You've found the Hurkle!  </br>";
			Reset_All();
		} elseif ($_SESSION['objGame']->evaluateWinLoss($_SESSION['objPlayer']->getXPos(),
												  $_SESSION['objPlayer']->getYPos(),
												  $_SESSION['objHurkle']->getXPos(),
												  $_SESSION['objHurkle']->getYPos(),
												  $_SESSION['objPlayer']->getMoves()) == 2){
			echo "You didn't find the Hurkle!  Try again!</br>";
			Reset_All();
		}

		# Draw the board
		$_SESSION['objBoard']->Draw_Table($_SESSION['objPlayer']->getXPos(), $_SESSION['objPlayer']->getYPos(), 
		                                  $_SESSION['objHurkle']->getXPos(), $_SESSION['objHurkle']->getYPos(), 
										  $_SESSION['objPlayer']->getScore(), $_SESSION['objPlayer']->getMoves());
		
	}
	?>
	</br></br>
  </div>
</body>
</html>
