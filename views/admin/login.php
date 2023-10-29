<?php
session_start();
  if (isset($_SESSION['error'])) {
    echo "<p class='muted'> ".$_SESSION['error'] ."</p>";
  }
  include_once('views/shares/admin/header.php');
?>

<main id="main" class="main">

  <form method="post" action="?r=admin/login">
    <div class="mb-3">
      <label for="username" class="form-label">UserName:</label>
      <input required type="text" class="form-control" name="username" id="username">

    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password:</label>
      <input required type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>

  <?php
  include_once('views/shares/admin/footer.php');
  ?>