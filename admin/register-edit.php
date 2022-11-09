<?php include('authentication.php'); ?>
<?php include('middleware/superadminAuth.php'); ?>
<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Users</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User</h4>
                </div>

                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $user_id = $_GET['id'];
                        $users = "SELECT * FROM users  WHERE id = '$user_id'";
                        $users_run = mysqli_query($con, $users);

                        if (mysqli_num_rows($users_run) > 0) {
                            foreach ($users_run as $user) {
                    ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?php echo $user['id']  ?>" />
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">First Name</label>
                                            <input type="text" name="fname" value="<?php echo $user['fname']; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Last Name</label>
                                            <input type="text" name="lname" value="<?php echo $user['lname']; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Email Address</label>
                                            <input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Password</label>
                                            <input type="text" name="password" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Role as</label>
                                            <select name="role_as" required class="form-conmtrol">
                                                <option value="">---Select Role----</option>
                                                <option value="1" <?php echo $user['role_as'] == '1' ? 'selected' : '' ?>>Admin</option>
                                                <option value="0" <?php echo $user['role_as'] == '0' ? 'selected' : '' ?>>User</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" <?php echo $user['status'] == '1' ? 'checked' : '' ?> width="70px" height="70px" />
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            }
                        } else {
                            ?>
                            <h4>No Record Found</h4>
                    <?php
                        }
                    } else {
                    }


                    ?>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include('includes/footer.php');  ?>
<?php include('includes/scripts.php');  ?>