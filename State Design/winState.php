<?php 

	include_once('GameState.php');

	class winState implements GameState {

		public function winState($newGameMachine) {

			$gameMachine = new gameMachine;

			$this->gameMachine = $newGameMachine;
		}

		public function hideHurkle() {
			// hurkle is already randomized

		}

		public function displayHint() {
			// Display Winning Message
			echo "<h3>", $this->gameMachine->hintMessage, "</h3>";

		}

		public function displayStats() {
			// Display updated score from Win
			// Display 0 moves, player exhausted all mvoes
			echo "<h2 class='hint'>Player Score:<span class='score'> ", $this->gameMachine->userScore, "</span>";
			echo "&nbsp; Player Moves Remaining: <span class='score'> ", $this->gameMachine->movesLeft, "</span> </h2> <br>";

		}

		public function drawBoard() {
			// Draw users last guess
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
			// Game over no Guess to accept
			// prevent submission button


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