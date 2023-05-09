 <?php 

    // This line below is to get data query for reservists
    // $sql ="SELECT reservists.date_graduated, count(*) as total, ranks.acronym FROM reservists INNER JOIN ranks ON reservists.rank_id=ranks.rank_id where user_status != 'archive' group by date_graduated;";
    $sql ="SELECT count(*) as total, ranks.acronym FROM reservists INNER JOIN ranks ON reservists.rank_id=ranks.rank_id where reservists.user_status != 'archive' && company_id = '$public_company_id' group by ranks.acronym;";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) { 
        // $month[]  = date_format(date_create( $row['TRANSDATE']),"M d, Y")  ;
        $total_rank[] = $row['total'];
        $rank_acronym[] = $row['acronym'];
    }
  ?>
<div class="card-header">
    <h5 class="card-title mb-0 text-center">Total of Reservist by Rank</h5>
</div>
<div class="card-body py-3">
    <div class="chart chart-sm" style="height: 100%;">
        <canvas id="chartjs-dashboard-bar"></canvas>
    </div>
</div>

<!-- This line below is to view the bar chart for rots graduates yearly -->
	<script>
    		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: <?php echo json_encode($rank_acronym)?>,
					datasets: [{
						label: "Total number: ",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: <?php echo json_encode($total_rank)?>,
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
