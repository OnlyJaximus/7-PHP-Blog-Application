<?php
session_start();
include('admin/config/dbcon.php');

if (isset($_POST['login_btn'])) {
    $login_email = mysqli_escape_string($con, $_POST['login_email']);
    $login_password = mysqli_escape_string($con, $_POST['login_password']);

    $login_query = "SELECT * FROM users WHERE  email = '$login_email' AND password='$login_password' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        foreach ($login_query_run as $data) {
            $user_id = $data['id'];
            $user_name = $data['fname'] . ' ' . $data['lname'];
            $user_email = $data['email'];
            $role_as = $data['role_as'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as"; //1=admin, 0=user, 2=superadmin
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
        ];

        if ($_SESSION['auth_role'] == '1') { // 1= admin
            $_SESSION['message'] = "Welcome to Admin dashboard";
            header('Location:  admin/index.php');
            exit(0);
        } elseif ($_SESSION['auth_role'] == '2') { // 2= Super Admin
            $_SESSION['message'] = "Welcome to Super Admin dashboard";
            header('Location:  admin/index.php');
            exit(0);
        } elseif ($_SESSION['auth_role'] == '0') {  // 0 = user
            $_SESSION['message'] = "You are Logged In";
            header('Location: index.php');
            exit(0);
        } else {
            $_SESSION['message'] = "You are Logged In";
            header('Location: index.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid Email or Password";
        header('Location: login.php');
        exit(0);
    }
} else {
    $_SESSION['message'] = "You are not allowed to access this file!";
    header('Location: login.php');
    exit(0);
}
