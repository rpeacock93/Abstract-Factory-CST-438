<?php include('gameSetup.php'); ?>

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


			// Having trouble with a defualt POST value, but needed to get something going
			// So i could start styling the page
			// $_POST['guessX'] = 5;
			// $_POST['guessY'] = 5;
			hidHurkle(); 
			createLihrt();
			getGuess();	

			 ?>

			 <br>
			 <br>


			 <form action="index.php" method="post">
	            <span class="guess">X: </span><input class="guess" type="text" name="guessX">
	            <span class="guess">Y: </span><input class="guess" type="text" name="guessY"><br>
	            <br>
	            <input id="button" type="submit">
	        </form>

			 

		</div>

	</body>
</html>