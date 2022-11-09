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
            <?php include('message.php') ?>
            <div class="card">
                <div class="card-header">
                    <h4>Registered User
                        <a href="register-add.php" class="btn btn-primary float-end">Add Admin</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th> Email</th>
                                <th> Role</th>
                                <th> Edit</th>
                                <th> Delete</th>
                            </tr>

                        <tbody>
                            <?php
                            $query = "SELECT * FROM users";
                            $qury_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($qury_run) > 0) {
                                foreach ($qury_run as  $row) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['fname'] ?></td>
                                        <td><?php echo $row['lname'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td>
                                            <?php
                                            if ($row['role_as'] == '1') {
                                                echo 'Admin';
                                            } elseif ($row['role_as'] == '0') {
                                                echo 'User';
                                            } elseif ($row['role_as'] == '2') {
                                                echo 'Super Admin';
                                            }
                                            ?>

                                        </td>
                                        <td><a href="register-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <button type="submit" name="user_delete" value="<?= $row['id'] ?>" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No Redcord Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        </thead>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php');  ?>
<?php include('includes/scripts.php');  ?>