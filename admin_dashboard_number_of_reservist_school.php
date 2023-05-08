 <?php 

//  $sql ="SELECT date_graduated, count(*) as total FROM reservists where user_status = 'active' GROUP BY date_graduated";
    $sql_reservist ="SELECT sex, count(*) as number FROM reservists where status != 'archive' && sex !='' && user_status = 'active' && school_id = '$public_school_id' GROUP BY sex";
    $result_reservist = mysqli_query($conn,$sql_reservist);
    // $chart_data ="";
    while ($row = mysqli_fetch_array($result_reservist)) { 

    // $month[]  = date_format(date_create( $row['TRANSDATE']),"M d, Y")  ;
    $sex[]    = $row['sex'];
    $number[] = $row['number'];
}
    // This line below is to get data query for reservists
    $sql ="SELECT reservists.date_graduated, count(*) as total FROM reservists INNER JOIN schools ON reservists.school_id=schools.school_id where user_status = 'active' && reservists.school_id = '$public_school_id' group by date_graduated;";
    $result = mysqli_query($conn,$sql);
    $chart_data="";
    while ($row = mysqli_fetch_array($result)) { 

    // $month[]  = date_format(date_create( $row['TRANSDATE']),"M d, Y")  ;
    $month[] = $row['date_graduated'];
    $sales[] = $row['total'];
}
  ?>
<!-- <script src="js/app.js"></script> -->
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <!-- <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Gender Stats for Reservist</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-12 col-md-4 col-xxl-3 d-flex order-2 order-xxl-3">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Gender Stats for Active Reservist</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="py-3">
                                    <div class="chart chart-xs">
                                        <!-- <?php include 'admin_dashboard_chart.php'?> -->
                                        <canvas id="chartjs-dashboard-pie"></canvas>
                                    </div>
                                </div>

                                <!-- <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Male</td>
                                            <td class="text-end"><?php echo $school_male ; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Female</td>
                                            <td class="text-end"><?php echo $school_female ;?></td>
                                        </tr>
                                    </tbody>
                                </table> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-8 col-xxl-8">
                    <div class="card flex-fill w-100"> -->
                <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="card-title mb-0">ROTC Graduates</h5>
                        </div>
                        <div class="card-body py-3">
                            <div class="chart chart-sm" style="height: 100%;">
                                <canvas id="chartjs-dashboard-bar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- This line below is to view the percentage of reservist users gender -->
    	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
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

<!-- This line below is to view the bar chart for rots graduates yearly -->
	<script>
    		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: <?php echo json_encode($month)?>,
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: <?php echo json_encode($sales)?>,
						barPercentage: .50,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>