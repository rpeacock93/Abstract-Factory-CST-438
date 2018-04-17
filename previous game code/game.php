<?php include('gameLogic.php'); 			

// Each time page loads it checks if there are guesses stored in post
	if (!empty($_POST['guessX'])) {
		// If there are player move is decremented to display current game move
		$_SESSION['intPlayerMoves']--;
		// Calls function to load in current hint message to display
		giveHint();
	}
	else {
		// If no guesses are stored in post, this means new round and everythings reset
		Reset_All();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>My title</title>
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
	<body>

		<div id="container" >

			<h1 class="strokeme">Find Hurkle</h1>

			<?php 

			// Displays players wins and loses
			echo '<span class="output"> Wins: '.$_SESSION['intPlayerWins'].' Loses: '.$_SESSION['intPlayerLoses'].'</span><br><br>';


			// displays how many moves player has left
			echo '<span class="output"> Player Moves: '.$_SESSION['intPlayerMoves'].'</span><br><br>';

			// draws Lihrt Board
			drawLihrt();

			// Like top of page, to evualate if this is the beginning of a game or not
			if (!empty($_POST['guessX'])) {
				// if not the beginning of a game, users last guess is displayed, along with hint
				getGuess();	
			}
			else {
				// if this is the beginning then display a beginning message
				echo '<span class="output"> Take a Look</span><br>';
			}
		
			 ?>
			 <br>

			 <!-- HTML form to POST collect user guesses, reloads current page upon submission -->
			 <form action="game.php" method="post">
	            <span class="guess">Row: </span><input class="guess" type="text" name="guessY">
	            <span class="guess">Col: </span><input class="guess" type="text" name="guessX"><br>
	            <br>
	            <input id="button" type="submit" value="Look"> &nbsp;&nbsp;&nbsp;
	        </form>

		</div>

	</body>
</html>