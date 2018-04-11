<?php include('gameLogic.php'); 			


	if (!empty($_POST['guessX'])) {
		$_SESSION['intPlayerMoves']--;
		giveHint();
	}
	else {
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

			echo '<span class="output"> Wins: '.$_SESSION['intPlayerWins'].' Loses: '.$_SESSION['intPlayerLoses'].'</span><br><br>';

			echo '<span class="output"> Player Moves: '.$_SESSION['intPlayerMoves'].'</span><br><br>';

			drawLihrt();

			if (!empty($_POST['guessX'])) {
				getGuess();	
			}
			else {
				echo '<span class="output"> Take a Look</span><br>';
			}
		
			 ?>
			 <br>


			 <form action="game.php" method="post">
	            <span class="guess">Row: </span><input class="guess" type="text" name="guessY">
	            <span class="guess">Col: </span><input class="guess" type="text" name="guessX"><br>
	            <br>
	            <input id="button" type="submit" value="Look"> &nbsp;&nbsp;&nbsp;
	        </form>

		</div>

	</body>
</html>