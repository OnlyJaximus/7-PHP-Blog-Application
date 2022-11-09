<?php include('includes/config.php'); ?>

<?php
if (isset($_GET['title'])) {

    $slug = mysqli_real_escape_string($con, $_GET['title']);

    $meta_posts = "SELECT slug, meta_title, meta_description, meta_keyword FROM posts WHERE slug='$slug' LIMIT 1";
    $meta_post_item = mysqli_query($con,  $meta_posts);

    if (mysqli_num_rows($meta_post_item) > 0) {

        $metaPostItem =  mysqli_fetch_array($meta_post_item);

        $page_title = $metaPostItem['meta_title'];
        $meta_description = $metaPostItem['meta_description'];
        $meta_keywords = $metaPostItem['meta_keyword'];
    } else {
        $page_title = "Post Page";
        $meta_description = "PostPage description bloggin website";
        $meta_keywords = "php, html, css, laravel, react js";
    }
} else {
    $page_title = "Post Page";
    $meta_description = "Post Page description bloggin website";
    $meta_keywords = "php, html, css, laravel, react js";
}

?>


<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php
                if (isset($_GET['title'])) {


                    $slug = mysqli_real_escape_string($con, $_GET['title']);
                    $posts = "SELECT * FROM posts WHERE slug='$slug'";

                    $posts_run = mysqli_query($con,  $posts);

                    if (mysqli_num_rows($posts_run) > 0) {

                        foreach ($posts_run as $postItems) {
                ?>
                            <div class="card shadow-sm mb-4">
                                <div class="card-header">
                                    <h5><?php echo $postItems['name']; ?></h5>
                                </div>
                                <div class="card-body ">
                                    <label class="text-dark me-2">Posted On: <?php echo date('d-M-Y', strtotime($postItems['created_at'])); ?></label>
                                    <hr>
                                    <?php if ($postItems['image'] != NULL) :  ?>
                                        <img src="uploads/posts/<?php echo $postItems['image'] ?>" class="w-25" alt="<?php echo $postItems['name']; ?>">
                                    <?php endif; ?>
                                    <div>
                                        <?php echo $postItems['description']; ?>
                                    </div>

                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <h4>No Such Post Found</h4>
                    <?php

                    }
                } else {
                    ?>
                    <h4>No Such URL Found</h4>
                <?php

                }

                ?>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Advertise Area</h4>
                    </div>
                    <div class="card-body">
                        Your Advertise
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>


<?php include('includes/footer.php') ?>