<?php
include('includes/header.php');
include('includes/navbar.php');
include('config.php');

$query = "SELECT * FROM 3rd_year_2nd_semester";
$query_run = $connection->query($query); // Using PDO query method

?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="registered_course3rdc2ndsem.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label>Course code</label>
                        <input type="text" name="coursecode" class="form-control" placeholder="Course code">
                    </div>
                    <div class="form-group">
                        <label>Course name</label>
                        <input type="text" name="coursename" class="form-control" placeholder="Course nme">
                    </div>
                    <div class="form-group">
                        <label>Grade</label>
                        <input type="text" name="grade" class="form-control" placeholder="grade">
                    </div>
                    <div class="form-group">
                        <label>Instructor</label>
                        <input type="text" name="instructor" class="form-control" placeholder="Instructor">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All course
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                    Add course detailss
                </button>
            </h6>
        </div>

        <div class="card-body">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search course..." aria-label="Search course" aria-describedby="button-addon2" id="searchInput" style="max-width: 250px;">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="button-addon2">Search</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Course code </th>
                            <th>Course name</th>
                            <th>Grade</th>
                            <th>Instructor</th>
                            <th>EDIT </th>
                            <th>DELETE </th>
                        </tr>
                    </thead>
                    <tbody id="courseTableBody">
                        <?php
                        $query = "SELECT * FROM 3rd_year_2nd_semester";
                        $query_run = $connection->query($query); // Using PDO query method

                        if ($query_run) {
                            while ($row = $query_run->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <tr>
                                    <td class="course-code"><?php echo $row['course_code']; ?></td>
                                    <td class="course-name"><?php echo $row['course_name']; ?></td>
                                    <td class="grade"><?php echo $row['grade']; ?></td>
                                    <td class="instructor"><?php echo $row['instructor']; ?></td>

                                    <td>
                                        <button type="button" class="btn btn-success edit-btn" data-toggle="modal" data-target="#editButton<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>" data-id-number="<?php echo $row['course_code']; ?>" data-lastname="<?php echo $row['course_name']; ?>" data-firstname="<?php echo $row['grade']; ?>" data-gender="<?php echo $row['instructor']; ?>">
                                            EDIT
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#deleteModal<?php echo $row['id']; ?>">
                                            DELETE
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete Student Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this student?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger confirm-delete" data-student-id="<?php echo $row['id']; ?>">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" modal fade" id="editButton<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Course Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="edit_course3rdc2ndsem.php" method="post">
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label>Course code</label>
                                                        <input type="text" name="course_code" class="form-control" value="<?php echo $row['course_code']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Course name</label>
                                                        <input type="text" name="course_name" class="form-control" value="<?php echo $row['course_name']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Grade</label>
                                                        <input type="text" name="grade" class="form-control" value="<?php echo $row['grade']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Instructor</label>
                                                        <input type="text" name="instructor" class="form-control" value="<?php echo $row['instructor']; ?>">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <input type="hidden" id="edit_id" name="edit_id" value="<?php echo $row['id']; ?>">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="edit_btn" class="btn btn-primary">Save</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                        <?php
                            }
                        } else {
                            echo "Error in query: " . $connection->errorInfo()[2];
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#courseTableBody tr');

        tableRows.forEach(row => {
            /*  const userId = row.querySelector('.user-id').textContent.toLowerCase(); */
            const courseCode = row.querySelector('.course-code').textContent.toLowerCase();
            const courseName = row.querySelector('.course-name').textContent.toLowerCase();
            const grade = row.querySelector('.grade').textContent.toLowerCase();
            const instructor = row.querySelector('.instructor').textContent.toLowerCase();

            if ( /* userId.includes(searchTerm) || */ courseCode.includes(searchTerm) || courseName.includes(searchTerm) || grade.includes(searchTerm) || instructor.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    $(document).ready(function() {
        // Handle confirmation modal
        $('.delete-btn').click(function() {
            var studentId = $(this).data('id');
            $('.confirm-delete').attr('data-student-id', studentId);
        });

        // Handle delete confirmation
        $('.confirm-delete').click(function() {
            var studentId = $(this).data('student-id');
            $.ajax({
                url: 'delete_course3rdc2ndsem.php',
                type: 'POST',
                data: {
                    delete_btn: true,
                    delete_id: studentId
                },
                success: function() {
                    // Reload the page or update the table using JavaScript
                    location.reload(); // Reloads the current page
                },
                error: function(error) {
                    console.log('Error:', error);
                    // Handle error as needed
                }
            });
        });
    });
</script>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>