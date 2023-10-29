<?php
session_start();
  if (isset($_SESSION['error'])) {
    echo "<p class='muted'> ".$_SESSION['error'] ."</p>";
  }
  include_once('views/shares/header.php');
?>



  <!-- form singup -->
<form method="POST" action="?r=register" style="width: 40%">
    <div class="form-group row">
        <label for="username" class="col-sm-2 form-control-label" style="padding-left: 5px;">UserName </label>
        <div class="col-sm-10">
            <input  required type="text" class="form-control" name="username" placeholder="User Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 form-control-label" style="padding-left: 5px;">Email </label>
        <div class="col-sm-10">
            <input required type="email" class="form-control" name="email" placeholder="Email">
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-2 form-control-label" style="padding-left: 5px;">Password </label>
        <div class="col-sm-10">
            <input required type="password" class="form-control" name="password" placeholder="Password">
        </div>
    </div>
    <!--  -->
    <div class="form-group row">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="btn-signup" value="Sign Up">
        </div>
    </div>
</form>

  <?php
  include_once('views/shares/footer.php');
  ?>