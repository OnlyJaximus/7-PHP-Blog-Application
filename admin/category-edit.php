<?php include('authentication.php'); ?>
<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('message.php') ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category
                        <a href="category-view.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $category_id = $_GET['id'];
                    }
                    $category_edit = "SELECT * FROM categories where id = '$category_id' LIMIT 1";
                    $category_run =  mysqli_query($con,  $category_edit);
                    if (mysqli_num_rows($category_run) > 0) {
                        $row = mysqli_fetch_array($category_run);
                    ?>
                        <form action="code.php" method="POST">
                            <input type="hidden" name="category_id" value="<?php echo $row['id']  ?>">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value=<?php echo $row['name'] ?> required class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Slug (URL)</label>
                                    <input type="text" name="slug" value=<?php echo $row['slug'] ?> required class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" required class="form-control" rows="4"><?php echo $row['description'] ?>  </textarea>


                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Meta Title</label>
                                    <textarea name="meta_title" required class="form-control" max="191"> <?php echo $row['meta_title'] ?> </textarea>


                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_description" required class="form-control" rows="4"><?php echo $row['meta_description'] ?></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea name="meta_keyword" required class="form-control" rows="4"><?php echo $row['meta_keyword'] ?></textarea>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="">Navbar Status</label><br>
                                    <input type="checkbox" name="navbar_status" <?php echo $row['navbar_status'] == '1' ? 'checked' : '' ?> width="70px" height="70px" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Status</label><br>
                                    <input type="checkbox" name="status" <?php echo $row['status'] == '1' ? 'checked' : '' ?> width="70px" height="70px" />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="category_update" class="btn btn-primary">Update Category</button>
                                </div>
                            </div>
                        </form>
                    <?php
                    } else {
                    ?>
                        <h4>No Record Found</h4>
                    <?php

                    }
                    ?>


                </div>
            </div>
        </div>

    </div>
</div>
<?php include('includes/footer.php');  ?>
<?php include('includes/scripts.php');  ?>