<div id="layoutSidenav_nav">
    <?php echo $page  = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1); ?>

    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>

                <a class="nav-link <?php echo $page == 'index.php' ? 'active' : '' ?>" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                    <?php // echo $page  = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1); 
                    ?>
                </a>

                <?php //if ($_SESSION['auth_role'] == "2") :
                ?>
                <a class="nav-link  <?php echo $page == 'view-register.php' ? 'active' : '' ?> " href="view-register.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Registered Users
                </a>
                <? // php endif
                ?>
                <div class="sb-sidenav-menu-heading">Interface</div>

                <!--   Category -->
                <a class="nav-link collapsed <?php echo $page == 'category-add.php' || $page == 'category-view.php' || $page == 'category-edit.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?php echo $page == 'category-add.php' || $page == 'category-view.php' || $page == 'category-edit.php' ? 'show' : '' ?> " id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?php echo $page == 'category-add.php' ? 'active' : '' ?>" href="category-add.php">Add Category</a>
                        <a class="nav-link <?php echo $page == 'category-view.php' || $page == 'category-edit.php' ? 'active' : '' ?>" href="category-view.php">View Category</a>
                    </nav>
                </div>

                <!--  Posts -->
                <a class="nav-link collapsed  <?php echo $page == 'post-add.php' || $page == 'post-view.php' || $page == 'post-edit.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost" aria-expanded="false" aria-controls="collapsePost">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Posts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse  <?php echo $page == 'post-add.php' || $page == 'post-view.php' || $page == 'post-edit.php' ? 'show' : '' ?> " id="collapsePost" aria-labelledby="Posts" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?php echo $page == 'post-add.php' ? 'active' : '' ?>" href="post-add.php">Add Post</a>
                        <a class="nav-link <?php echo $page == 'post-view.php' || $page == 'post-edit.php' ? 'active' : '' ?>" href="post-view.php">View Post</a>
                    </nav>
                </div>


                <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a> -->
                <!-- <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div> -->

                <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->

                <!-- <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> -->
            </div>
        </div>
        <div class="sb-sidenav-footer mb-4">
            <div class="small">Logged in as:</div>
            <?php if (isset($_SESSION['auth_user'])) : ?>
                <?php echo $_SESSION['auth_user']['user_name']; ?>
            <?php endif; ?>
        </div>

    </nav>
</div>
