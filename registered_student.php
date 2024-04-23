<?php
include('config.php');


if (isset($_POST['registerbtn'])) {
    $courseCode = $_POST['coursecode'];
    $courseName = $_POST['coursename'];
    $grade = $_POST['grade'];
    $instructor = $_POST['instructor'];

    // Use prepared statements to prevent SQL injection
    $query = "INSERT INTO 1st_year_1st_semester (course_code, course_name, grade, instructor) VALUES (:courseCode, :courseName, :grade, :instructor)";
    $stmt = $connection->prepare($query);

    // Bind parameters
    $stmt->bindParam(':courseCode', $courseCode);
    $stmt->bindParam(':courseName', $courseName);
    $stmt->bindParam(':grade', $grade);
    $stmt->bindParam(':instructor', $instructor);



    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['success'] = "Course added successfully";
    } else {
        $_SESSION['status'] = "Course registration failed";
    }

    header('Location: register.php');
}
