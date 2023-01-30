<?php
    include '../../conn.php';

    $id  = $_POST['course_id'];
    $name         = $_POST['course_name'];
    $credit      = $_POST['course_credit'];
     

    $query = "INSERT INTO course (course_id, course_name, no_of_credit) VALUES ('$id', '$name', '$credit')";

    if($conn->query($query) == FALSE){
        header("Location: ../add_course.php?response=500");
    }



    header("Location: ../add_course.php?response=200");

?>