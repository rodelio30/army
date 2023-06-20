 <?php 
    // This line below is to get data query for reservists school
    // $sql_school ="SELECT count(*) as total, schools.acronym FROM reservists INNER JOIN schools ON reservists.school_id=schools.school_id where reservists.user_status != 'archive' group by schools.acronym;";
    // $result_school = mysqli_query($conn,$sql_school);
    // while ($row = mysqli_fetch_array($result_school)) { 
    //     // $month[]  = date_format(date_create( $row['TRANSDATE']),"M d, Y")  ;
    //     $school_total[]   = $row['total'];
    //     $school_acronym[] = $row['acronym'];
    // }

    $sql_school ="SELECT count(*) as total, schools.acronym FROM reservists INNER JOIN schools ON reservists.school_id=schools.school_id where reservists.user_status != 'archive' group by schools.acronym;";
    $result_school = mysqli_query($conn, $sql_school);

    $result_school_show = mysqli_query($conn, $sql_school);
    $rows = array();
    while ($r = mysqli_fetch_assoc($result_school_show)) {
        $rows[] = $r;
    }

	// Checking if rows is empty, assign true to $isEmpty
	$isEmpty = (empty($rows));
  ?>
<div class="card-header text-center">
    <h5 class="card-title">Total Number of ROTC Graduates</h5>
</div>
<div class="card-body d-flex">
  <div class="align-self-center w-100 mt-2">
    <?php if($isEmpty){ ?>
			<h1 class="text-center">Empty</h1>
    <?php } else { ?>
        <div id="piechart_3d" style="width: 100%; height: 400px; margin-left: 1rem;"></div>
    <?php } ?>
    <div style="height: 150px; overflow-y:auto;">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <?php
                    foreach ($rows as $row) {
                        echo "<tr>
                                <td>" . $row['acronym'] . "</td>
                                <td class='text-end'>"  . $row['total'] . "</td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                    display: true,
                    position: 'right'
                }
            }
        });
    });
</script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['School Name', 'Total'],
            <?php
            while ($row = mysqli_fetch_array($result_school)) {
                echo "['" . $row["acronym"] . "', " . $row["total"] . "],";
            } ?>
        ]);

        var options = {
          is3D: true,
          fontSize: 8
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
      window.onload   = dradwChart;
      window.onresize = dradwChart;
    </script>