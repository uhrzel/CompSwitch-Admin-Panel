<?php
include('config.php');

// Handle delete operation
if (isset($_POST['delete_btn'])) {
    $delete_id = $_POST['delete_id'];

    try {
        $delete_query = "DELETE FROM 3rd_year_2nd_semester WHERE id = :delete_id";
        $stmt = $connection->prepare($delete_query);
        $stmt->bindParam(':delete_id', $delete_id);
        $stmt->execute();

        $_SESSION['success'] = "Student deleted successfully";
    } catch (PDOException $e) {
        $_SESSION['status'] = "Error deleting student: " . $e->getMessage();
    }

    header('Location: register3rdc2ndsem.php');
}

// Fetch data from the students table
$query = "SELECT * FROM 3rd_year_2nd_semester";
$query_run = $connection->query($query);
