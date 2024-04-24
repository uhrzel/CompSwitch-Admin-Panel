<?php
include('config.php');

if (isset($_POST['edit_btn'])) {
    $edit_id = $_POST['edit_id'];
    $courseCode = $_POST['course_code'];
    $courseName = $_POST['course_name'];
    $grade = $_POST['grade'];
    $instructor = $_POST['instructor'];


    try {
        $query = "UPDATE 3rd_year_1st_semester SET course_code=?,course_name=?, grade=?, instructor=? WHERE id=?";
        $stmt = $connection->prepare($query);
        $stmt->execute([$courseCode, $courseName, $grade, $instructor, $edit_id]);

        echo '<script type="text/javascript">alert("Data Updated"); window.location="register3rdc1stsem.php";</script>';
    } catch (PDOException $e) {
        echo '<script type="text/javascript">alert("Data Not Updated"); window.location="404.html";</script>';
    }
}
