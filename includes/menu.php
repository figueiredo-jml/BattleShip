<?php
	include("db.php");

  $nome = $_SESSION['nome'];

?>

<div class="header">
  <p1 style="position: fixed; width:90%; text-align: right">Player <?=$_SESSION['nome']?></p1>
</div>
  <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
  <label for="openSidebarMenu" class="sidebarIconToggle">
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
  </label>
  <div id="sidebarMenu">
    <ul class="sidebarMenuInner">
      <li> <p><?=$_SESSION['nome']?></p></li>

      <?php

      $result = mysqli_query($mysqli, "SELECT nome, funcao FROM battlechips.accounts WHERE nome = '$nome' and funcao = 'Admin'");
      if (mysqli_num_rows($result) > 0) {

      echo '<li><a href="/Game/game.php">Play</a></li>';
      echo '<li><a href="/Admin_Area/Scoreboard/index.php">Scoreboard</a></li>';      
      echo '<li><a href="/Admin_Area/Admin/index.php">Admin Accounts</a></li>';
      echo '<li><a href="/Admin_Area/Client/index.php">Client Accounts</a></li>';

      echo '<br><br><br><br><br><br><br><br><br><br><br><br>';
      echo '<li><a href="/logout.php" class="logout">Logout</a></li>';
      } 

      ?>

      <?php

      $result = mysqli_query($mysqli, "SELECT nome, funcao FROM battlechips.accounts WHERE nome = '$nome' and funcao = 'Cliente'");
      if (mysqli_num_rows($result) > 0) {
      echo '<li><a href="/Game/game.php">Play</a></li>';
      echo '<li><a href="/Admin_Area/Scoreboard/index.php">Scoreboard</a></li>';      

      echo '<br><br><br><br><br><br><br><br><br><br><br><br>';
      echo '<li><a href="/logout.php" class="logout">Logout</a></li>';

      } 

      ?>

      
    </ul>
  </div>
