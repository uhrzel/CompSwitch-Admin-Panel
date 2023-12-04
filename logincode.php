<?php
session_start();
include('config.php');

if (isset($_POST['login_btn'])) {
    $username = $_POST['uname'];
    $password = $_POST['passwordd'];

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run) > 0) {
        // Valid user, set session and redirect
        $user_data = mysqli_fetch_assoc($query_run);
        $_SESSION['user_id'] = $user_data['id'];
        header('Location: dashboard.php');
    } else {
        $_SESSION['status'] = 'Invalid email or password';
        header('Location: login.php'); // Redirect to login page
    }
}
