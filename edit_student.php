<?php
include('config.php');

if (isset($_POST['edit_btn'])) {
    $edit_id = $_POST['edit_id'];
    $edit_IDNo = $_POST['edit_IDNo'];
    $edit_lname = $_POST['edit_lname'];
    $edit_fname = $_POST['edit_fname'];
    $edit_gender = $_POST['edit_gender'];
    $edit_course = $_POST['edit_course'];
    $edit_status = $_POST['edit_status'];
    $edit_time_in = $_POST['edit_time_in'];
    $edit_time_out = $_POST['edit_time_out'];

    try {
        $query = "UPDATE students SET id_number=?, lastname=?, firstname=?, gender=?, course=?, status=?, time_in=?, time_out=? WHERE id=?";
        $stmt = $connection->prepare($query);
        $stmt->execute([$edit_IDNo, $edit_lname, $edit_fname, $edit_gender, $edit_course, $edit_status, $edit_time_in, $edit_time_out, $edit_id]);

        echo '<script type="text/javascript">alert("Data Updated"); window.location="register.php";</script>';
    } catch (PDOException $e) {
        echo '<script type="text/javascript">alert("Data Not Updated"); window.location="404.html";</script>';
    }
}
