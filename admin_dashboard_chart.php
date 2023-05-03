<?php 
  $query_gender_faculty = "SELECT sex, count(*) as number FROM reservists where status != 'archive' && sex !='' && user_status = 'active' GROUP BY sex";
  $result_faculty_gender = mysqli_query($conn, $query_gender_faculty);
?>
<div class="py-3">
  <div class="chart chart-xs">
    <!-- <canvas id="chartjs-dashboard-pie"></canvas> -->
    <div id="piechart-faculty" style="width:100%; height:100%;"></div>
  </div>
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
      while ($row = mysqli_fetch_array($result_faculty_gender)) {
        echo "['" . $row["sex"] . "', " . $row["number"] . "],";
      }
      ?>
  ]);
  var options = {
    //is3D:true,  
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
  var chart = new google.visualization.PieChart(document.getElementById('piechart-faculty'));
  chart.draw(data, options);
}
</script>