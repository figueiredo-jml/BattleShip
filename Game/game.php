<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../../index.html');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Battle Ships</title>

    <!-- Menu -->
    <?php include('/var/www/html/includes/menu.php')?>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../plugins/bootstrap-datepicker/locales/gjquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugins/bootstrap-datepicker/css/gbootstrap.min.css">
    <!--integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <script src="../js/app.js" charset="utf-8"></script>
    <script data-main="../js/app.js" src="../js/require.js"></script>
  </head>
  <body>

  <br>

    <div class="container-fluid">
      <div class="row justify-content-md-center align-items-center">
        <div class="col-2" >
          <div class="panel">
            <div class="topPanel">
              <div class="smallPanel">
                Your Ships
              </div>
              <div class="grid-display">
                <div class="ship destroyer-container" draggable="true"><div id="destroyer-0"></div><div id="destroyer-1"></div></div>
                <div class="ship submarine-container" draggable="true"><div id="submarine-0"></div><div id="submarine-1"></div><div id="submarine-2"></div></div>
                <div class="ship cruiser-container" draggable="true"><div id="cruiser-0"></div><div id="cruiser-1"></div><div id="cruiser-2"></div></div>
                <div class="ship battleship-container" draggable="true"><div id="battleship-0"></div><div id="battleship-1"></div><div id="battleship-2"></div><div id="battleship-3"></div></div>
                <div class="ship carrier-container" draggable="true"><div id="carrier-0"></div><div id="carrier-1"></div><div id="carrier-2"></div><div id="carrier-3"></div><div id="carrier-4"></div></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3" >
          <div class="board1">
              <div class="smallBoard">
                Jogador 1
              </div>
            <div class="displays">
              <div class="top">
                <div class="grid grid-user"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-2" >
          <div class="panel">
            <div class="topPanel">
              <div class="layout">
                <div class="hidden-info">
                  <button class='buttons' id="start">Start Game</button>
                  <button class='buttons' id="rotate">Rotate Ships</button>
                  <button class='buttons' id="random">Set Random</button>
                  <button class='buttons' id="reset">Reset Ships</button>
                  <button class='buttons' id="multi">Multiplayer</button>
                  
                </div>
              </div>
            </div>
            <div class='console'>
              <span class='text'>
                <h3 id="whose-go">Your Go</h3>
                <h3 id="info"></h3>
              </span></div>
          </div>
        </div>
        <div class="col-3" >
          <div class="board2">
              <div class="smallBoard">
                Jogador 2
              </div>
            <div class="displays">
              <div class="bottom">
                <div class="grid grid-computer"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-2" >
          <div class="panel">
            <div class="topPanel">
              <div class="smallPanel">
                Enemy Ships
              </div>
              <div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
