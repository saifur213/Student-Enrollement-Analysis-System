<?php

//declare(strict_types=1);
include "conn.php";
//require_once('C:/Xampp/htdocs/jpgraph-4.3.5/src/jpgraph.php');
//require_once('C:/Xampp/htdocs/jpgraph-4.3.5/src/jpgraph_pie.php');

if (isset($_POST['submit'])) {
    $semester_name = $_POST['semester_name'];
    $year = $_POST['year'];
    $slot = $_POST['slot'];
    $sql = "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  AND enrolled_student
BETWEEN '1' AND '10'";
    $result = mysqli_query($conn, $sql);
    $section_by_range = array();
    array_push($section_by_range, mysqli_num_rows($result));

    $sql2 = "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  AND enrolled_student
BETWEEN '11' AND '20'";
    $result2 = mysqli_query($conn, $sql2);
    array_push($section_by_range, mysqli_num_rows($result2));

    $sql3 = "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  AND enrolled_student
BETWEEN '21' AND '30'";
    $result3 = mysqli_query($conn, $sql3);
    array_push($section_by_range, mysqli_num_rows($result3));

    $sql4 = "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  AND enrolled_student
BETWEEN '31' AND '35'";
    $result4 = mysqli_query($conn, $sql4);
    array_push($section_by_range, mysqli_num_rows($result4));

    $sql5 = "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  AND enrolled_student
BETWEEN '36' AND '40'";
    $result5 = mysqli_query($conn, $sql5);
    array_push($section_by_range, mysqli_num_rows($result5));

    $sql6 = "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  AND enrolled_student
BETWEEN '41' AND '50'";
    $result6 = mysqli_query($conn, $sql6);
    array_push($section_by_range, mysqli_num_rows($result6));

    $sql7 = "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  AND enrolled_student
BETWEEN '51' AND '55'";
    $result7 = mysqli_query($conn, $sql7);
    array_push($section_by_range, mysqli_num_rows($result7));

    $sql8 = "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  AND enrolled_student
BETWEEN '56' AND '65'";
    $result8 = mysqli_query($conn, $sql8);
    array_push($section_by_range, mysqli_num_rows($result8));

    $total = 0;
    $six_total = 0;
    $seven_total = 0;
    $data1 = array();
    $dataName = array();

    if ($slot == 6) {
        for ($i = 0; $i < sizeof($section_by_range); $i++) {
            $total += $section_by_range[$i];
            $six_total += round($section_by_range[$i] / 12, 2);
        }


        for ($i = 0; $i < sizeof($section_by_range); $i++) {
            array_push($data1, (($section_by_range[$i] / 12) / $six_total) * 100);
            array_push($dataName, round($section_by_range[$i] / 12, 2));
        }
    } elseif ($slot == 7) {
        for ($i = 0; $i < sizeof($section_by_range); $i++) {
            $total += $section_by_range[$i];
            $seven_total += round($section_by_range[$i] / 14, 2);
        }


        for ($i = 0; $i < sizeof($section_by_range); $i++) {
            array_push($data1, (($section_by_range[$i] / 14) / $seven_total) * 100);
            array_push($dataName, round($section_by_range[$i] / 14, 2));
        }
    }


    $data = array($data1[0], $data1[1], $data1[2], $data1[3], $data1[4], $data1[5], $data1[6], $data1[7]);
//    $labels = array(
//        "1-10, " . "$dataName[0]" . "\n(%.1f%%)",
//        "11-20, " . "$dataName[1]" . "\n(%.1f%%)",
//        "21-30, " . "$dataName[2]" . "\n(%.1f%%)",
//        "31-35, " . "$dataName[3]" . "\n(%.1f%%)",
//        "36-40, " . "$dataName[4]" . "\n(%.1f%%)",
//        "41-50, " . "$dataName[5]" . "\n(%.1f%%)",
//        "51-55, " . "$dataName[6]" . "\n(%.1f%%)",
//        "56-65, " . "$dataName[7]" . "\n(%.1f%%)",
//    );
//   for($i=0;$i<8;$i++){
//       echo $data[$i];
//       echo "<br>";
//   }
//    for($i=0;$i<8;$i++){
//       echo $labels[$i];
//       echo "<br>";
//   }
      
   $labels = array("1-10","11-20","21-30","31-40","41-50","51-60","61-70","71-80");
                         
}
?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([  
                          ['Enrolled range', 'Section'],  
                          <?php  
                          for($i=0;$i<8;$i++)  
                          {  
                               echo "['".$labels[$i]."', ".$data[$i]."],";  
                          }  
                          ?>  
                     ]);

        var options = {
          title: 'Classroom requirement summary <?php echo $semester_name; echo " and slot "; echo $slot; ?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
   
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
