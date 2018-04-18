<?php 

	include('GameState.php');

	class beginningState implements GameState { 

		public function beginningState($newGameMachine) {

			$gameMachine = new gameMachine;

			$this->gameMachine = $newGameMachine;
		}


		public function hideHurkle() {
			// set hurkles random location from game
			$this->gameMachine->randomizeHurkle();

		}

		public function displayHint() {
			// defualt take a look message
			echo "<h3>", $this->gameMachine->hintMessage, "</h3>";

		}

		public function displayStats() {
			// display session score
			// display defualt starting moves of 7
			echo "<h2 class='hint'>Player Score:<span class='score'> ", $this->gameMachine->userScore, "</span>";
			echo "&nbsp; Player Moves Remaining: <span class='score'> ", $this->gameMachine->movesLeft, "</span> </h2> <br>";
		}


		public function drawBoard() {
			// draw blank board	
			echo "<table id=\"table1\" border=\"1\">";
			for ($intYCounter=0; $intYCounter<=10; $intYCounter++) {
				echo "<tr>";
				for ($intXCounter=0; $intXCounter<=10; $intXCounter++) {
					if ($intYCounter == 0) {
						echo "<td align=\"center\" class=\"border tile\">", print_r($intXCounter,1), "</td>";
					} elseif ($intXCounter == 0) {
						echo "<td align=\"center\" class=\"border tile\">", print_r($intYCounter,1), "</td>";
					} elseif (($intXCounter == $this->gameMachine->userX) and ($intYCounter == $this->gameMachine->userY)) {
						echo "<td align=\"center\" class=\"hurkle tile\"></td>";
					} else {
						echo "<td align=\"center\" class=\"grass tile\"></td>";
					}
					if ($intXCounter == 10) {
						echo "</tr>";
					}
				}
			}
			echo "</table></br>";

		}

		public function makeGuess($xGuess, $yGuess) {
			// accept users inputed games and change to guessing state
			if (isset($_GET['varPlayerX'])) {
				if (is_numeric($_GET['varPlayerX'])){
					$this->gameMachine->setUserXGuess($_GET['varPlayerX']);
				} else {
					$this->gameMachine->setHintMessage("Player X: Entries must be numeric; setting to default (0)");
						$this->gameMachine->setUserXGuess(0);
					}
			}	
			if (isset($_GET['varPlayerY'])) {
				if (is_numeric($_GET['varPlayerY'])){
					$this->gameMachine->setUserYGuess($_GET['varPlayerY']);
				} else {
					$this->gameMachine->setHintMessage("Player Y: Entries must be numeric; setting to default (0)");
						$this->gameMachine->setUserYGuess(0);
				}
			}
			
			// compares user guess
			// sets hint
			if (($intHurkleX == $intPlayerX) and ($intHurkleY == $intPlayerY)) {
				if (($intPlayerX != 0) and ($intPlayerY != 0)) {
					$this->gameMachine->setHintMessage("You've found the Hurkle!");
					$this->gameMachine->setGameState($this->gameMachine->getWinngingState());
				}
			} else {
				# Give hint for the distance and direction.
				$this->gameMachine->setHintMessage("You hear the Hurkle somewhere");
				$this->gameMachine->setHurkleYDistance(abs($intHurkleY - $intPlayerY));
				$this->gameMachine->setHurkleXDistance(abs($intHurkleX - $intPlayerX));
				if (($intHurkleXDistance > 6) or ($intHurkleYDistance > 6)) {
					$this->gameMachine->setHintMessage($this->gameMachine->hintMessage + "far");
				} elseif (($intHurkleXDistance < 3) and ($intHurkleYDistance < 3)) {
					$this->gameMachine->setHintMessage($this->gameMachine->hintMessage + "very close");
				}
				$this->gameMachine->setHintMessage($this->gameMachine->hintMessage + " to the ");
				if ($intHurkleY > $intPlayerY) {
					$this->gameMachine->setHintMessage($this->gameMachine->hintMessage + "south");
				} elseif ($intHurkleY < $intPlayerY) {
					$this->gameMachine->setHintMessage($this->gameMachine->hintMessage + "north");
				}
				if ($intHurkleX < $intPlayerX) {
					$this->gameMachine->setHintMessage($this->gameMachine->hintMessage + "west");
				} elseif ($intHurkleX > $intPlayerX) {
					$this->gameMachine->setHintMessage($this->gameMachine->hintMessage + "east");
				}
				$this->gameMachine->setHintMessage($this->gameMachine->hintMessage + " of you.</h3>");
				// decrease userMoves
				$this->gameMachine->setMovesLeft(($this->gameMachine->movesLeft) -1);
				// moves to guessing state
				$this->gameMachine->setGameState($this->gameMachine->getGuessingState());
				
				
			}
			
			

		}

		public function newGame() {
			if (isset($_GET['Refresh'])) {
				// User can abandon game and reset to beginning, decreases user score 
				$this->gameMachine->setUserScore(($this->gameMachine->userScore) - 1);

				$this->gameMachine->setUserXGuess(0);
				$this->gameMachine->setUserYGuess(0);
				$this->gameMachine->setMovesLeft(7);
				$this->gameMachine->setHintMessage($newHintMessage);
				$this->gameMachine->setHurkleXDistance(0);
				$this->gameMachine->setHurkleYDistance(0);

				$this->gameMachine->setGameState($this->gameMachine->getBeginningState());

			}

		}

		public function resetAll() {
			if (isset($_GET['Reset'])) {
				// resets user score and moves to beginning state
				$this->gameMachine->setUserXGuess(0);
				$this->gameMachine->setUserYGuess(0);
				$this->gameMachine->setUserScore(0);
				$this->gameMachine->setMovesLeft(7);
				$this->gameMachine->setHintMessage($newHintMessage);
				$this->gameMachine->setHurkleXDistance(0);
				$this->gameMachine->setHurkleYDistance(0);

				$this->gameMachine->setGameState($this->gameMachine->getBeginningState());
			}
			

		}

	}



 ?>