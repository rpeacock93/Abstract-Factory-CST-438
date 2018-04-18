<?php 

	interface GameState 
	{

		public function drawBoard();
		public function displayHint();
		public function displayStats();
		public function makeGuess($xGuess, $yGuess);
		public function newGame();
		public function resetAll();

	}

 ?>