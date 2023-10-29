<?php
session_start();
  if (isset($_SESSION['error'])) {
    echo "<p class='muted'> ".$_SESSION['error'] ."</p>";
  }
  include_once('views/shares/header.php');
?>

<!-- <main id="main" class="main">

  <form method="post" action="?r=login">
    <div class="mb-3">
      <label for="username" class="form-label">UserName:</label>
      <input required type="text" class="form-control" name="username" id="username">

    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password:</label>
      <input required type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form> -->


  <section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Login to your account</h2>
                    <form method="POST" action="?r=login">
                        <input type="text" placeholder="UserName" name="username" />
                        <input type="password" placeholder="Password" name="password" />
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" name="btn-login" value="Login">
                        </div>
                    </form>
                </div>
                <!--/login form-->
            </div>
        </div>
    </div>
</section>

  <?php
  include_once('views/shares/footer.php');
  ?>

