<?php
session_start();
include('config.php');

if (isset($_POST['login_btn'])) {
    $username = $_POST['uname'];
    $password = $_POST['passwordd'];

    try {
        $query = "SELECT * FROM admin WHERE username=:username AND password=:password";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Valid user, set session and redirect
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $user_data['id'];
            header('Location: dashboard.php');
        } else {
            $_SESSION['status'] = 'Invalid username or password';
            header('Location: login.php'); // Redirect to login page
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
