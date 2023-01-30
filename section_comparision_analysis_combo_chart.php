<?php // content="text/plain; charset=utf-8"

include "conn.php";

//require_once('C:/Xampp/htdocs/jpgraph-4.3.5/src/jpgraph.php');
//require_once('C:/Xampp/htdocs/jpgraph-4.3.5/src/jpgraph_line.php');
//require_once('C:/Xampp/htdocs/jpgraph-4.3.5//src/jpgraph_bar.php');

if (isset($_POST['submit'])) {
    $semester_name = $_POST['semester_name'];
    $year = $_POST['year'];
    $range = array("1-10", "11-20", "21-30", "31-35", "36-40", "41-50", "51-55", "56-65");
    $school = array("SBE", "SELS", "SETS", "SLASS", "SPPH");
    $data = [];
    $sbe = [];
    $sels = [];
    $sets = [];
    $slass = [];
    $spph = [];
    for ($i = 0; $i < sizeof($school); $i++) {
        for ($j = 0; $j < 8; $j++) {
            $val = explode("-", $range[$j]);
            $sql =  "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  AND school_id = '$school[$i]' AND enrolled_student
        BETWEEN '$val[0]' AND '$val[1]'";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($result);
            array_push($data, $num_rows);
        }
    }
    for ($j = 0; $j < 8; $j++) {
        $val = explode("-", $range[$j]);
        $sql =  "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  
        AND school_id = 'SBE' AND enrolled_student BETWEEN '$val[0]' AND '$val[1]'";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
        array_push($sbe, $num_rows);
    }
    for ($j = 0; $j < 8; $j++) {
        $val = explode("-", $range[$j]);
        $sql =  "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  
        AND school_id = 'SELS' AND enrolled_student BETWEEN '$val[0]' AND '$val[1]'";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
        array_push($sels, $num_rows);
    }
    for ($j = 0; $j < 8; $j++) {
        $val = explode("-", $range[$j]);
        $sql =  "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  
        AND school_id = 'SETS' AND enrolled_student BETWEEN '$val[0]' AND '$val[1]'";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
        array_push($sets, $num_rows);
    }
    for ($j = 0; $j < 8; $j++) {
        $val = explode("-", $range[$j]);
        $sql =  "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  
        AND school_id = 'SLASS' AND enrolled_student BETWEEN '$val[0]' AND '$val[1]'";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
        array_push($slass, $num_rows);
    }
    for ($j = 0; $j < 8; $j++) {
        $val = explode("-", $range[$j]);
        $sql =  "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  
        AND school_id = 'SPPH' AND enrolled_student BETWEEN '$val[0]' AND '$val[1]'";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
        array_push($spph, $num_rows);
    }
    $total1 = $data[0] + $data[8] + $data[16] + $data[24] + $data[32];
    $total2 = $data[1] + $data[1 + 8] + $data[1 + 16] + $data[1 + 24] + $data[1 + 32];
    $total3 = $data[2] + $data[2 + 8] + $data[2 + 16] + $data[2 + 24] + $data[2 + 32];
    $total4 = $data[3] + $data[3 + 8] + $data[3 + 16] + $data[3 + 24] + $data[3 + 32];
    $total5 = $data[4] + $data[4 + 8] + $data[4 + 16] + $data[4 + 24] + $data[4 + 32];
    $total6 = $data[5] + $data[5 + 8] + $data[5 + 16] + $data[5 + 24] + $data[5 + 32];
    $total7 = $data[6] + $data[6 + 8] + $data[6 + 16] + $data[6 + 24] + $data[6 + 32];
    $total8 = $data[7] + $data[7 + 8] + $data[7 + 16] + $data[7 + 24] + $data[7 + 32];
}



$l1datay = array($total1, $total2, $total3, $total4, $total5, $total6, $total7, $total8);
$l2datay = array($sbe[0], $sbe[1], $sbe[2], $sbe[3], $sbe[4], $sbe[5], $sbe[6], $sbe[7]); //bar
$l3datay = array($sels[0], $sels[1], $sels[2], $sels[3], $sels[4], $sels[5], $sels[6], $sels[7]); //bar
$l4datay = array($sets[0], $sets[1], $sets[2], $sets[3], $sets[4], $sets[5], $sets[6], $sets[7]); //bar
$l5datay = array($slass[0], $slass[1], $slass[2], $slass[3], $slass[4], $slass[5], $slass[6], $slass[7]); //bar
$l6datay = array($spph[0], $spph[1], $spph[2], $sbe[3], $spph[4], $spph[5], $spph[6], $spph[7]); //bar
$datax = array($range[0], $range[1], $range[2], $range[3], $range[4], $range[5], $range[6], $range[7]);


                        

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
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Range','SBE', 'SELS', 'SETS', 'SLASS', 'SPPH'],
                      
             <?php  
                          for($i=0;$i<8;$i++)  
                          {  
                               echo "['".$datax[$i]."', ".$l2datay[$i].",".$l3datay[$i].",".$l4datay[$i].",".$l5datay[$i].",".$l6datay[$i]."],";  
                          }  
                          ?> 
            
            
        ]);

        var options = {
          title : 'Section comparative analysis',
          vAxis: {title: 'Number of section'},
          hAxis: {title: 'Enrollement'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('combo_chart'));
        chart.draw(data, options);
      }
    </script>
</head>

<body>
    <div class="container">
        <div>
            <h1>Analysis of Comparison of number sections</h1>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div>
                    <h3>Generate Table</h3>
                </div>
                <form action="problem2.php" method="POST">
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
                <form action="section_comparision_analysis_combo_chart.php" method="POST">
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

                        <input class="btn btn-dark" type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
            <div id="combo_chart" style="height: 500px;"></div>

</body>

</html>