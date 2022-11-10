<div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="assets/images/cat2.png" class="w-100" style="height: 150px ; width: 150px;" alt="Blex of Web IT">
            </div>

            <div class="col-md-9">

            </div>
        </div>
    </div>

</div>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow sticky-top">
    <div class="container">
        <a class="navbar-brand d-block d-sm-none d-md-none" href="#"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>

                <?php
                $navbarCategory = "SELECT * FROM  categories WHERE navbar_status = '0' AND status = '0' ";
                $navbarCategory_run = mysqli_query($con, $navbarCategory);

                if (mysqli_num_rows($navbarCategory_run) > 0) {
                    foreach ($navbarCategory_run as $navItems) {
                ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="category.php?title=<?php echo $navItems['slug']; ?>"><?php echo $navItems['name']; ?></a>
                        </li>
                <?php
                    }
                }

                ?>


                <!-- *********    Dropdown ************* -->
                <?php if (isset($_SESSION['auth_user'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['auth_user']['user_name']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <?php if ($_SESSION['auth_role'] == "1" || $_SESSION['auth_role'] == "2") : ?>
                                <li><a class="dropdown-item" href="admin/index.php">My Profile</a></li>
                            <?php endif; ?>
                           
                            <li>
                                <form action="allcode.php" method="POST">
                                    <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                <?php else : ?>
                    <!-- Login & Register -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="register.php">Register</a>
                    </li>
                <?php endif; ?>
            </ul>

        </div>
    </div>
</nav>
