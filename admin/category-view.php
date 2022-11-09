<?php include('authentication.php'); ?>
<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('message.php') ?>
            <div class="card">
                <div class="card-header">
                    <h4>View Category
                        <a href="category-add.php" class="btn btn-danger float-end">Add Category</a>
                    </h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myDataTable" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <?php if ($_SESSION['auth_role'] == "2") : ?>
                                        <th>Delete</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $category = "SELECT * FROM categories WHERE status !='2'";
                                $query_run = mysqli_query($con, $category);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $item) {
                                ?>
                                        <tr>
                                            <td><?php echo $item['id'] ?></td>
                                            <td><?php echo $item['name'] ?></td>
                                            <td>
                                                <?php echo $item['status'] == '1' ? 'Hidden' : 'Visible' ?>
                                            </td>
                                            <td>
                                                <a href="category-edit.php?id=<?php echo $item['id']  ?>" class="btn btn-info">Edit</a>
                                            </td>
                                            <?php if ($_SESSION['auth_role'] == "2") : ?>
                                                <td>
                                                    <form action="code-superadmin.php" method="POST">
                                                        <button type="submit" name="category_delete" value="<?php echo $item['id']; ?>" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            <?php endif;
                                            ?>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    <tr>
                                    <?php
                                }
                                    ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');  ?>
<?php include('includes/scripts.php');  ?>