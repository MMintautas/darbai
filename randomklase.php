<?php
  // Game ending conditions
  $bHasWinnner = false;
  $bIsTied = false;
  $cWinner = '';
  $caSquare = array('','','','','','','','','');
  if (isset($_POST["SubmitButton"])) {
    for ($i = 0; $i < 9; ++$i) {
      $caSquare[$i]=$_POST["Square".$i];
    }

    // Win conditions are designated by 8 arithmetic sequences
    // The first of each sub array is the difference
    // and each entry after it is the start.
    $iaaWins = array(array(1,0,3,6), array(2,2), array(3,0,1,2), array(4,0));
    // Check for a winner
    for ($i = 0; $i < 4; $i++) {
      $iDiff = $iaaWins[$i][0];
      $iLength = count($iaaWins[$i]);
      for ($j = 1; $j < $iLength; $j++) {
        $iStart = $iaaWins[$i][$j];
        // If all three spaces are the same and not empty, then there is a winner.
        if ($caSquare[$iStart] != '') {
          if (($caSquare[$iStart] == $caSquare[$iStart + $iDiff]) &&
	          ($caSquare[$iStart] == $caSquare[$iStart + 2*$iDiff])) {
            $bHasWinnner = true;
            $cWinner = $caSquare[$iStart];
          }
        }
      }
    }
    // Add in the other players move. Check for erroneous input
    // Check for a tie game
    if (!$bHasWinnner) {
      $bTieCheck = true;
      for ($i = 0; $i < 9; $i++) {
        if ($caSquare[$i] == '') {
          $bTieCheck = false;
        }
      }
      $bIsTied = $bTieCheck;
      if ($bIsTied) {
        printf('<div id="idMessage">%s</div>', "Tie game!");
      } else {
        printf('<div id="idMessage">%s</div>', "Tic Tac Toe");
      }
    } else {
      printf('<div id="idMessage">%s Wins!</div>', $cWinner);
    }
  } else {
    printf('<div id="idMessage">%s</div>', "Tic Tac Toe");
  }
?>

<!DOCTYPE>
<html>
  <head>
    <title>Tic Tac Toe</title>
    <style type="text/css">
      #idMessage {
        color : #EEEEEE;
	    background-color : #444444;
	    width: 300px;
	    font-size: 40px;
	    font-family: arial;
	    text-align: center;
      }
      #idSquare {
        background-color : #CCCCCC;
        border: 2px solid #444444;
        color: #00000;
        width: 100px;
        height: 100px;
        font-size: 66px;
        font-family: arial;
        text-align: center;
      }
      #idButton {
	    background-color : #EEEEEE;
	    border: 4px outset #CCCCCC;
	    width: 300px;
	    font-size: 40px;
	    font-family: arial;
	    text-align: center;
      }
    </style>
  </head>
  <body>
    <form name="TicTacToe" method="post"
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php
  for ($i = 0; $i <=8; $i++) {
    $sSquare = '<input type="text" name="Square%s" value="%s" id="idSquare">';
    printf($sSquare, $i, $caSquare[$i]);
    // Put an endline at the end of each row
    if ($i == 2 || $i == 5 || $i == 8) {
      printf('<br />');
    }
  }
  if ($bHasWinnner || $bIsTied) {
    $sThisFile = htmlspecialchars($_SERVER["PHP_SELF"]);
    printf('<input type="button" name="newgame" value="New Game"
      onclick="window.location.href=\''.$sThisFile.'\'" id="idButton">');
  } else {
    printf('<input type="submit" name="SubmitButton" value="Move" id="idButton">');
  }
?>
    </form>
  </body>
</html>