<?php
session_start();
if (isset($_SESSION['error'])) {
    echo "<p class='muted'> " . $_SESSION['error'] . "</p>";
}
include_once('views/shares/admin/header.php');
?>

<main id="main" class="main">

    <form method="post" action="?r=admin/register">


    
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input required type="text" class="form-control" name="name" id="name">

        </div>
        <div class="mb-3">
            <label for="username" class="form-label">UserName:</label>
            <input required type="text" class="form-control" name="username" id="username">

        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input required type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="comfirm_pass" class="form-label">Confirm Password:</label>
            <input required type="password" class="form-control" id="confirm_pass" name="confirm_pass">
        </div>
        <?php
        if (isset($_SESSION['error'])) {
        ?>
            <div class="col-12">
                <p class="text-danger">
                    <?php echo $_SESSION['error'];
                    unset($_SESSION['error']); ?>
                </p>
            </div>
        <?php
        }
        ?>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <?php
    include_once('views/shares/admin/footer.php');
    ?>