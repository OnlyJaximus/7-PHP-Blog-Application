<?php include('authentication.php'); ?>
<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('message.php') ?>
            <div class="card">
                <div class="card-header">
                    <h4>View Posts
                        <a href="post-add.php" class="btn btn-danger float-end">Add Post</a>
                    </h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table id="myDataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $posts = "SELECT * FROM posts WHERE status !='2' ";
                                $posts = "SELECT p.*, c.name AS cname FROM posts p, categories c WHERE c.id = p.category_id AND p.status !='2';";
                                $posts_run = mysqli_query($con, $posts);
                                if (mysqli_num_rows($posts_run) > 0) {
                                    foreach ($posts_run as $post) {
                                ?>
                                        <tr>
                                            <td><?php echo $post['id']; ?></td>
                                            <td><?php echo $post['name']; ?></td>
                                            <td><?php echo $post['cname']; ?></td>
                                            <td>
                                                <?php //echo $post['image']; 
                                                ?>
                                                <?php if ($post['image'] != NULL) : ?>
                                                    <img src="../uploads/posts/<?php echo $post['image']; ?>" width="60px" height="60px" alt="">
                                                <?php else : ?>
                                                    <img src="../uploads/posts/no-img.png" width="60px" height="60px" alt="">
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $post['status'] == '1' ? 'Hidden' : 'Visible'; ?></td>
                                            <td>
                                                <a href="post-edit.php?id=<?php echo $post['id'] ?>" class="btn btn-success">Edit</a>
                                            </td>

                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button name="post_delete_btn" value="<?php echo $post['id']  ?>" class="btn btn-danger">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    <?php

                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>
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