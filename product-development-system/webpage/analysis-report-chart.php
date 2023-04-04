<?php
include_once '../webpage/includes/db-connection.php';
$conceptID=$_POST['id'];
$response1=mysqli_query($conn,"SELECT conceptID, response1, count(*) from tbl_survey where conceptID = $conceptID group by response1");
$response2=mysqli_query($conn,"SELECT conceptID, response2, count(*) from tbl_survey where conceptID = $conceptID group by response2");
$response3=mysqli_query($conn,"SELECT conceptID, response3, count(*) from tbl_survey where conceptID = $conceptID group by response3");
$query = mysqli_query($conn,"SELECT * FROM tbl_ingredient 
                    INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID
                    INNER JOIN tbl_survey ON tbl_concept.id = tbl_survey.conceptID WHERE tbl_survey.conceptID='$conceptID'");
$row1 = mysqli_fetch_array($query);
//$survey = mysqli_query($connection, "SELECT conceptID, response1, count(*) from tbl_survey where conceptID = 5 group by response1");

?>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(response1Chart);
      google.charts.setOnLoadCallback(response2Chart);
      google.charts.setOnLoadCallback(response3Chart);

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(performanceChart);

      function response1Chart() {

        var data = google.visualization.arrayToDataTable([
          ['Product', 'Sales per month'],
          <?php

                if(mysqli_num_rows($response1)>0){
                    while($row = mysqli_fetch_array($response1)){

                        echo "['".$row['response1']."',".$row['count(*)']."],";

                    }
                }
          ?>
        ]);

        var options = {
          title: 'Response 1'
        };

        var chart = new google.visualization.PieChart(document.getElementById('response1'));

        chart.draw(data, options);
      }

      function response2Chart() {

        var data = google.visualization.arrayToDataTable([
          ['Product', 'Sales per month'],
          <?php

        if(mysqli_num_rows($response2)>0){
            while($row = mysqli_fetch_array($response2)){

                echo "['".$row['response2']."',".$row['count(*)']."],";

            }
        }
          ?>
      ]);

      var options = {
      title: 'Response 2'
    };

var chart = new google.visualization.PieChart(document.getElementById('response2'));

chart.draw(data, options);
}

function response3Chart() {

var data = google.visualization.arrayToDataTable([
  ['Product', 'Sales per month'],
  <?php

        if(mysqli_num_rows($response3)>0){
            while($row = mysqli_fetch_array($response3)){

                echo "['".$row['response3']."',".$row['count(*)']."],";

            }
        }
  ?>
]);

var options = {
  title: 'Response 3'
};

var chart = new google.visualization.PieChart(document.getElementById('response3'));

chart.draw(data, options);
}

    </script>
  </head>
  <center><h1>Survey Report</h1></center>
  <center><h1>Product name: <?php echo $row1['name'];?></h1></center>
  <div class="chartbox">
        <div id="response1"  style="width:100%;"></div>
        <div id="response2" style="width:100%;"></div>
        <div id="response3" style="width:100%;"></div>
    </div>