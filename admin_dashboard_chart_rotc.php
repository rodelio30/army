<?php 
  $query_sex_reservist  = "SELECT date_graduated, count(*) as number FROM reservists where status != 'archive' && date_graduated !='' && user_status = 'active' GROUP BY date_graduated";
  $result_reservist_sex = mysqli_query($conn, $query_sex_reservist);
?>
  <div class="chart chart-xs">
    <!-- <canvas id="chartjs-dashboard-pie"></canvas> -->
    <div id="piechart-date-graduated" style="width:100%; height:100%;"></div>
  </div>
<!-- This line below is the useful chart -->
<script type="text/javascript">
google.charts.load('current', {
  'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Sex', 'Number'],
    <?php
      while ($row = mysqli_fetch_array($result_reservist_sex)) {
        echo "['" . $row["date_graduated"] . "', " . $row["number"] . "],";
      }
      ?>
  ]);
  var options = {
    is3D:true,  
    pieHole: 0.15,
    slices: {
      0: {
        color: '#FFD984'
      },
      1: {
        color: '#007848'
      }
    }
  };
  var chart = new google.visualization.PieChart(document.getElementById('piechart-date-graduated'));
  chart.draw(data, options);
}
</script>