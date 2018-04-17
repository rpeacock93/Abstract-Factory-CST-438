<?php 

	class boardClass {
		public function Draw_Table($intPlayerX, $intPlayerY, $intHurkleX, $intHurkleY, $intPlayerScore, $intPlayerMoves){
			#Displays the game board and scoreboard.
			
			$intYCounter = 0;
			$intXCounter = 0;
			$intHurkleXDistance = 0;
			$intHurkleYDistance = 0;
			
			if (($intHurkleX == $intPlayerX) and ($intHurkleY == $intPlayerY)) {
				if (($intPlayerX != 0) and ($intPlayerY != 0)) {
					echo "<h3>You've found the Hurkle!  </h3></br>";
				}
			} else {
				# Give hint for the distance and direction.
				echo "<h3> You hear the Hurkle somewhere ";
				$intHurkleYDistance = abs($intHurkleY - $intPlayerY);
				$intHurkleXDistance = abs($intHurkleX - $intPlayerX);
				if (($intHurkleXDistance > 6) or ($intHurkleYDistance > 6)) {
					echo "far";
				} elseif (($intHurkleXDistance < 3) and ($intHurkleYDistance < 3)) {
					echo "very close";
				}
				echo " to the ";
				if ($intHurkleY > $intPlayerY) {
					echo "south";
				} elseif ($intHurkleY < $intPlayerY) {
					echo "north";
				}
				if ($intHurkleX < $intPlayerX) {
					echo "west";
				} elseif ($intHurkleX > $intPlayerX) {
					echo "east";
				}
				echo " of you.</h3>";
			}

			echo "<h2 class='hint'>Player Score:<span class='score'> ", $intPlayerScore, "</span>";
			echo "&nbsp; Player Moves Remaining: <span class='score'> ", 7 - $intPlayerMoves, "</span> </h2> <br>";
		
			# Draw the table.
			echo "<table id=\"table1\" border=\"1\">";
			for ($intYCounter=0; $intYCounter<=10; $intYCounter++) {
				echo "<tr>";
				for ($intXCounter=0; $intXCounter<=10; $intXCounter++) {
					if ($intYCounter == 0) {
						echo "<td align=\"center\" class=\"border tile\">", print_r($intXCounter,1), "</td>";
					} elseif ($intXCounter == 0) {
						echo "<td align=\"center\" class=\"border tile\">", print_r($intYCounter,1), "</td>";
					} elseif (($intXCounter == $intPlayerX) and ($intYCounter == $intPlayerY)) {
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
			
			# Draw the scoreboard.
			# echo "</br>";
			# echo "</br>Hurkle X: ", $intHurkleX;
			# echo "</br>Hurkle Y: ", $intHurkleY;
			# echo "</br>Player X: ", $intPlayerX;
			# echo "</br>Player Y: ", $intPlayerY;
			# echo "</br>Player Moves: ", $intPlayerMoves;
			# echo "</br></br>";
		}
	}

 ?>
