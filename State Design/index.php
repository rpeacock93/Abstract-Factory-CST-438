<?php 

	include('gameMachine.php');
	include('beginningState.php');
	include('guessingState.php');
	include('winState.php');
	include('loseState.php');


 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<link type="text/css" rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Audiowide|Contrail+One|PT+Mono" rel="stylesheet">
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
	<div id="title-bar"><h1>Find the Hurkle!</h1></div>
	<div id="student-bar">
		<span id="student-noBorder">Brian Brooks</span>
		<span id="student">Devorah Akhamzadeh</span>
		<span id="student">Seema Khan</span>
		<span id="student">Ryan Peacock</span>
	</div>
  <div id="wrapHome">
	<p id="description">The Hurkle is a happy little beast that lives on the planet Lirht and likes to play Hide and Seek.  
	   Lihrt is a flat world divided into 10 rows and columns.  Can you find where the Hurkle is hiding in less than 7 guesses?</p>

	   <br>

	<form method="get">
		<span class="input-display" >Enter X <sub>(1-10)</sub>:</span> <input class="text-input" type="text" name="varPlayerX"> &nbsp;
		<span class="input-display">Enter Y <sub>(1-10)</sub>:</span> <input class="text-input" type="text" name="varPlayerY"></br>
		</br></br>
		<input class="button" type="submit" name="Play" value="Look for the Hurkle!">
		<input class="button" type="submit" name="Refresh" value="Refresh">
		<input class="button" type="submit" name="Reset" value="Reset All">
	</form>

	<?php 


		$newGame = new gameMachine;

		$newGame->drawBoard();



 	?>
	</br></br>
  </div>
</body>
</html>