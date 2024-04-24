<?php
include('config.php');


if (isset($_POST['registerbtn'])) {
    $courseCode = $_POST['coursecode'];
    $courseName = $_POST['coursename'];
    $hours = $_POST['hours'];


    // Use prepared statements to prevent SQL injection
    $query = "INSERT INTO midyear(course_code, course_name, hours) VALUES (:courseCode, :courseName, :hours)";
    $stmt = $connection->prepare($query);

    // Bind parameters
    $stmt->bindParam(':courseCode', $courseCode);
    $stmt->bindParam(':courseName', $courseName);
    $stmt->bindParam(':hours', $hours);



    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['success'] = "Course added successfully";
    } else {
        $_SESSION['status'] = "Course registration failed";
    }

    header('Location: midyear.php');
}
