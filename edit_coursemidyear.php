<?php
include('config.php');

if (isset($_POST['edit_btn'])) {
    $edit_id = $_POST['edit_id'];
    $courseCode = $_POST['course_code'];
    $courseName = $_POST['course_name'];
    $hours = $_POST['hours'];

    try {
        $query = "UPDATE midyear SET course_code=?,course_name=?, hours=? WHERE id=?";
        $stmt = $connection->prepare($query);
        $stmt->execute([$courseCode, $courseName, $hours, $edit_id]);

        echo '<script type="text/javascript">alert("Data Updated"); window.location="midyear.php";</script>';
    } catch (PDOException $e) {
        echo '<script type="text/javascript">alert("Data Not Updated"); window.location="404.html";</script>';
    }
}
