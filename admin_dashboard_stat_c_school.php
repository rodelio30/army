<?php 
// query academic years from student table
$sql_years = "SELECT DISTINCT date_graduated FROM reservists where school_id = '$public_school_id' GROUP BY date_graduated ASC";
$result_years = $conn->query($sql_years);
$years = array();
if ($result_years->num_rows > 0) {
    while($row_years = $result_years->fetch_assoc()) {
        $years[] = $row_years["date_graduated"];
    }
}

// query school names from school table
$sql_schools = "SELECT * FROM schools where school_id = '$public_school_id' ";
$result_schools = $conn->query($sql_schools);
$schools = array();
if ($result_schools->num_rows > 0) {
    while($row_schools = $result_schools->fetch_assoc()) {
        $schools[$row_schools["school_id"]] = $row_schools["acronym"];
    }
}
?>
<div class="card-header">
    <h5 class="card-title mb-0 text-center">Total Number of ROTC Graduates by School Year</h5>
</div>
<div class="card-body py-3">
  <div class="table-responsive">
    <table class="table">
      <thead>
          <tr>
              <th scope="col">SCHOOL</th>
              <?php 
              // header 
              foreach ($years as $year) {
                  echo "<th schope='col'>".$year."</th>";
              }
              ?> 
      </thead>
      <tbody>

      <?php
      echo "</tr>";
      foreach ($schools as $school_id => $school_name) {
          echo "<tr><th>".$school_name."</th>";
          foreach ($years as $year) {
              $sql_count = "SELECT COUNT(*) AS total FROM reservists WHERE school_id='".$school_id."' AND date_graduated='".$year."'";
              $result_count = $conn->query($sql_count);
              $row_count = $result_count->fetch_assoc();
              $total = $row_count["total"];
              echo "<td>".$total."</td>";
          }
          echo "</tr>";
      }
      ?>
      </tbody>
  </table>
  </div>
</div>