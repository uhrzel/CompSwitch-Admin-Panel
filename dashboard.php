<?php
include('includes/header.php');
include('includes/navbar.php');

// Include database connection from config.php
include('config.php');

// Function to count rows in a table
function countRows($connection, $table)
{
  $sql = "SELECT COUNT(*) AS count FROM $table";
  $stmt = $connection->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result['count'];
}

// Array of semester tables including 'midyear'
$semesterTables = [
  "1st_year_1st_semester",
  "1st_year_2nd_semester",
  "2nd_year_1st_semester",
  "2nd_year_2nd_semester",
  "3rd_year_1st_semester",
  "3rd_year_2nd_semester",
  "4th_year_1st_semester",
  "4th_year_2nd_semester",
  "midyear"
];

$totalCourses = 0;
$years = [];
foreach ($semesterTables as $table) {
  $totalCourses += countRows($connection, $table);
  preg_match("/(\d+)/", $table, $matches);
  if (!empty($matches)) {
    $years[] = $matches[0];
  }
}

$totalYears = count(array_unique($years)) + 1;

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Semesters</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <h4><?php echo count($semesterTables); ?></h4>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Years</div>
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalYears; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Courses</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalCourses; ?></div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="<?php echo $totalCourses; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>