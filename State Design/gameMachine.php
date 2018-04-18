<?php 


class gameMachine {

	 	public $hurkleX = 0;
		public $hurkleY = 0;
		public $userX = 0;
		public $userY = 0;
		public $userScore = 0;
		public $movesLeft = 7;
		public $hintMessage = "Take a guess";
		public $intHurkleXDistance = 0;
		public $intHurkleYDistance = 0;


	public function gameMachine() {


		$this->beginningState = new beginningState;
		$this->guessinggState = new guessingState;
		$this->winState = new winState;
		$this->loseState = new loseState;

		$this->gameState = $beginningState;

	}

	// Setters

	public function setGameState($newGameState) {

		$this->gameState = $newGameState;
	}

	public function setUserXGuess($newXGuess) {
		$this->userX = $newXGuess;

	}

	public function setUserYGuess($newYGuess) {
		$this->userY = $newYGuess;
	}


	public function setUserScore($newUserScore) {
		$this->userScore = $newUserScore;
	}

	public function resetHurkle() {
		
		$this->hurkleX = 0;
		$this->hurkleY = 0;
	}

	public function randomizeHurkle() {
		
		$this->hurkleX = rand(1,10);
		$this->hurkleY = rand(1,10);
	}

	public function setMovesLeft($newMovesLeft) {
		$this->movesLeft = $newMovesLeft;
	}

	public function setHintMessage($newHintMessage) {
		$this->hintMessage = $newHintMessage;
	}

	public function setHurkleXDistance($newHurkleXDistance) {
		$this->intHurkleXDistance = $newHurkleXDistance;
	}

	public function setHurkleYDistance($newHurkleYDistance) {
		$this->intHurkleYDistance = $newHurkleYDistance;
	}

	// Game State Methods

	public function hideHurkle() {

		$this->gameState->hideHurkle();
	}

	public function compareLocation() {

		$this->gameState->compareLocation();
	}

	public function drawBoard() {

		$this->gameState->drawBoard();
	}

	public function displayHint() {

		$this->gameState->displayHint();
	}

	public function displayStats() {

		$this->gameState->displayStats();
	}


	public function makeGuess($xGuess, $yGuess) {

		$this->gameState->makeGuess($xGuess, $yGuess);
	}

	public function newGame() {

		$this->gameState->newGame();
	}

	public function resetAll() {

		$this->gameState->resetAll();
	}

	// State Getters

	public function getBeginningState() { return $this->beginningState;}
	public function getGuessingState() { return $this->guessingState;}
	public function getWinngingState() { return $this->winState;}
	public function getLosingState() { return $this->loseState;}


}	

 ?>