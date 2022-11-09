<?php include('authentication.php');
include('middleware/superadminAuth.php');

// Delete Category
if (isset($_POST['category_delete'])) {
    $category_id = $_POST['category_delete'];

    // 0=visible, 1=hidden, 2=deleted
    $query = "UPDATE categories SET status = '2' WHERE id='$category_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Category Deleted Successfully";
        header("Location: category-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: category-view.php");
        exit(0);
    }
}
