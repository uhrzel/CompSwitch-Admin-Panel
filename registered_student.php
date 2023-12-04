<?php
include('config.php');

// Handle form submission to add a new student
if (isset($_POST['registerbtn'])) {
    $idNumber = $_POST['IDNo'];
    $lastName = $_POST['lname'];
    $firstName = $_POST['fname'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $status = 'pending'; // Static status
    $timeIn = $_POST['time_in'];
    $timeOut = $_POST['time_out'];

    $query = "INSERT INTO students (id_number, lastname, firstname, gender, course, status, time_in, time_out) VALUES ('$idNumber', '$lastName', '$firstName','$gender', '$course', '$status', '$timeIn', '$timeOut')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Student added successfully";
    } else {
        $_SESSION['status'] = "Student registration failed";
    }

    header('Location: register.php');
}
