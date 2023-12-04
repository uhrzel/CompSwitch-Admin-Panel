<?php
include('includes/header.php');
include('includes/navbar.php');
include('config.php');
$query = "SELECT * FROM students";
$query_run = mysqli_query($connection, $query);
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="registered_student.php" method="POST">

        <div class="modal-body">
          <div class="form-group">
            <label>Student ID</label>
            <input type="text" name="IDNo" class="form-control" placeholder="Student No">
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control">
              <option value="male">Male</option>
              <option value="female">Female</option>

            </select>
          </div>
          <div class="form-group">
            <label>Course</label>
            <select name="course" class="form-control">
              <option value="BSHM">BSHM</option>
              <option value="BSIT">BSIT</option>
              <option value="BSCE">BSCE</option>
              <option value="BSTM">BSTM</option>
              <option value="BSEDUC">BSEDUC</option>
              <option value="BSBA">BSBA</option>
            </select>
          </div>
          <div class="form-group">
            <label>Time In</label>
            <input type="datetime-local" name="time_in" class="form-control">
          </div>

          <div class="form-group">
            <label>Time Out</label>
            <input type="datetime-local" name="time_out" class="form-control">
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
      <h6 class="m-0 font-weight-bold text-primary">All Students
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
          Add Students
        </button>
      </h6>
    </div>
    
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> Student ID </th>
              <th>Fullname</th>
              <th>Gender</th>
              <th>Course</th>
              <th>Status</th>
              <th>Time in</th>
              <th>Time out</th>
              <th>EDIT </th>
              <th>DELETE </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM students";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <tr>
                  <td><?php echo $row['id_number']; ?></td>
                  <td><?php echo $row['lastname'] . ' ' . $row['firstname']; ?></td>
                  <td><?php echo $row['gender']; ?></td>
                  <td><?php echo $row['course']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td><?php echo date('h:i A', strtotime($row['time_in'])); ?></td>
                  <td><?php echo date('h:i A', strtotime($row['time_out'])); ?></td>
                  <td>
                    <button type="button" class="btn btn-success edit-btn" data-toggle="modal" data-target="#editButton<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>" data-id-number="<?php echo $row['id_number']; ?>" data-lastname="<?php echo $row['lastname']; ?>" data-firstname="<?php echo $row['firstname']; ?>" data-gender="<?php echo $row['gender']; ?>" data-course="<?php echo $row['course']; ?>" data-time-in="<?php echo date('Y-m-d\TH:i:s', strtotime($row['time_in'])); ?>" data-time-out="<?php echo date('Y-m-d\TH:i:s', strtotime($row['time_out'])); ?>">
                      EDIT
                    </button>
                  </td>
                  <td>
                    <form action="delete.php" method="post">
                      <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                    </form>
                  </td>
                </tr>

                <div class="modal fade" id="editButton<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Student Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="edit_student.php" method="POST">

                        <div class="modal-body">
                          <!-- Pass the data you want to edit to the form fields -->
                          <div class="form-group">
                            <label>Student ID</label>
                            <input type="text" name="edit_IDNo" class="form-control" value="<?php echo $row['id_number']; ?>">
                          </div>
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="edit_lname" class="form-control" value="<?php echo $row['lastname']; ?>">
                          </div>
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="edit_fname" class="form-control" value="<?php echo $row['firstname']; ?>">
                          </div>
                          <div class="form-group">
                            <label>Gender</label>
                            <select name="edit_gender" class="form-control">
                              <option value="male">Male</option>
                              <option value="female">Female</option>

                            </select>
                          </div>
                          <div class="form-group">
                            <label>Course</label>
                            <select name="edit_course" class="form-control">
                              <option value="course1">BSHM</option>
                              <option value="course2">BSIT</option>
                              <option value="course1">BSCE</option>
                              <option value="course2">BSTM</option>
                              <option value="course1">BSEDUC</option>
                              <option value="course2">BSBA</option>
                            </select>
                          </div>

                          <!-- New inputs for Time In and Time Out -->
                          <div class="form-group">
                            <label>Time In</label>
                            <input type="datetime-local" name="edit_time_in" class="form-control" value="<?php echo date('Y-m-d\TH:i:s', strtotime($row['time_in'])); ?>">
                          </div>

                          <div class="form-group">
                            <label>Time Out</label>
                            <input type="datetime-local" name="edit_time_out" class="form-control" value="<?php echo date('Y-m-d\TH:i:s', strtotime($row['time_out'])); ?>">
                          </div>

                        </div>
                        <div class="modal-footer">
                          <input type="hidden" id="edit_id" name="edit_id" value="">
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
              echo "Error in query: " . mysqli_error($connection);
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/t1fqsL72Yz1Y67Bv9Dj1T0M3xPjS9QFqF4b4M=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    $('.edit-btn').on('click', function() {
      var idNumber = $(this).data('id-number');
      var lastname = $(this).data('lastname');
      var firstname = $(this).data('firstname');
      var gender = $(this).data('gender');
      var course = $(this).data('course');
      var timeIn = $(this).data('time-in');
      var timeOut = $(this).data('time-out');
      var editId = $(this).data('id');
      $('#editButton').modal('show');

      $('#edit_IDNo').val(idNumber);
      $('#edit_lname').val(lastname);
      $('#edit_fname').val(firstname);
      $('#edit_gender').val(gender);
      $('#edit_course').val(course);
      $('#edit_time_in').val(timeIn);
      $('#edit_time_out').val(timeOut);
      $('#edit_id').val(editId);

    });
  });
</script>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>