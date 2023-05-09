 <?php 
    // This line below is to get data query for reservists school
    $sql_school ="SELECT count(*) as total, schools.acronym FROM reservists INNER JOIN schools ON reservists.school_id=schools.school_id where reservists.user_status != 'archive' group by schools.acronym;";
    $result_school = mysqli_query($conn,$sql_school);
    while ($row = mysqli_fetch_array($result_school)) { 
        // $month[]  = date_format(date_create( $row['TRANSDATE']),"M d, Y")  ;
        $school_total[]   = $row['total'];
        $school_acronym[] = $row['acronym'];
    }
  ?>
<div class="card-header text-center">
    <h5 class="card-title">Total Number of ROTC Graduates</h5>
</div>
<div class="card-body d-flex">
  <div class="align-self-center w-100 mt-2">
      <div class="py-4 text-center">
        <div class="chart chart-sm">
          <canvas id="chartjs-pie"></canvas>
      </div>
    </div>
  </div>
</div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-pie"), {
            type: "pie",
            data: {
                labels: <?php echo json_encode($school_acronym)?>,
                datasets: [{
                    data: <?php echo json_encode($school_total)?>,
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger,
                        "#dee2e6"
                    ],
                    borderColor: "transparent"
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                }
            }
        });
    });
</script>