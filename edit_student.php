<?php
session_start();
include('config.php');
if (isset($_POST['edit_btn'])) {
    $edit_id = $_POST['edit_id'];
    $edit_IDNo = $_POST['edit_IDNo'];
    $edit_lname = $_POST['edit_lname'];
    $edit_fname = $_POST['edit_fname'];
    $edit_time_in = $_POST['edit_time_in'];
    $edit_time_out = $_POST['edit_time_out'];


    $query = "UPDATE students SET id_number=?, lastname=?, firstname=?, time_in=?, time_out=? WHERE id=?";
    $stmt = mysqli_prepare($connection, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ssssii', $edit_IDNo, $edit_lname, $edit_fname, $edit_time_in, $edit_time_out, $edit_id);


    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo '<script type="text/javascript">alert("Data Updated"); window.location="register.php";</script>';
    } else {
        echo '<script type="text/javascript">alert("Data Not Updated"); window.location="404.html";</script>';
    }

    mysqli_stmt_close($stmt);
}
