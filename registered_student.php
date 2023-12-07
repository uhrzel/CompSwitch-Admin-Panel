<?php
include('config.php');


if (isset($_POST['registerbtn'])) {
    $idNumber = $_POST['IDNo'];
    $lastName = $_POST['lname'];
    $firstName = $_POST['fname'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $status = 'pending'; // Static status
    $timeIn = $_POST['time_in'];
    $timeOut = $_POST['time_out'];

    // Use prepared statements to prevent SQL injection
    $query = "INSERT INTO students (id_number, lastname, firstname, gender, course, status, time_in, time_out) VALUES (:idNumber, :lastName, :firstName, :gender, :course, :status, :timeIn, :timeOut)";
    $stmt = $connection->prepare($query);

    // Bind parameters
    $stmt->bindParam(':idNumber', $idNumber);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':course', $course);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':timeIn', $timeIn);
    $stmt->bindParam(':timeOut', $timeOut);

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['success'] = "Student added successfully";
    } else {
        $_SESSION['status'] = "Student registration failed";
    }

    header('Location: register.php');
}
