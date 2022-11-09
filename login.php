<?php
include('includes/config.php');

$page_title = "Login Page";
$meta_description = "Login page description bloggin website";
$meta_keywords = "php, html, css, laravel, react js";
?>

<?php include('includes/header.php') ?>
<?php
if (isset($_SESSION['auth'])) {

    if (!isset($_SESSION['message'])) {
        $_SESSION['message'] = "You are already logged in";
    }
    header("Location: index.php");
    exit(0);
}

?>
<?php include('includes/navbar.php') ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">

                        <form action="logincode.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Email Id</label>
                                <input type="email" name="login_email" placeholder="Enter Email Address" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="login_password" placeholder="Enter Password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="login_btn" class="btn btn-primary">Login Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include('includes/footer.php') ?>