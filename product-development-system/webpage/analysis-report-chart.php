<?php
include_once '../webpage/includes/db-connection.php';
$conceptID=$_POST['id'];

// Query to get the distinct questions in the survey
$questionsResult = mysqli_query($conn, "SELECT DISTINCT question_id FROM tbl_surveys WHERE conceptID = $conceptID");

$numQuestions = mysqli_num_rows($questionsResult);

$responses=mysqli_query($conn,"SELECT conceptID, question_id, response, count(*) FROM tbl_surveys WHERE conceptID = $conceptID AND response BETWEEN 1 AND 5 GROUP BY conceptID, question_id, response");

$query = mysqli_query($conn,"SELECT * FROM tbl_ingredient 
                    INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID
                    INNER JOIN tbl_survey ON tbl_concept.id = tbl_survey.conceptID WHERE tbl_survey.conceptID='$conceptID'");

$resultCheck = mysqli_num_rows($query);
if($resultCheck > 0){
  $row1 = mysqli_fetch_assoc($query);
?>
  <center><h1>Survey Report</h1></center>
  <center><h1>Product name: <?php echo $row1['name'];
}
else{
  // echo "No data";
}?> </h1></center>
<div class="">
  <?php
  $i = 1;
  while ($i <= $numQuestions) {
    $questionID = mysqli_fetch_array($questionsResult)['question_id'];
    $responseData = mysqli_query($conn, "SELECT conceptID, question_id, response, count(*) FROM tbl_surveys WHERE question_id = $questionID and conceptID = $conceptID AND response BETWEEN 1 AND 5 GROUP BY conceptID, question_id, response");
    $chartDivID = "response" . $i;
  ?>
<div >
    <div id="<?php echo $chartDivID; ?>" style="width:100%;"></div>
</div>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart<?php echo $i; ?>);

      function drawChart<?php echo $i; ?>() {
        var data = google.visualization.arrayToDataTable([
          ['Response', 'Count'],
          <?php
          if(mysqli_num_rows($responseData)>0){
            while($row2 = mysqli_fetch_array($responseData)){
              echo "['".$row2['response']."',".$row2['count(*)']."],";
            }
          }
          ?>
        ]);

        var options = {
          title: 'Question <?php echo $i; ?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('<?php echo $chartDivID; ?>'));

        chart.draw(data, options);
      }
    </script>

  <?php
    $i++;
  }
  ?>
</div>
