<?php include('gameLogic.php'); ?>

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

			<span class="output">Wins: Losses: </span>
			<br>
			<br>

			<?php 

			hideHurkle();
			blankLihrt();

			 ?>

			 <span class="output">Take a guess</span>

			 <br>
			 <br>


			 <form action="game.php" method="post">
	            <span class="guess">Row: </span><input class="guess" type="text" name="guessY">
	            <span class="guess">Col: </span><input class="guess" type="text" name="guessX"><br>
	            <br>
	            <input id="button" type="submit">
	        </form>

			 

		</div>

	</body>
</html>