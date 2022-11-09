<?php
include('includes/config.php');

$page_title = "Register Page";
$meta_description = "Register page description bloggin website";
$meta_keywords = "php, html, css, laravel, react js";
?>



<?php
include('includes/header.php');
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit(0);
}



include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <?php include('message.php'); ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="registercode.php" method="POST">
                            <div class=" form-group mb-3">
                                <label for="">First Name</label>
                                <input required type="text" placeholder="Enter Firstname" name="fname" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">First Name</label>
                                <input required type="text" placeholder="Enter  Lastname" name="lname" class="form-control">
                            </div>


                            <div class="form-group mb-3">
                                <label for="">Email Id</label>
                                <input required type="email" placeholder="Enter Email Address" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input required type="password" placeholder="Enter Password" name="password" class="form-control">
                            </div>


                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input required type="password" placeholder="Enter Confirm Password" name="cpassword" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button required type="submit" name="register_btn" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include('includes/footer.php') ?>