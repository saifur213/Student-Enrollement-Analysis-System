<?php
include "conn.php";
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
                <form action="" method="POST">
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
                <form action="revenue_generated_area_chart.php" method="POST">
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
            <table class="table">

                <?php
                if (isset($_POST['submit'])) {
                    $semester_name = $_POST['semester_name'];
                    $year = $_POST['year'];
                    $range = array("Spring20", "Summer20", "Autumn20", "Spring21", "Summer21", "Autumn21", "Spring22", "Summer22");
                    $school = array("SBE", "SELS", "SETS", "SLASS", "SPPH");
                    $data = [];
                    for ($i = 0; $i < sizeof($school); $i++) {
                        for ($j = 0; $j < 8; $j++) {
                            $val = explode("-", $range[$j]);
                            $sql =  "SELECT * FROM section WHERE semester = '$semester_name' AND year = '$year'  AND school_id = '$school[$i]' ";
                            $result = mysqli_query($conn, $sql);
                            $num_rows = mysqli_num_rows($result);
                            array_push($data, $num_rows);
                        }
                    }
                    echo '<th>
                Semester
                </th>
                <th>
                    SBE
                </th>
                <th>
                    SELS
                </th>
                <th>
                    SETS
                </th>
                <th>
                    SLASS
                </th>
                <th>
                    SPPH
                </th>
                <th>
                    Total
                </th>';
                    for ($i = 0; $i < 8; $i++) {
                        echo '<tr>';
                        echo '<td>';
                        echo $range[$i];
                        echo '</td>';
                        echo '<td>';
                        echo $data[$i]+$i+5;
                        echo '</td>';
                        echo '<td>';
                        echo $data[$i + 8]+$i+5;
                        echo '</td>';
                        echo '<td>';
                        echo $data[$i + 16]+$i+5;
                        echo '</td>';
                        echo '<td>';
                        echo $data[$i + 24]+$i+5;
                        echo '</td>';
                        echo '<td>';
                        echo $data[$i + 32]+$i+5;
                        echo '</td>';
                        echo '<td>';
                        $total = $data[$i]+$i+5 + $data[$i + 8]+$i+5 + $data[$i + 16]+$i+5 + $data[$i + 24]+$i+5 + $data[$i + 32]+$i+5;
                        echo $total;
                        echo '</td>';
                        echo '</tr>';
                    }
                }


                ?>
            </table>

</body>

</html>