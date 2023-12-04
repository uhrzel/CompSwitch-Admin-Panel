<?php

include('config.php');

// Handle delete operation
if (isset($_POST['delete_btn'])) {
    $delete_id = $_POST['delete_id'];

    $delete_query = "DELETE FROM students WHERE id = '$delete_id'";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['success'] = "Student deleted successfully";
    } else {
        $_SESSION['status'] = "Error deleting student";
    }

    header('Location: register.php');
}

// Fetch data from the students table
$query = "SELECT * FROM students";
$query_run = mysqli_query($connection, $query);
