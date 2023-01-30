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
    $seven_total = 0;
    $eight_total = 0;
    $data1 = array();
    $dataName = array();

    if ($slot == 7) {
        for ($i = 0; $i < sizeof($section_by_range); $i++) {
            $total += $section_by_range[$i];
            $seven_total += round($section_by_range[$i] / 14, 2);
        }


        for ($i = 0; $i < sizeof($section_by_range); $i++) {
            array_push($data1, (($section_by_range[$i] / 14) / $seven_total) * 100);
            array_push($dataName, round($section_by_range[$i] / 14, 2));
        }
    } elseif ($slot == 8) {
        for ($i = 0; $i < sizeof($section_by_range); $i++) {
            $total += $section_by_range[$i];
            $eight_total += round($section_by_range[$i] / 16, 2);
        }


        for ($i = 0; $i < sizeof($section_by_range); $i++) {
            array_push($data1, (($section_by_range[$i] / 16) / $eight_total) * 100);
            array_push($dataName, round($section_by_range[$i] / 16, 2));
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body {
            background-image: linear-gradient(to right, rgba(255, 230, 230, 0.2), rgba(142, 117, 181, 0.2));
            background-color: rgb(0, 0, 0);
            color: cornsilk;
        }

        .breadcrumb {

            background-color: #bf80ff;

        }

        h1,
        .h1 {
            font-size: 2.5rem;
            color: #f2e6ff;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #e6ccff;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 20px;
            border-style: solid;
            border-color: #a6a6a6;
            border-radius: 5px;
            border-width: 1px;
            border-collapse: separate;
            border-spacing: 15px;
            background-image: linear-gradient(to right, rgba(255, 0, 0, 0), rgba(255, 0, 0, 0.2));
        }
    </style>
    
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
    <div class="container">
        <div>
            <h1>Analysis of Classroom Requirement Summary</h1>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div>
                    <h3>Generate Table</h3>
                </div>
                <form action="problem.php" method="POST">
                    <div class="form-group" style="max-width: 70%; color:cornsilk">
                        <label for="semester_name">Semester:</label>
                        <select class="form-control" name="semester_name">

                            <?php

                            $sql = "SELECT DISTINCT semester FROM section";
                            $result = mysqli_query($conn, $sql);
                            echo "<option value= --select-->--select--</option>";

                            while ($rows =  mysqli_fetch_assoc($result)) {
                                $semester_name = $rows['semester'];
                                echo "<option value= '$semester_name'>$semester_name</option>";
                            }

                            ?>
                        </select>
                        <label for="year">Year:</label>
                        <select class="form-control" name="year">

                            <?php

                            $sql = "SELECT DISTINCT year FROM section";
                            $result = mysqli_query($conn, $sql);
                            echo "<option value= --select-->--select--</option>";

                            while ($rows =  mysqli_fetch_assoc($result)) {
                                $year = $rows['year'];
                                echo "<option value= '$year'>$year</option>";
                            }

                            ?>
                        </select>
                        <input class="btn btn-dark" type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
            <div class="col-xl-6">
                <div>
                    <h3>Generate Chart</h3>
                </div>
                <form action="classroom_requirement_pie_chart.php" method="POST">
                    <div class="form-group" style="max-width: 80%; ">
                        <label for="semester_name">Semester:</label>
                        <select class="form-control" name="semester_name">

                            <?php

                            $sql = "SELECT DISTINCT semester FROM section";
                            $result = mysqli_query($conn, $sql);
                            echo "<option value= --select-->--select--</option>";

                            while ($rows =  mysqli_fetch_assoc($result)) {
                                $semester_name = $rows['semester'];
                                echo "<option value= '$semester_name'>$semester_name</option>";
                            }

                            ?>
                        </select>
                        <label for="year">Year:</label>
                        <select class="form-control" name="year">

                            <?php

                            $sql = "SELECT DISTINCT year FROM section";
                            $result = mysqli_query($conn, $sql);
                            echo "<option value= --select-->--select--</option>";

                            while ($rows =  mysqli_fetch_assoc($result)) {
                                $year = $rows['year'];
                                echo "<option value= '$year'>$year</option>";
                            }

                            ?>
                        </select>
                        <label for="slot">Slot:</label>
                        <select class="form-control" name="slot">
                            <option value="7">7 slot chart</option>
                            <option value="8">8 slot chart</option>
                        </select>

                        <input class="btn btn-dark" type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
            
            <div id="piechart" style="height: 500px;"></div>

            

        </div>
</body>

</html>