 <?php 
    // This query is to get the count for reservist ready user
    $sql_reservist ="SELECT sex, count(*) as number FROM reservists where status != 'archive' && sex !='' && status = 'Ready' && user_status != 'archive' GROUP BY sex";
    $result_reservist = mysqli_query($conn,$sql_reservist);
    while ($row = mysqli_fetch_array($result_reservist)) { 
        $sex[]    = $row['sex'];
        $number[] = $row['number'];
    }

    // This query is to get the count for reservist standby user
    $sql_reservist_standby ="SELECT sex, count(*) as number FROM reservists where status != 'archive' && sex !='' && status = 'Standby' && user_status != 'archive' GROUP BY sex";
    $result_reservist_standby = mysqli_query($conn,$sql_reservist_standby);
    while ($row = mysqli_fetch_array($result_reservist_standby)) { 
        $sex_standby[]    = $row['sex'];
        $number_standby[] = $row['number'];
    }

    // This query is to get the count for reservist retired user
    $sql_reservist_retired ="SELECT sex, count(*) as number FROM reservists where status != 'archive' && sex !='' && status = 'Retired' && user_status != 'archive' GROUP BY sex";
    $result_reservist_retired = mysqli_query($conn,$sql_reservist_retired);
    while ($row = mysqli_fetch_array($result_reservist_retired)) { 
        // $month[]  = date_format(date_create( $row['TRANSDATE']),"M d, Y")  ;
        $sex_retired[]    = $row['sex'];
        $number_retired[] = $row['number'];
    }
  ?>
<div class="card-header">

    <h5 class="card-title mb-0 text-center">Reservist Classification</h5>
</div>
<div class="card-body py-1 pt-0">
    <div class="row">
        <div class="col-4 p-3 pt-0">
            <div class="chart chart-sm">
                <canvas id="chartjs-dashboard-pie-ready"></canvas>
            </div>
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <td>Male</td>
                        <td class="text-end"><?php echo $ready_male_counter; ?></td>
                    </tr>
                    <tr>
                        <td>Female</td>
                        <td class="text-end"><?php echo $ready_female_counter ;?></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td class="text-end"><?php echo $ready_total_counter ;?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-4 p-3 pt-0">
            <div class="chart chart-sm">
                <canvas id="chartjs-dashboard-pie-standby"></canvas>
            </div>
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <td>Male</td>
                        <td class="text-end"><?php echo $standby_male_counter; ?></td>
                    </tr>
                    <tr>
                        <td>Female</td>
                        <td class="text-end"><?php echo $standby_female_counter ;?></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td class="text-end"><?php echo $standby_total_counter ;?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-4 p-3 pt-0">
            <div class="chart chart-sm">
                <canvas id="chartjs-dashboard-pie-retired"></canvas>
            </div>
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <td>Male</td>
                        <td class="text-end"><?php echo $retired_male_counter; ?></td>
                    </tr>
                    <tr>
                        <td>Female</td>
                        <td class="text-end"><?php echo $retired_female_counter ;?></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td class="text-end"><?php echo $retired_total_counter ;?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- This line below is to view the percentage of ready reservist users gender -->
    	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie-ready"), {
				type: "pie",
				data: {
					labels: <?php echo json_encode($sex) ?>,
					datasets: [{
						data: <?php echo json_encode($number)?>,
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
<!-- This line below is to view the percentage of standby reservist users gender -->
    	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie-standby"), {
				type: "pie",
				data: {
					labels: <?php echo json_encode($sex_standby) ?>,
					datasets: [{
						data: <?php echo json_encode($number_standby)?>,
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
<!-- This line below is to view the percentage of ready reservist users gender -->
    	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie-retired"), {
				type: "pie",
				data: {
					labels: <?php echo json_encode($sex_retired) ?>,
					datasets: [{
						data: <?php echo json_encode($number_retired)?>,
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>