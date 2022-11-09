<?php
include('includes/config.php');

if (isset($_GET['title'])) {
    $slug = mysqli_real_escape_string($con, $_GET['title']);
    $category = "SELECT slug, meta_title, meta_description, meta_keyword FROM categories WHERE slug='$slug' AND status='0' LIMIT 1";
    $category_run = mysqli_query($con, $category);

    if (mysqli_num_rows($category_run) > 0) {
        $category_item =  mysqli_fetch_array($category_run);

        $page_title = $category_item['meta_title'];
        $meta_description = $category_item['meta_description'];
        $meta_keywords = $category_item['meta_keyword'];
    } else {
        $page_title = "Category Page";
        $meta_description = "Cateory Page description bloggin website";
        $meta_keywords = "php, html, css, laravel, react js";
    }
} else {
    $page_title = "Category Page";
    $meta_description = "Category Page description bloggin website";
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
                    $category = "SELECT id,slug FROM categories WHERE slug='$slug' AND status='0' LIMIT 1";
                    $category_run = mysqli_query($con, $category);

                    if (mysqli_num_rows($category_run) > 0) {
                        $category_item =  mysqli_fetch_array($category_run);
                        // echo $category_item['id'];
                        $category_id =   $category_item['id'];

                        $posts = "SELECT category_id, name, slug, created_at FROM posts WHERE category_id='$category_id' AND status='0'";
                        $posts_run = mysqli_query($con, $posts);
                        if (mysqli_num_rows($posts_run) > 0) {
                            foreach ($posts_run as $postItems) {
                ?>
                                <a href="post.php?title=<?php echo $postItems['slug']; ?>" class="text-decoration-none">
                                    <div class="card card-body shadow-sm mb-4">
                                        <h5><?php echo $postItems['name']; ?></h5>
                                        <div>
                                            <label class="text-dark me-2">Posted On: <?php echo date('d-M-Y', strtotime($postItems['created_at'])); ?></label>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            }
                        } else {
                            ?>
                            <h4>No Post Available</h4>
                        <?php
                        }
                    } else {
                        ?>
                        <h4>No Such Category Found</h4>
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
                        Advertise Area
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