<?php 
// Define the academic years to display
$sql_years = "SELECT DISTINCT date_graduated FROM reservists GROUP BY date_graduated ASC";
$result_years = $conn->query($sql_years);
$years = array();
if ($result_years->num_rows > 0) {
    while($row_years = $result_years->fetch_assoc()) {
        $academic_years[] = $row_years["date_graduated"];
    }
}

$total_years = count($academic_years);
// query school names from school table
$sql_schools = "SELECT * FROM schools";
$result_schools = $conn->query($sql_schools);
$schools = array();
if ($result_schools->num_rows > 0) {
    while($row_schools = $result_schools->fetch_assoc()) {
        $schools[$row_schools["school_id"]] = $row_schools["acronym"];
    }
}

// // Define the schools to display
// $schools = array('School A', 'School B', 'School C');

// Query the database to retrieve the student data
$sql = "SELECT schools.acronym, date_graduated, sex, COUNT(*) as count FROM reservists INNER JOIN SCHOOLS ON reservists.school_id = schools.school_id GROUP BY schools.acronym, date_graduated, sex";
$result = $conn->query($sql);

// Initialize the table
$table = array();

// Loop through the result set and populate the table
while ($row = $result->fetch_assoc()) {
    $school = $row['acronym'];
    $year = $row['date_graduated'];
    $sex = $row['sex'];
    $count = $row['count'];

    // Initialize the row if it doesn't exist
    if (!isset($table[$school])) {
        $table[$school] = array();
    }

    // Initialize the column if it doesn't exist
    if (!isset($table[$school][$year])) {
        $table[$school][$year] = array('male' => 0, 'female' => 0);
    }

    // Add the count to the appropriate column
    if ($sex == 'Male') {
        $table[$school][$year]['male'] += $count;
    } else {
        $table[$school][$year]['female'] += $count;
    }
}

?>
<div class="card-header">
    <h5 class="card-title mb-0 text-center">Total Number of ROTC Graduates each School by Sex</h5>
</div>

<div class="card-body py-1">
    <div class="table-responsive">

    <table class="table">
      <thead>
        <tr>
            <th scope="col">SCHOOL</th>
        <?php
            foreach ($academic_years as $year) {
                echo "<th>$year</th>";
            }
        ?>
        </tr>
      </thead>

      <tbody>
            <?php
            foreach ($schools as $school) {
                echo "<tr><th>$school</th>";
                foreach ($academic_years as $year) {
                    $male_count = isset($table[$school][$year]['male']) ? $table[$school][$year]['male'] : 0;
                    $female_count = isset($table[$school][$year]['female']) ? $table[$school][$year]['female'] : 0;
                    echo "<td>$male_count | $female_count</td>";
                }
                echo "</tr>";
            }
            ?>
      </tbody>
      <tfoot>
        <tr>
            <td colspan="<?php echo $total_years + 1?>" class="text-center">MALE | FEMALE</td>
        </tr>
      </tfoot>
    </table>
    </div>
</div>
