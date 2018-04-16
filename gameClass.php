<?php
	class gameClass {
		# Validate the position entry.
		public function evaluatePosition($intValue){
			if (($intValue < 1) or ($intValue > 10)) {
				echo "<h3>Player X position values must be between 1 and 10; setting to default (0).</h3>";
				return 0;
			} else {
				return $intValue;
			}
		}
		# Determine if the move counter should be incremented.
		public function evaluateMoves($intValue, $intXPos, $intYPos){
			if (($intXPos != 0) and ($intXPos != 0)){
				return ($intValue + 1);
			} else {
				return $intValue;
			}
		}
		# Determine if the player has won (by finding the Hurkle) or lost (by running out of guesses).
		public function evaluateWinLoss($intPlayerX, $intPlayerY, $intHurkleX, $intHurkleY, $intMoves){
			if (($intPlayerX == $intHurkleX) and ($intPlayerY == $intHurkleY)){
				if (($intPlayerX != 0) and ($intPlayerY != 0)){
					return 1;
				}
			} elseif ($intMoves >= 7){
				return 2;
			}
		}
	}
?>
